<?php

/*
 *  Main Router
 *  This will capture all routes and direct them to the correct controller
 *  to handle the logic of each request
*/

class Router {

    private $routes = [];

    // Dispatch the route, creating the controller object and running the action method
    public function dispatch($url) {
        $url = $this->fitlerUrl($url);
        $request_method = $_SERVER['REQUEST_METHOD'];

        $url[0] = str_starts_with($url[0], "/") ? '/' : '/'.$url[0];
        $requested_route = $this->getRoute($url, $request_method);

        if($requested_route) {
            call_user_func($requested_route);
            return;
        }

        $this->handleNotFound();
        
    }

    function handleNotFound() {
        print_r("Not Found.");
    }


    /*
     *
     * @param string $path, optional $callback;
     * Here goes all the requests methods
     * 
    */
    public function get($path, $callback) {
        $function_reflection = new ReflectionFunction($callback);
        $param_num = $function_reflection->getNumberOfRequiredParameters();

        if($param_num === 0) {
            $this->addRoute('GET', $path, $callback);
        } elseif($param_num === 1) {
            $this->addRoute('GET', $path, function() use ($callback){
                $request_data = [
                    'params' => $_GET,
                    'headers' => getallheaders()
                ];
    
                return $callback($request_data);
            });
        }
    }

    public function post($path, $callback) {
        $function_reflection = new ReflectionFunction($callback);
        $param_num = $function_reflection->getNumberOfRequiredParameters();

        if($param_num === 0) {
            $this->addRoute('POST', $path, $callback);
        } elseif($param_num === 1) {
            
            $this->addRoute('POST', $path, function() use ($callback){
                $headers = getallheaders();
                $post_data = [];
                if (isset($headers['Content-Type']) && strpos($headers['Content-Type'], 'application/json') !== false) {
                    $rawData = file_get_contents('php://input');
                    $post_data = json_decode($rawData, true) ?? []; 
                } else {
                    $post_data = $_POST;
                }

                $request_data = [
                    'params' => $_GET,
                    'body' => $post_data,
                    'headers' => $headers
                ];

    
                return $callback($request_data);
            });
        }
    }

    public function addRoute($method, $path, $callback) {
        $this->routes[$method][$path] = $callback;
    }

    public function use($routePath, $router) {
        $routes = $router->getAllRoutes();

        foreach ($routes as $method => $route) {

            foreach($route as $path => $callbackFunction) {
                if($path === "/") {
                    $this->addRoute($method, $routePath, $callbackFunction);
                    continue;
                }
                $this->addRoute($method, $routePath.$path, $callbackFunction);
            }
        }
    }

    public function getAllRoutes() {
        return $this->routes;
    }

    public function getRoute($url, $method) {

        $url = implode('/', $url);

        if (isset($this->routes[$method][$url]) && 
            $requested_route = $this->routes[$method][$url]) {
            return $requested_route;
        }

        return false;
    }

    protected function fitlerUrl($url) {

        // get config files variables if to check for directorynames or not
        global $excludeProjectName;
        global $appRootDirectoryName;

        // if URI starts with / then remove it since it will shift array elements
        $url = strtok($url, '?'); 
        $url = strtok($url, '&'); 
        $url = $url[0] === '/' ? substr($url, 1) : $url;
        $url = rtrim($url, "/");

        // Filter url from unwanted characters
        $url = filter_var($url, FILTER_SANITIZE_URL);

        // get path by URI explode it to get the sub paths
        $explodedUrl = explode("/", $url);

        // if exludeprojectname is true in config, then remove the project name from the uri path
        if($excludeProjectName === true) {
            $index = array_search($appRootDirectoryName, $explodedUrl);
            // If found, remove it from the array
            if ($index !== false) {
                unset($explodedUrl[$index]);
                
                // Re-index the array to close the gap (optional)
                $explodedUrl = array_values($explodedUrl);
            }
        }
        
        return count($explodedUrl) === 0 ? ['/'] : $explodedUrl;
    }

}

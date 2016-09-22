<?php
class Request {

    public $controller = 'index';
    public $action = 'index';
    private $params = array();
    private $post = array();
    private $files = array();
    private $get = array();
    private $cookies = array();
    private $method = 'GET';
    public $orgin_action = 'index';


    public function __construct()
    {
       
        $this->method = $_SERVER['REQUEST_METHOD'];
        

        $uri = ltrim($_SERVER['REQUEST_URI'], "/");

        if (!empty($uri) && strpos($uri, "public") !== 0)
        {
            $uri = current(explode("?", $uri));
            $params = explode("/", $uri);

            if (count($params) >= 1 && !empty($params[0]))
            {
                $this->controller = $params[0];
            }
            if (count($params) >= 2)
            {
                    if($params[1] != ''){
                       $this->action = $params[1];

                    }      
            }
            // third url value
            if (count($params) == 3)
            {
                // assign value as from GET
                $this->params[] = 'id';
                $this->get['id'] = $params[2];
            }


        }
    }   

}

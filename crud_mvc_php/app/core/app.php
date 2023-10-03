<?php 
/*
front end controller  
*/
    class app {
        protected $controller = "homecontroller" ; 
        protected $action = "index" ;  
        protected $params = [];
        public function __construct(){  
            $this->prepareURL() ;
            $this->render();
        }

        // exectract controller & action  && parameter 
        private function prepareURL(){
            $url = $_SERVER['REQUEST_URI'] ;
            $url = substr($url , 1) ;
            if(!empty($url)){
            $url = trim($url , '/');
            $url = explode("/" , $url) ;
            // define the controller
            $this->controller = isset($url[0]) ? $url[0]."controller":"homecontroller";
            // define the action
            $this-> action = isset($url[1])?$url[1]:"index"; 
            unset($url[0] , $url[1]) ;
            $this->params = (!empty($url)) ? array_values($url) :[]; 
            }
        }


        private function render(){
            if(class_exists($this->controller)){
                $controller = new $this->controller ;
                if(method_exists($controller , $this->action)){
                    call_user_func_array([$controller , $this->action] , $this->params) ;
                }else {
                    echo "Method not exest" ;
                }
            }else{
                echo "This controller : ".$this->controller." not exest" ;
            }
        }

    }

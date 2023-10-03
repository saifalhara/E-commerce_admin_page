<?php 

    class view  {

            public static function load($viewName , $viewData=[]){
                $file = VIEWS.$viewName.'.php' ; 
                extract($viewData) ;
                if(file_exists($file)){
                ob_start();
                require($file);
                ob_end_flush();
                }else {
                     echo "The view ".$viewName." does not exest" ;
                }

        }
    }
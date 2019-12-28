<?php

    class HomeController{
        public function index(){
            $htmEstruturaPage = file_get_contents( "app/Template/estrutura.html" );
            $htmLoginBody     = file_get_contents( "app/view/login.html" );
            $htmPageToShow    = str_replace( "{{CONTENT}}", $htmLoginBody, $htmEstruturaPage );

            echo $htmPageToShow;
        }
    }

 ?>
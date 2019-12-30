<?php

    class LogoutController{
        public function index( &$htmPageToShow ){
            $htmIconLogout = file_get_contents( "app/View/LogoutView-Icon.html" );
            $htmInputLogout = file_get_contents( "app/View/LogoutView-Input.html" );

            $htmPageToShow = str_replace( "{{MNEMONICO_ICON_LOGOUT}}", $htmIconLogout, $htmPageToShow );
            $htmPageToShow = str_replace( "{{MNEMONICO_MENSAGEM_ICONE_LOGOUT}}" , "Sair", $htmPageToShow );
            $htmPageToShow = str_replace( "{{MNEMONICO_INPUT_LOGOUT}}", $htmInputLogout, $htmPageToShow );
        }
    }

 ?>
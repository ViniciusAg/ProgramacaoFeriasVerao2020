<?php

    class LogoutController{
        public function index( &$htmPageToShow ){
            $htmIconLogout = file_get_contents( "app/View/LogoutView/ButtonQuit.html" );
            $htmInputLogout = file_get_contents( "app/View/LogoutView/InputHiddenLogOutSession.html" );

            $htmPageToShow = str_replace( "{{MNEMONICO_ICON_LOGOUT}}", $htmIconLogout, $htmPageToShow );
            $htmPageToShow = str_replace( "{{MNEMONICO_MENSAGEM_ICONE_LOGOUT}}" , "Sair", $htmPageToShow );
            $htmPageToShow = str_replace( "{{MNEMONICO_ICONE_LOGOUT_VOLTAR}}" , "out", $htmPageToShow );
            $htmPageToShow = str_replace( "{{MNEMONICO_INPUT_LOGOUT}}", $htmInputLogout, $htmPageToShow );
        }
    }

 ?>
<?php

    class AdminController{
        public function index(){
            $htmAdminView = file_get_contents( "app/View/AdminView.html" );

            $oController = new LogoutController;
            $oController->index( $htmAdminView );
            
            echo $htmAdminView;
        }
    }

 ?>
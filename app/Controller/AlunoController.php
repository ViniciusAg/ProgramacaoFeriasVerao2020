<?php

    class AlunoController{
        public function index(){
            $htmAlunoView = file_get_contents( "app/View/AlunoView.html" );

            $oController = new LogoutController;
            $oController->index( $htmAlunoView );
            
            echo $htmAlunoView; 
        }
    }

 ?>
<?php

    class Core{

        function validateLogin( $sLoginUser, $sLoginPass ){

            
        }

        public function start(){
            $sController = new HomeController;

            $sLoginUser = filter_input( 
                INPUT_POST, 
                "loginUser", 
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );

            $sLoginPass = filter_input( 
                INPUT_POST, 
                "loginPass", 
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );

            if ( isset( $sLoginUser ) && isset( $sLoginPass ) )
                Core::validateLogin( $sLoginUser, $sLoginPass );
            else
                $sController->index();
        }
    }

 ?>
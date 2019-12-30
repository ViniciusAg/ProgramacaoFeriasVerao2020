<?php

    class LoginController{
        public function login( &$sLoginUser, &$sLoginPass, &$bStatus, &$sUserType ){
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
            ); $bIniciouSessao = false;

            $oRequestLogin = new LoginModel;
            $oRequestLogin = $oRequestLogin->validateLogin( $sLoginUser, $sLoginPass );

            if ( ($oRequestLogin) && ($oRequestLogin->num_rows) ){
                $sEvaluated = $oRequestLogin->fetch_assoc();

                $_SESSION[ "id" ] = $sEvaluated[ "id" ];
                $_SESSION[ "tipo" ] = $sEvaluated[ "tipo" ];
                $sUserType = $sEvaluated[ "tipo" ];

                $bStatus = true;
            }
        }

        public function index( $htmEstruturaPage ){
            $htmLoginBody = file_get_contents( "app/View/LoginView.html" );
            echo $htmLoginBody;
        }
    }

 ?>
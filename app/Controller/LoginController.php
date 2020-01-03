<?php

    class LoginController{
        public function login( &$sLoginUser, &$sLoginPass, &$bStatus, &$sUserType ){
            $sLoginUser = filter_input( 
                INPUT_POST, 
                "EmailUsuario", 
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );

            $sLoginPass = filter_input( 
                INPUT_POST, 
                "SenhaUsuario", 
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            ); $bIniciouSessao = false;

            $oRequestLogin = new LoginModel;
            $oRequestLogin = $oRequestLogin->validateLogin( $sLoginUser, $sLoginPass );

            if ( ($oRequestLogin) && ($oRequestLogin->num_rows) ){
                $sEvaluated = $oRequestLogin->fetch_assoc();

                $_SESSION[ "id" ]              = $sEvaluated[ "id" ];
                $_SESSION[ "id_tipo_usuario" ] = $sEvaluated[ "id_tipo_usuario" ];
                $_SESSION[ "id_status" ]       = $sEvaluated[ "id_status" ];
                $_SESSION[ "nome" ]            = $sEvaluated[ "nome" ];
                $_SESSION[ "whatsapp" ]        = $sEvaluated[ "whatsapp" ];

                $sUserType = $sEvaluated[ "id_tipo_usuario" ];

                $bStatus = true;
            }
        }

        public function index( $htmEstruturaPage ){
            $htmLoginBody = file_get_contents( "app/View/LoginView.html" );
            echo $htmLoginBody;
        }
    }

 ?>
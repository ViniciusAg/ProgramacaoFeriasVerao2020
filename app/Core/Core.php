<?php

    class Core{
    	private function getMyController( $sTipo, &$sController ){
    		if ( $sTipo == "X" )
                $sController = "AdminController";
            if ( $sTipo == "A" )
                $sController = "AlunoController";
            if ( $sTipo == "P" )
                $sController = "ProfessorController";
    	}  ////    Identifica Controller da Sessão 

        private function verifyLoggoutSession( &$bLoggedUser ){
            $sLogOutSession = filter_input( 
                INPUT_POST, 
                "LogOutSession", 
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );

            if ( $sLogOutSession == "true" ){
                session_destroy();
                $_SESSION = [];
                $bLoggedUser = false;
            }
        }   ////    Verifica Solicitação de Logout

        private function verifyNewRegisterSolicitation( &$bNewRegister ){
            $sRegister = filter_input( 
                INPUT_POST, 
                "getNewRegister",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );

            if ( $sRegister == "true" )
                $bNewRegister = true;            
        }   ////    Verifica Solicitação de Registro

        private function verifyCurrentView( &$sCurrentView ){
            $sCurrentView = filter_input( 
                INPUT_POST, 
                "CurrentView",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );

            if ( $sCurrentView == "RegisterView" ){
                $sNewRegisterForm = filter_input( 
                    INPUT_POST, 
                    "NewRegisterForm",
                    FILTER_SANITIZE_STRING,
                    FILTER_FLAG_NO_ENCODE_QUOTES
                );

                if ( $sNewRegisterForm == "true" ){
                    $oController = new RegisterController;
                    $oController->verifyNewRegisterForm();
                }   ////    Valida Form de Registro
            }
        }   ////    Identifica View do Form

        private function getFormValues( &$bNewRegister, &$bLoggedUser, &$sCurrentView ){
            Core::verifyNewRegisterSolicitation( $bNewRegister );
            Core::verifyLoggoutSession( $bLoggedUser );
            Core::verifyCurrentView( $sCurrentView );
        }

        public function start( $htmEstruturaPage ){
        	$bLoggedUser  = false;
        	$bLoggedUser  = isset( $_SESSION[ "tipo" ] );

            $bStatus      = false;
            $bNewRegister = false;
            // $bNewRegister = true;

        	$sLoginUser   = NULL;
        	$sLoginPass   = NULL;
            $sCurrentView = NULL;

        	$sController  = "LoginController";
        	$sAction      = "index";

            Core::getFormValues( $bNewRegister, $bLoggedUser, $sCurrentView );

            if ( $bNewRegister )
                $sController = "RegisterController";

        	if ( $bLoggedUser ){
        		Core::getMyController( $_SESSION[ "tipo" ], $sController );
        	}else{
        		$oController = new LoginController;
        		$oController->login( $sLoginUser, $sLoginPass, $bLoggedUser, $sUserType );
        		
        		if ( $bLoggedUser )
        			Core::getMyController( $sUserType, $sController );
        	} call_user_func_array( array( new $sController, $sAction ), array( $htmEstruturaPage ) );
        }
    }

 ?>
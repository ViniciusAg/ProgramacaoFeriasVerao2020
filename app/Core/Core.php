<?php

    class Core{
        public function getThoseTextValuesFromPostForm( &$aInputNames ){
            $aKeysOfaInputNames = array_keys( $aInputNames );

            foreach ( $aKeysOfaInputNames as $item) {
                $aInputNames[ $item ] = filter_input( 
                    INPUT_POST, 
                    $item,
                    FILTER_SANITIZE_STRING,
                    FILTER_FLAG_NO_ENCODE_QUOTES
                );
            }
        }

    	private function getMyController( $sTipo, &$sController ){
            $aTiposDeUsuario = "tipo_usuario";
            $sTypeOfLoggedUser = NULL;

            $oRegisterModel = new RegisterModel;
            $oRegisterModel->getItemInCadastrosGeraisById_Tipo( $aTiposDeUsuario );

            foreach( $aTiposDeUsuario as $key => $value ){
                if ( $value[ "id" ] == $sTipo )
                    $sTypeOfLoggedUser = $value[ "nome" ];
            }

    		if ( $sTypeOfLoggedUser == "Administrador" )
                $sController = "AdminController";
            if ( $sTypeOfLoggedUser == "Aluno" )
                $sController = "AlunoController";
            if ( $sTypeOfLoggedUser == "Professor" )
                $sController = "ProfessorController";

            $sNameOfRegisterWhatWeWant = "status";
            $oRegisterModel = new RegisterModel;
            $oRegisterModel->getItemInTiposCadastrosByNome( $sNameOfRegisterWhatWeWant );
            $oRegisterModel->getItemInCadastrosGeraisById_Tipo( $sNameOfRegisterWhatWeWant );

            foreach ($sNameOfRegisterWhatWeWant as $key => $value) {
                if ( $_SESSION[ "id_status" ] == $value[ "id" ] )
                    if ( $value[ "nome" ] == "Aguardando Confirmação" ){
                        $sController = "UsuarioSemAcessoController";
                        $_SESSION[ "StatusDescricao" ] = $value[ "nome" ];
                    } else if ( $value[ "nome" ] == "Inativo" ){
                        $sController = "UsuarioSemAcessoController";
                        $_SESSION[ "StatusDescricao" ] = $value[ "nome" ];
                    }
            }
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

        private function verifyCurrentView( &$sCurrentView, &$bRegistrationSuccessfully ){
            $sCurrentView = filter_input( 
                INPUT_POST, 
                "CurrentView",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );

            if ( $sCurrentView == "RegisterView" ){
                $sSendingNewRegisterForm = filter_input( 
                    INPUT_POST, 
                    "NewRegisterForm",
                    FILTER_SANITIZE_STRING,
                    FILTER_FLAG_NO_ENCODE_QUOTES
                );

                if ( $sSendingNewRegisterForm == "true" ){
                    $oController = new RegisterController;
                    $bRetornoNewRegisterForm = $oController->verifyNewRegisterForm( 
                        $bRegistrationSuccessfully
                     ); $bRegistrationSuccessfully = $bRetornoNewRegisterForm;
                }   ////    Valida Form de Registro
            }
        }   ////    Identifica View do Form

        public function start( $htmEstruturaPage ){
        	$bLoggedUser  = false;
        	$bLoggedUser  = isset( $_SESSION[ "id_tipo_usuario" ] );

            $bStatus      = false;
            $bNewRegister = false;
            // $bNewRegister = true;    ////    Carrega Tela Cadastro
            $bRegistrationSuccessfully = false;

        	$sLoginUser   = NULL;
        	$sLoginPass   = NULL;
            $sCurrentView = NULL;

        	$sController  = "LoginController";
            $sAction      = "index";
            
            Core::verifyNewRegisterSolicitation( $bNewRegister );
            Core::verifyLoggoutSession( $bLoggedUser );
            Core::verifyCurrentView( $sCurrentView, $bRegistrationSuccessfully );

            if ( $bNewRegister ){    ////    Click at "New" button
                $sController = "RegisterController";
                if ( $bRegistrationSuccessfully )
                    $sController = "LoginController";
                else    ////    Return Register View If Occur An Error
                    $sController = "RegisterController";
            }

        	if ( $bLoggedUser ){
                Core::getMyController( $_SESSION[ "id_tipo_usuario" ], $sController );
        	}else{
        		$oController = new LoginController;
        		$oController->start( $sLoginUser, $sLoginPass, $bLoggedUser, $sUserType );
        		
        		if ( $bLoggedUser )
        			Core::getMyController( $sUserType, $sController );
        	} call_user_func_array( array( new $sController, $sAction ), array( $htmEstruturaPage ) );
        }

        private function abbleCors(){
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET, POST');
            header("Access-Control-Allow-Headers: X-Requested-With");
        }   ////    Config to Enable Ajax (?)

        public function verifyThisGetRequest(){
            if ( isset( $_SESSION ) ){
                if ( isset( $_GET[ "AlunosPresentes" ] ) ){
                    // echo json_encode( '{ "message": "hello world" }' );
                    echo json_encode( '{ "message": "' . print_r( $_GET[ "AlunosPresentes" ] ) . '" }' );
                }   ////    #  RECEBO ALUNOS PRESENTES, FALTA REALIZAR CHAMADA

                if ( isset( $_GET[ "UserID" ] ) ){
                    Core::abbleCors();
                    $sUserToManage = $_GET[ "UserID" ];
                    $sMethod = $_GET[ "Method" ];

                    if ( $sMethod == "ActiveThisUser" ){
                        $oAPIController = new APIController;
                        $oAPIController->ActiveThisUser( $sUserToManage );
                    }   
                }   ////    Activate New User [AdminView]

                if ( isset( $_GET[ "EmailAdress" ] ) ){
                    Core::abbleCors();
                    $sEmailValido = $_GET[ "EmailAdress" ];
                    $sMethod = $_GET[ "Method" ];

                    if ( $sMethod == "CheckThisEmail" ){
                        $oAPIController = new APIController;
                        $oAPIController->checkThisEmail( $sEmailValido );
                    }                
                }   ////    Check An Email Adress [RegisterView]
            }
        }   ////    Manage Interface API
    }

 ?>
<?php

    class RegisterController{
    	private function setNewUser(){
    		// $oRequestNewUser = new RegisterModel;
    		echo "eu deveria estar cadastrando um usuario";
    	}
    	
    	public function verifyNewRegisterForm(){
            $sPrimeiroNome = filter_input( 
                INPUT_POST, 
                "firstName",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );
        	$sUltimoNome = filter_input( 
                INPUT_POST, 
                "lastName",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );
        	$sNumeroRG = filter_input( 
                INPUT_POST, 
                "rgNumber",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );
        	$sEnderecoEmail = filter_input( 
                INPUT_POST, 
                "emailAdress",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );
        	$sTipoUsuario = filter_input( 
                INPUT_POST, 
                "userType",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );
        	$aDisciplinas = filter_input( 
                INPUT_POST, 
                "disciplina[]",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );
        	$sSenha = filter_input( 
                INPUT_POST, 
                "newPassword",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );
        	$sReSenha = filter_input( 
                INPUT_POST, 
                "reNewPassword",
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );
            
            ////    falta validar formulario
        }

        public function index(){
            $htmRegisterView = file_get_contents( "app/View/RegisterView.html" );
            $htmVoltarIcon   = file_get_contents( "app/View/LogoutView-Icon.html" );

            $htmVoltarIcon   = str_replace( 
            	"{{MNEMONICO_MENSAGEM_ICONE_LOGOUT}}", 
            	"Fazer Login", 
            	$htmVoltarIcon 
            );

            $htmRegisterView = str_replace( 
            	"{{MNEMONICO_ICON_VOLTAR}}", 
            	$htmVoltarIcon, 
            	$htmRegisterView 
            );

            $aDisciplinas = [];

            $sSelectUserTypeOptions  = "";
            $sSelectUserTypeOptions .= "<option value=''>Sou um...</option>";
            $sSelectUserTypeOptions .= "<option value='P'>Professor</option>";
            $sSelectUserTypeOptions .= "<option value='A'>Aluno</option>";

            $oConsultaDb = new RegisterModel;
            $oConsultaDb->getDisciplinas( $aDisciplinas );

            $sSelectDisciplinaOptions = "<option value=''>Disciplinas</option>";

            foreach( $aDisciplinas as $item ){
                $sSelectDisciplinaOptions .= "<option>" . $item[ "nome" ] . "</option>";
            }

            ////    desnecessário ??

            // $oConsultaDb->getTypesOfUsers( $aTypesOfUsers );

            // if ( ($aTypesOfUsers) && ($aTypesOfUsers->num_rows) ){
            //     foreach( $aTypesOfUsers as $item ){
            //         $sSelectUserTypeOptions .= "<option>" . $item[ "tipo" ] . "</option>";
            //     }
            // }

            ////    desnecessário ?? final

            // $sSelectDisciplinaOptions = "<option>this</option><option>is</option><option>a test</option>";

            $htmRegisterView = str_replace( 
            	"{{MNEMONICO_SELECT_USER_TYPE}}", 
            	$sSelectUserTypeOptions, 
            	$htmRegisterView 
            );

            $htmRegisterView = str_replace( 
            	"{{MNEMONICO_SELECT_DISCIPLINA}}", 
            	$sSelectDisciplinaOptions, 
            	$htmRegisterView 
            );

            echo $htmRegisterView;
        }
    }

 ?>
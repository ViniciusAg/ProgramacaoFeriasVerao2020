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
            	"Logar", 
            	$htmVoltarIcon 
            );

            $htmVoltarIcon = str_replace( 
                "{{MNEMONICO_ICONE_LOGOUT_VOLTAR}}", 
                "in", 
                $htmVoltarIcon 
            );

            $htmRegisterView = str_replace( 
            	"{{MNEMONICO_ICON_VOLTAR}}", 
            	$htmVoltarIcon, 
            	$htmRegisterView 
            );

            $sSelectEtniaOptions        = "<option value='teste'>select etnia</option>";
            $sSelectGeneroOptions       = "<option value='teste'>select genero</option>";
            $sSelectEscolaridadeOptions = "<option value='teste'>select escolaridade</option>";

            $sSelectUserTypeOptions  = "";
            $sSelectUserTypeOptions .= "<option value=''>Sou um...</option>";
            $sSelectUserTypeOptions .= "<option value='P'>Professor</option>";
            $sSelectUserTypeOptions .= "<option value='A'>Aluno</option>";

            $aDisciplinas = [];

            $oConsultaDb = new RegisterModel;
            $oConsultaDb->getDisciplinas( $aDisciplinas );

            $sSelectDisciplinaOptions = "<option value=''>Disciplinas</option>";

            foreach( $aDisciplinas as $item ){
                $sSelectDisciplinaOptions .= "<option>" . $item[ "nome" ] . "</option>";
            }

            $htmRegisterView = str_replace( 
                "{{MNEMONICO_SELECT_ETNIA}}", 
                $sSelectEtniaOptions, 
                $htmRegisterView 
            );  ////    Select Etnia

            $htmRegisterView = str_replace( 
                "{{MNEMONICO_SELECT_GENERO}}", 
                $sSelectGeneroOptions, 
                $htmRegisterView 
            );  ////    Select Genero

            $htmRegisterView = str_replace( 
                "{{MNEMONICO_SELECT_ESCOLARIDADE}}", 
                $sSelectEscolaridadeOptions, 
                $htmRegisterView 
            );  ////    Select Escolaridade

            $htmRegisterView = str_replace( 
            	"{{MNEMONICO_SELECT_USER_TYPE}}", 
            	$sSelectUserTypeOptions, 
            	$htmRegisterView 
            );  ////    Select Tipo Usuario

            $htmRegisterView = str_replace( 
            	"{{MNEMONICO_SELECT_DISCIPLINA}}", 
            	$sSelectDisciplinaOptions, 
            	$htmRegisterView 
            );  //// Select Disciplinas

            echo $htmRegisterView;
        }
    }

 ?>
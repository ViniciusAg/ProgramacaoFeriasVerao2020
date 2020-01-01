<?php

    class RegisterController{
    	private function setNewUser(){
    		// $oRequestNewUser = new RegisterModel;
    		echo "<script>window.alert( 'Usuário cadastrado com sucesso! :)' )</script>";
    	}
    	
    	public function verifyNewRegisterForm( &$bRegistrationSuccessfully ){
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
            
            $bFormValidado = true;

            if ( $bFormValidado ){
                RegisterController::setNewUser();
                $bRegistrationSuccessfully = true;
            }
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

            $sSelectUserTypeOptions  = "";
            $sSelectUserTypeOptions .= "<option value=''>Sou um...</option>";
            $sSelectUserTypeOptions .= "<option value='Professor'>Professor</option>";
            $sSelectUserTypeOptions .= "<option value='Aluno'>Aluno</option>";

            $oConsultaDb = new RegisterModel;

            $aEtnias = [];
            $oConsultaDb->getEtnias( $aEtnias );
            $sSelectEtniaOptions =      "<option value=''>Etnia</option>";
            foreach( $aEtnias as $item ){
                $sSelectEtniaOptions .= "<option>" . $item[ "nome" ] . "</option>";
            }   ////    Consulta DataBase Etnias

            $aGenero = [];
            $oConsultaDb->getGenero( $aGenero );
            $sSelectGeneroOptions =      "<option value=''>Gênero</option>";
            foreach( $aGenero as $item ){
                $sSelectGeneroOptions .= "<option>" . $item[ "nome" ] . "</option>";
            }   ////    Consulta DataBase Genero

            $aEscolaridade = [];
            $oConsultaDb->getEscolaridade( $aEscolaridade );
            $sSelectEscolaridadeOptions =      "<option value=''>Escolaridade</option>";
            foreach( $aEscolaridade as $item ){
                $sSelectEscolaridadeOptions .= "<option>" . $item[ "nome" ] . "</option>";
            }   ////    Consulta DataBase Escolaridade

            $aDisciplinas = [];
            $oConsultaDb->getDisciplinas( $aDisciplinas );
            $sSelectDisciplinaOptions =     "<option value=''>Disciplinas</option>";
            foreach( $aDisciplinas as $item ){
                $sSelectDisciplinaOptions .= "<option>" . $item[ "nome" ] . "</option>";
            }   ////    Consulta DataBase Disciplinas

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
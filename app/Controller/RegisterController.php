<?php

    class RegisterController{

    	public function verifyNewRegisterForm( &$bRegistrationSuccessfully ){
            $aValuesFromPostFormToCheck = [
                "NomeCompleto"        => NULL,
                "CPF"                 => NULL,
                "DataNascimento"      => NULL,
                "UsuarioEtnia"        => NULL,
                "UsuarioGenero"       => NULL,
                "UsuarioTelefone"     => NULL,
                "UsuarioEscolaridade" => NULL,
                "CEP"                 => NULL,
                "Logradouro"          => NULL,
                "Numero"              => NULL,
                "Complemento"         => NULL,
                "Bairro"              => NULL,
                "Cidade"              => NULL,
                "EmailAdress"         => NULL,
                "TipoUsuario"         => NULL,
                "Disciplinas"         => NULL,
                "EscolaEnsinoMedio"   => NULL,
                "UserPassword"        => NULL,
                "ReUserPassword"      => NULL
            ]; $oCore = new Core;
            $oCore->getThoseTextValuesFromPostForm( $aValuesFromPostFormToCheck );

            $aDisciplinas = filter_input( 
                INPUT_POST, 
                "Disciplinas",
                FILTER_SANITIZE_STRING,
                FILTER_REQUIRE_ARRAY
            ); $aValuesFromPostFormToCheck[ "Disciplinas" ] = $aDisciplinas;

            $sEmailAdress = filter_input( 
                INPUT_POST, 
                "EmailAdress",
                FILTER_SANITIZE_STRING,
                FILTER_SANITIZE_EMAIL
            ); $aValuesFromPostFormToCheck[ "EmailAdress" ] = $sEmailAdress;

            ////    Validacao Form

            $oRegisterModel = new RegisterModel;
            
            $oRegistroExistente = $oRegisterModel->getItemInCadastrosUsuariosByColumnName( 
                $sEmailAdress, 
                "email" 
            );

            $bFormValidado = false;

            // if ( !(isset( $oRegisterModel->num_rows )) )
            //     $bFormValidado = true;

            if ( $oRegistroExistente->num_rows == 0  )
                $bFormValidado = true;

            ////    Validacao Form Final

            if ( $bFormValidado ){
                $oRegisterModel->setNewUser( $aValuesFromPostFormToCheck, $bRegistrationSuccessfully );
            } else {
                $bRegistrationSuccessfully = false;
                echo "<script>window.alert( 'O email " . $sEmailAdress . " é invalido!' );</script>";
            }
        }

        public function index(){
            $htmRegisterView = file_get_contents( "app/View/RegisterView.html" );
            $htmVoltarIcon   = file_get_contents( "app/View/LogoutView/ButtonQuit.html" );

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
            $sSelectUserTypeOptions .= "<option value='7'>Professor</option>";
            $sSelectUserTypeOptions .= "<option value='8'>Aluno</option>";

            $oConsultaDb = new RegisterModel;

            $aEtnias = "etnia";
            $oConsultaDb->getItemInCadastrosGeraisById_Tipo( $aEtnias );
            $sSelectEtniaOptions =      "<option value=''>Etnia</option>";
            foreach( $aEtnias as $item ){
                $sSelectEtniaOptions .= "<option value='" . $item[ "id" ] . "'>";
                $sSelectEtniaOptions .=     $item[ "nome" ];
                $sSelectEtniaOptions .= "</option>";
            }   ////    Consulta DataBase Etnias

            $aGenero = "genero";
            $oConsultaDb->getItemInCadastrosGeraisById_Tipo( $aGenero );
            $sSelectGeneroOptions =      "<option value=''>Gênero</option>";
            foreach( $aGenero as $item ){
                $sSelectGeneroOptions .= "<option value='" . $item[ "id" ] . "'>";
                $sSelectGeneroOptions .=     $item[ "nome" ];
                $sSelectGeneroOptions .= "</option>";
            }   ////    Consulta DataBase Genero

            $aEscolaridade = "escolaridade";
            $oConsultaDb->getItemInCadastrosGeraisById_Tipo( $aEscolaridade );
            $sSelectEscolaridadeOptions =      "<option value=''>Escolaridade</option>";
            foreach( $aEscolaridade as $item ){
                $sSelectEscolaridadeOptions .= "<option value='" . $item[ "id" ] . "'>";
                $sSelectEscolaridadeOptions .=     $item[ "nome" ];
                $sSelectEscolaridadeOptions .= "</option>";
            }   ////    Consulta DataBase Escolaridade

            $aDisciplinas = "disciplina";
            $oConsultaDb->getItemInCadastrosGeraisById_Tipo( $aDisciplinas );
            $sSelectDisciplinaOptions =     "<option value=''>Disciplinas</option>";
            foreach( $aDisciplinas as $item ){
                $sSelectDisciplinaOptions .= "<option value='" . $item[ "id" ] . "'>";
                $sSelectDisciplinaOptions .=     $item[ "nome" ];
                $sSelectDisciplinaOptions .= "</option>";
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
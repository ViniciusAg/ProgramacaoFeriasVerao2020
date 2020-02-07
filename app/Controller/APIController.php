<?php

    class APIController{
        public function setPresenceTo( $aAlunosPresentes ){
            $oAPIModel = new APIModel;
            $sRetorno  = $oAPIModel->setPresenceTo( $aAlunosPresentes );

            echo json_encode( '{ "message": "' . $sRetorno . '" }' );
        }

        public function ActiveThisUser( &$sUserToManage ){

            $sDataUser = NULL;

            $oAPIModel = new APIModel;
            $sDataUser = $oAPIModel->ActiveThisUser( $sUserToManage );
            
            if ( $sUserToManage == "success" ){
                $sMessage = "Usuário ativo com sucesso!";

                $sEndereco    = $sDataUser[ "logradouro" ].", No".$sDataUser[ "numero" ];
                $sEndereco   .= " - ".$sDataUser[ "bairro" ].", ".$sDataUser[ "cidade" ];

                $sRowToShow  = '{ ';
                $sRowToShow .=   '"id" : "'                  . $sDataUser[ "id" ]                  . '", ';
                $sRowToShow .=   '"nome" : "'                . $sDataUser[ "nome" ]                . '", ';
                $sRowToShow .=   '"data_nascimento" : "'     . $sDataUser[ "data_nascimento" ]     . '", ';
                $sRowToShow .=   '"etnia" : "'               . $sDataUser[ "etnia" ]               . '", ';
                $sRowToShow .=   '"genero" : "'              . $sDataUser[ "genero" ]              . '", ';
                $sRowToShow .=   '"ano_matricula" : "'       . $sDataUser[ "ano_matricula" ]       . '", ';
                $sRowToShow .=   '"escolaridade" : "'        . $sDataUser[ "escolaridade" ]        . '", ';
                $sRowToShow .=   '"escola_ensino_medio" : "' . $sDataUser[ "escola_ensino_medio" ] . '", ';
                $sRowToShow .=   '"endereco" : "'            . $sEndereco                          . '", ';
                $sRowToShow .=   '"email" : "'               . $sDataUser[ "email" ]               . '", ';
                $sRowToShow .=   '"whatsapp" : "'            . $sDataUser[ "whatsapp" ]            . '", ';
                $sRowToShow .=   '"tipo" : "'                . $sDataUser[ "tipo_usuario" ]        . '" ';
                $sRowToShow .= '}';
            } else
                $sMessage = "Oops... algo deu errado!";

            $sObjetoDataUser  = '{ ';
            $sObjetoDataUser .=      '"status: "'  . $sUserToManage . '", ';
            $sObjetoDataUser .=      '"message: "' . $sMessage      . '", ';
            $sObjetoDataUser .=      '"newRow": "' . $sRowToShow    . '" ';
            $sObjetoDataUser .= '}' ;

            // echo json_encode( $sObjetoDataUser );
            echo json_encode( $sRowToShow );
        }
        public function checkThisEmail( &$sEmailValido ){

            $oAPIModel = new APIModel;
            $oAPIModel->checkThisEmail( $sEmailValido );
            
            echo json_encode( '{ "EmailValido": ' . ( ($sEmailValido)?('true'):('false') ) . ' }' );
        }
    }

 ?>
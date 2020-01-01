<?php

    class RegisterModel{

        public function getTypesOfUsers( &$aTypesOfUsers ){
            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();

            $sQuery  = "SELECT DISTINCT tipo from cadastros";

            $aTypesOfUsers = $oDbLink->query( $sQuery );
        }   ////    Consulta DataBase Tipos Usuarios

        public function getEtnias( &$aEtnias ){
            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();

            $sQuery  = "SELECT nome FROM cadastros_gerais WHERE (tipo = '6')";

            $aEtnias = $oDbLink->query( $sQuery );
        }   ////    Consulta DataBase Etnias

        public function getGenero( &$aGenero ){
            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();

            $sQuery  = "SELECT id, nome FROM cadastros_gerais WHERE (tipo = '7')";

            $aGenero = $oDbLink->query( $sQuery );
        }   ////    Consulta DataBase Genero

        public function getEscolaridade( &$aEscolaridade ){
            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();

            $sQuery  = "SELECT id, nome FROM cadastros_gerais WHERE (tipo = '8')";

            $aEscolaridade = $oDbLink->query( $sQuery );
        }   ////    Consulta DataBase Escolaridade

        public function getDisciplinas( &$aDisciplinas ){
            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();

            $sQuery  = "SELECT id, nome FROM cadastros_gerais WHERE (tipo = '1')";

            $aDisciplinas = $oDbLink->query( $sQuery );
        }   ////    Consulta DataBase Disciplinas

        public function setNewUser( $sNewValues ){

            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();
            $oRes = NULL;

            // if ( ($sLoginPass > "") && ($sLoginUser > "") ){
            if ( $sLoginPass > "" ){
                $sEcrypted = md5( $sLoginPass );

                // $sQuery  = "select * from cadastros ";
                // $sQuery .= "where ( rg = ". $sLoginUser ." ) and ( senha = '". $sEcrypted ."' )";

                $sQuery  = "select * from cadastros_usuarios where ( senha = '" . $sEcrypted . "' )";

                $oRes = $oDbLink->query( $sQuery );
            } return $oRes;
        }
    }

 ?>
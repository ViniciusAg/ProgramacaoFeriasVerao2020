<?php

    class RegisterModel{

        public function getTypesOfUsers( &$aTypesOfUsers ){
            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();

            $sQuery  = "SELECT DISTINCT tipo from cadastros";

            $aTypesOfUsers = $oDbLink->query( $sQuery );

            // $aTypesOfUsers = "tipo usuario";
        }

        public function getDisciplinas( &$aDisciplinas ){
            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();

            $sQuery  = "SELECT nome FROM cadastros WHERE (tipo = 'D')";

            $aDisciplinas = $oDbLink->query( $sQuery );

            // $aDisciplinas = array( 
            //     "item1" => array(
            //         "nome" => "hello world"
            //     ),
            //     "item2" => array(
            //         "nome" => "oi mundo"
            //     )
            // );
        }

        public function setNewUser( $sNewValues ){

            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();
            $oRes = NULL;

            // if ( ($sLoginPass > "") && ($sLoginUser > "") ){
            if ( $sLoginPass > "" ){
                $sEcrypted = md5( $sLoginPass );

                // $sQuery  = "select * from cadastros ";
                // $sQuery .= "where ( rg = ". $sLoginUser ." ) and ( senha = '". $sEcrypted ."' )";

                $sQuery  = "select * from cadastros where ( senha = '" . $sEcrypted . "' )";

                $oRes = $oDbLink->query( $sQuery );
            } return $oRes;
        }
    }

 ?>
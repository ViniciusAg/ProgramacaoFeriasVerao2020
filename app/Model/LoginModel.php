<?php

    class LoginModel{
        public function validateLogin( $sLoginUser, $sLoginPass ){

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
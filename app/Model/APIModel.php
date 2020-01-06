<?php

    class APIModel{
        public function ActiveThisUser( &$sUserToManage ){
            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();

            $sIdUsuario = mysqli_real_escape_string( $oDbLink, $sUserToManage );
            $oRes = NULL;

            // $sQuery  = "SELECT id FROM cadastros_usuarios WHERE ( email = '" . $sUserToManage . "' )";
            $sQuery = "UPDATE cadastros_usuarios SET id_status = 18 WHERE id = " . $sIdUsuario . ";";

            $oRes = $oDbLink->query( $sQuery );

            if ( isset( $oRes ) )
                $sUserToManage = "success";
            else
                $sUserToManage = "error";
        }
        public function checkThisEmail( &$sEmailAdress ){

            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();

            $sEmailToCheck = mysqli_real_escape_string( $oDbLink, $sEmailAdress );
            $oRes = NULL;

            $sQuery  = "SELECT id FROM cadastros_usuarios WHERE ( email = '" . $sEmailAdress . "' )";

            $oRes = $oDbLink->query( $sQuery );

            if ( (isset( $oRes )) && ($oRes->num_rows > 0) )
                $sEmailAdress = false;
            else
                $sEmailAdress = true;
        }
    }

 ?>
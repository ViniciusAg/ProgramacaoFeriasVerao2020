<?php

    class APIModel{
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
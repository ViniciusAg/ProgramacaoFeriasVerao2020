<?php

    class APIController{
        public function checkThisEmail( &$sEmailValido ){

            $oAPIMODEL = new APIModel;
            $oAPIMODEL->checkThisEmail( $sEmailValido );
            
            echo json_encode( '{ "EmailValido": ' . ( ($sEmailValido)?('true'):('false') ) . ' }' );
        }
    }

 ?>
<?php

    class APIController{
        public function ActiveThisUser( &$sUserToManage ){

            $oAPIMODEL = new APIModel;
            $oAPIMODEL->ActiveThisUser( $sUserToManage );
            
            $sMessage = "Operação Efetuada Com Sucesso";
            echo json_encode( '{ "status": "' . $sUserToManage . '", "message": "' . $sMessage . '" }' );
        }
        public function checkThisEmail( &$sEmailValido ){

            $oAPIMODEL = new APIModel;
            $oAPIMODEL->checkThisEmail( $sEmailValido );
            
            echo json_encode( '{ "EmailValido": ' . ( ($sEmailValido)?('true'):('false') ) . ' }' );
        }
    }

 ?>
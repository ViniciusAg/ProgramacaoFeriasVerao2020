<?php

    class LoginModel{
        public function validateLogin( $sLoginUser, $sLoginPass ){

            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();
            $oRes = NULL;

            $sLoginUser = mysqli_real_escape_string( $oDbLink, $sLoginUser );
            $sLoginUser = mysqli_real_escape_string( $oDbLink, $sLoginUser );

            if ( ($sLoginPass > "") && ($sLoginUser > "") ){
                $sEcrypted = md5( $sLoginPass );

                $sColunas = "`id`, `id_tipo_usuario`, `id_status`, `nome`, `whatsapp`";

                $sQuery  = "SELECT " . $sColunas . " FROM cadastros_usuarios ";
                $sQuery .= "WHERE ( email = '" . $sLoginUser . "' ) AND ( senha = '" . $sEcrypted . "' )";

                $oRes = $oDbLink->query( $sQuery );
            } return $oRes;
        }
    }

 ?>
<?php

    class ProfessorModel{
        public function getListagemDaTurma(){

            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();
            $oRes = NULL;

            $sQuery  = "SELECT id, nome FROM cadastros_usuarios WHERE (id_tipo_usuario = '8') ORDER BY nome";

            $oRes = $oDbLink->query( $sQuery );

            return $oRes;
        }
    }

 ?>
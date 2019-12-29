<?php

    class ProfessorModel{
        public function getListagemDaTurma(){

            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();
            $oRes = NULL;

            $sQuery  = "SELECT id, nome FROM cadastros WHERE (tipo = 'A') ORDER BY nome";

            $oRes = $oDbLink->query( $sQuery );

            return $oRes;
        }
    }

 ?>
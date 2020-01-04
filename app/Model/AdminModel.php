<?php

    class AdminModel{
        public function getUsuariosSemAcesso( 
            &$oUsuariosAguardandoAprovacao,
            &$oUsuariosInativos
        ){
            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();
            $oRes = NULL;



            $sColunas  = "id, "            . "nome, "            . "data_nascimento, "; 
            $sColunas .= "ano_matricula, " . "id_escolaridade, " . "escola_ensino_medio, "; 
            $sColunas .= "email, "         . "whatsapp, "        . "id_tipo_usuario"; 

            $sQuery  = "SELECT " . $sColunas . " FROM cadastros_usuarios WHERE (id_status = 20) ORDER BY nome";
            $oUsuariosAguardandoAprovacao = $oDbLink->query( $sQuery ); ////    Query UsrsAguardandoAprovacao

            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();
            $oRes = NULL;

            $sColunas  = "id, "            . "nome, "            . "data_nascimento, "; 
            $sColunas .= "ano_matricula, " . "id_escolaridade, " . "escola_ensino_medio, "; 
            $sColunas .= "email, "         . "whatsapp, "        . "id_tipo_usuario"; 

            $sQuery  = "SELECT " . $sColunas . " FROM cadastros_usuarios WHERE (id_status = 19) ORDER BY nome";
            $oUsuariosInativos = $oDbLink->query( $sQuery );    ////    Query UsuariosInativos
        }

        public function getUsuariosInativos( &$oUsuariosInativos ){

            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();
            $oRes = NULL;

            $sColunas  = "id, "            . "nome, "            . "data_nascimento, "; 
            $sColunas .= "ano_matricula, " . "id_escolaridade, " . "escola_ensino_medio, "; 
            $sColunas .= "email, "         . "whatsapp, "        . "id_tipo_usuario"; 

            $sQuery  = "SELECT " . $sColunas . " FROM cadastros_usuarios WHERE (id_status = 19) ORDER BY nome";

            $oUsuariosInativos = $oDbLink->query( $sQuery );
        }
    }

 ?>
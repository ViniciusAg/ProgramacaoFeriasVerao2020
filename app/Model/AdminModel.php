<?php

    class AdminModel{
        public function getUsuariosRegistrados( &$oResultadoQuery ){
            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();

            $sQuery = file_get_contents( "app/Model/Query/UsuariosRegistradosQuery.txt" );
            
            $oResultadoQuery = $oDbLink->query( $sQuery );
         }

        public function getUsuariosSemAcesso( 
            &$oUsuariosAguardandoAprovacao,
            &$oUsuariosInativos
        ){
            $oUsuariosRegistrados = NULL;
            AdminModel::getUsuariosRegistrados( $oUsuariosAguardandoAprovacao );
            AdminModel::getUsuariosRegistrados( $oUsuariosInativos );
        }
    }

 ?>
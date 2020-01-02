<?php

    class UsuarioSemAcessoController{
        public function index(){
            $htmAguardandoAprovacaoView = file_get_contents( "app/View/UsuarioSemAcessoView.html" );

            $oController = new LogoutController;
            $oController->index( $htmAguardandoAprovacaoView );

            $htmAguardandoAprovacaoView = str_replace( 
                "{{MNEMONICO_NOME_USUARIO}}", 
                $_SESSION[ "nome" ], 
                $htmAguardandoAprovacaoView
             );

            $htmAguardandoAprovacaoView = str_replace( 
                "{{MNEMONICO_TELEFONE_USUARIO}}", 
                $_SESSION[ "whatsapp" ], 
                $htmAguardandoAprovacaoView
             );

            $htmAguardandoAprovacaoView = str_replace( 
                "{{MNEMONICO_STATUS_USUARIO}}", 
                $_SESSION[ "StatusDescricao" ], 
                $htmAguardandoAprovacaoView
             );

            echo $htmAguardandoAprovacaoView; 
        }
    }

 ?>
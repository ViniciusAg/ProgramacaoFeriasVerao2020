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

            $sClasseStatus = NULL;

            if ( ($_SESSION[ "StatusDescricao" ] == "Aguardando Confirmação") ){
                $sClasseStatus = "item-laranja";
                $sTextoUsuarioSemAcesso  = "Falta pouco, sua inscrição ainda precisa ser verificada.<br/><br/>";
                $sTextoUsuarioSemAcesso .= "Entraremos em contato com você em breve pelo número ";
                $sTextoUsuarioSemAcesso .= $_SESSION[ "whatsapp" ] . "<br/><br/>";
                $sTextoUsuarioSemAcesso .= "Obrigado pelo interesse!";
            } else{
                $sClasseStatus = "item-vermelho";
                $sTextoUsuarioSemAcesso  = "Parece que seu usuário foi inativado. :( <br/><br/>";
                $sTextoUsuarioSemAcesso .= "Procure-nos no cursinho para mais informações.";
            }

            $htmAguardandoAprovacaoView = str_replace( 
                "{{MNEMONICO_SAUDACOES_NOVO_USUARIO}}", 
                $sTextoUsuarioSemAcesso, 
                $htmAguardandoAprovacaoView
             );

            $htmAguardandoAprovacaoView = str_replace( 
                "{{MNEMONICO_MENSAGEM_USUARIO_SEM_ACESSO}}", 
                $sTextoUsuarioSemAcesso, 
                $htmAguardandoAprovacaoView
             );

            $htmAguardandoAprovacaoView = str_replace( 
                "{{MNEMONICO_COR_STATUS_USUARIO}}", 
                $sClasseStatus, 
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
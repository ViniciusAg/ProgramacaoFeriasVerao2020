<?php

    class AdminController{
        public function index(){
            $htmAdminView = file_get_contents( "app/View/AdminView.html" );

            $oController = new LogoutController;
            $oController->index( $htmAdminView );

            $htmUsuariosSemAcesso = file_get_contents( "app/View/AdminView-UsuariosSemAcesso.html" );
            $htmUsuariosAtivos 	  = file_get_contents( "app/View/AdminView-UsuariosAtivos.html" );
            $htmAulasDadas 		  = file_get_contents( "app/View/AdminView-AulasDadas.html" );
            $htmAulasAssistidas   = file_get_contents( "app/View/AdminView-AulasAssistidas.html" );
            $htmOpcoesRegistro 	  = file_get_contents( "app/View/AdminView-OpcoesRegistro.html" );

            $oAdminModel = new AdminModel;

            $htmAdminView = str_replace( 
                "{{MNEMONICO_USUARIO_NOME}}",
                $_SESSION[ "nome" ], 
                $htmAdminView
             );

            $oUsuariosSemAcesso = NULL;
            $oUsuariosInativos = NULL;

            $htmAdminView = str_replace( 
            	"{{MNEMONICO_SEGMENT_USUARIOS_SEM_ACESSO}}", 
            	$htmUsuariosSemAcesso, 
            	$htmAdminView
             ); 

            $oAdminModel->getUsuariosSemAcesso( $oUsuariosSemAcesso );
            $sTableUsuariosSemAcessoRows = "";
            foreach ($oUsuariosSemAcesso as $key => $value) {
                $sTableUsuariosSemAcessoRows .= "<tr>";
                $sTableUsuariosSemAcessoRows .=   "<td>" . $value[ "nome" ]                . "</td>";
                $sTableUsuariosSemAcessoRows .=   "<td>" . $value[ "data_nascimento" ]     . "</td>";
                $sTableUsuariosSemAcessoRows .=   "<td>" . $value[ "ano_matricula" ]       . "</td>";
                $sTableUsuariosSemAcessoRows .=   "<td>" . $value[ "id_escolaridade" ]     . "</td>";
                $sTableUsuariosSemAcessoRows .=   "<td>" . $value[ "escola_ensino_medio" ] . "</td>";
                $sTableUsuariosSemAcessoRows .=   "<td>" . $value[ "email" ]               . "</td>";
                $sTableUsuariosSemAcessoRows .=   "<td>" . $value[ "whatsapp" ]            . "</td>";
                $sTableUsuariosSemAcessoRows .=   "<td>" . $value[ "id_tipo_usuario" ]     . "</td>";
                $sTableUsuariosSemAcessoRows .=   "<td><a class='ui green large label'>Aceitar</a></td>";
                $sTableUsuariosSemAcessoRows .= "</tr>";
            }

            $htmAdminView = str_replace( 
                "{{MNEMONICO_TBODY_USUARIOS_SEM_ACESSO}}",
                $sTableUsuariosSemAcessoRows, 
                $htmAdminView
             );

            $oAdminModel->getUsuariosInativos( $oUsuariosInativos );
            $sTableUsuariosInativosRows = "";
            foreach ($oUsuariosInativos as $key => $value) {
                $sTableUsuariosInativosRows .= "<tr>";
                $sTableUsuariosInativosRows .=   "<td>" . $value[ "nome" ]                . "</td>";
                $sTableUsuariosInativosRows .=   "<td>" . $value[ "data_nascimento" ]     . "</td>";
                $sTableUsuariosInativosRows .=   "<td>" . $value[ "ano_matricula" ]       . "</td>";
                $sTableUsuariosInativosRows .=   "<td>" . $value[ "id_escolaridade" ]     . "</td>";
                $sTableUsuariosInativosRows .=   "<td>" . $value[ "escola_ensino_medio" ] . "</td>";
                $sTableUsuariosInativosRows .=   "<td>" . $value[ "email" ]               . "</td>";
                $sTableUsuariosInativosRows .=   "<td>" . $value[ "whatsapp" ]            . "</td>";
                $sTableUsuariosInativosRows .=   "<td>" . $value[ "id_tipo_usuario" ]     . "</td>";
                $sTableUsuariosInativosRows .=   "<td><a class='ui green large label'>Ativar</a></td>";
                $sTableUsuariosInativosRows .= "</tr>";
            }

            $htmAdminView = str_replace( 
                "{{MNEMONICO_TBODY_USUARIOS_INATIVOS}}",
                $sTableUsuariosInativosRows, 
                $htmAdminView
             );

            $htmAdminView = str_replace( 
            	"{{MNEMONICO_SEGMENT_USUARIOS_ATIVOS}}", 
            	$htmUsuariosAtivos, 
            	$htmAdminView
             );
            $htmAdminView = str_replace( 
            	"{{MNEMONICO_SEGMENT_AULAS_DADAS}}", 
            	$htmAulasDadas, 
            	$htmAdminView
             );
            $htmAdminView = str_replace( 
            	"{{MNEMONICO_SEGMENT_AULAS_ASSISTIDAS}}", 
            	$htmAulasAssistidas, 
            	$htmAdminView
             );
            $htmAdminView = str_replace( 
            	"{{MNEMONICO_SEGMENT_OPCOES_REGISTRO}}", 
            	$htmOpcoesRegistro, 
            	$htmAdminView
             );
            
            echo $htmAdminView;
        }
    }

 ?>
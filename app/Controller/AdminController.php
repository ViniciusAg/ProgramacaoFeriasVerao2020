<?php
    class AdminController{
        private function getUsuariosSemAcesso( &$htmIndex, $oAdminModel ){
            $htmUsuariosSemAcesso = file_get_contents( "app/View/AdminView/AbaMenuUsuariosSemAcesso.html" );
            $htmUsuariosAtivos 	  = file_get_contents( "app/View/AdminView/AbaMenuUsuariosAtivos.html" );

            $htmIndex = str_replace( 
            	"{{MNEMONICO_SEGMENT_USUARIOS_SEM_ACESSO}}", 
            	$htmUsuariosSemAcesso, 
            	$htmIndex
             ); ////    Carrega Janela Usuarios Sem Acesso

            $oUsuariosAguardandoAprovacao = NULL;
            $oUsuariosInativos            = NULL;

            $oAdminModel->getUsuariosSemAcesso( 
                $oUsuariosAguardandoAprovacao, 
                $oUsuariosInativos
             ); ////    Consulta Usuarios Sem Acesso
             
            $sTableUsrsAguardandoAprovacaoRows = "";
            foreach ($oUsuariosAguardandoAprovacao as $key => $value) {
                $sTableUsrsAguardandoAprovacaoRows .= "<tr>";
                $sTableUsrsAguardandoAprovacaoRows .=   "<td>" . $value[ "nome" ]                . "</td>";
                $sTableUsrsAguardandoAprovacaoRows .=   "<td>" . $value[ "data_nascimento" ]     . "</td>";
                $sTableUsrsAguardandoAprovacaoRows .=   "<td>" . $value[ "ano_matricula" ]       . "</td>";
                $sTableUsrsAguardandoAprovacaoRows .=   "<td>" . $value[ "id_escolaridade" ]     . "</td>";
                $sTableUsrsAguardandoAprovacaoRows .=   "<td>" . $value[ "escola_ensino_medio" ] . "</td>";
                $sTableUsrsAguardandoAprovacaoRows .=   "<td>" . $value[ "email" ]               . "</td>";
                $sTableUsrsAguardandoAprovacaoRows .=   "<td>" . $value[ "whatsapp" ]            . "</td>";
                $sTableUsrsAguardandoAprovacaoRows .=   "<td>" . $value[ "id_tipo_usuario" ]     . "</td>";
                $sTableUsrsAguardandoAprovacaoRows .=   "<td><a class='ui green large label'>Aceitar</a></td>";
                $sTableUsrsAguardandoAprovacaoRows .= "</tr>";
            }   $htmIndex = str_replace( 
                "{{MNEMONICO_TBODY_USUARIOS_AGUARDANDO_APROVACAO}}",
                $sTableUsrsAguardandoAprovacaoRows, 
                $htmIndex
             ); ////   Alimenta Table Usuarios Aguardando Aprovacao 

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
            }   $htmIndex = str_replace( 
                "{{MNEMONICO_TBODY_USUARIOS_INATIVOS}}",
                $sTableUsuariosInativosRows, 
                $htmIndex
            );  ////   Alimenta Table Usuarios Inativos
        }

        public function index(){
            $htmIndex = file_get_contents( "app/View/AdminView/index.html" );

            $oController = new LogoutController;
            $oController->index( $htmIndex );

            $htmUsuariosAtivos 	  = file_get_contents( "app/View/AdminView/AbaMenuUsuariosAtivos.html" );
            $htmAulasDadas 		  = file_get_contents( "app/View/AdminView/AbaMenuAulasDadas.html" );
            $htmAulasAssistidas   = file_get_contents( "app/View/AdminView/AbaMenuAulasAssistidas.html" );
            $htmOpcoesRegistro 	  = file_get_contents( "app/View/AdminView/AbaMenuOpcoesRegistro.html" );

            $oAdminModel = new AdminModel;

            $htmIndex = str_replace( 
                "{{MNEMONICO_USUARIO_NOME}}",
                $_SESSION[ "nome" ], 
                $htmIndex
             ); ////    Titulo Boas Vindas

            $oUsuariosInativos = NULL;

            AdminController::getUsuariosSemAcesso( $htmIndex, $oAdminModel );

            $htmIndex = str_replace( 
            	"{{MNEMONICO_SEGMENT_USUARIOS_ATIVOS}}", 
            	$htmUsuariosAtivos, 
            	$htmIndex
             );
            $htmIndex = str_replace( 
            	"{{MNEMONICO_SEGMENT_AULAS_DADAS}}", 
            	$htmAulasDadas, 
            	$htmIndex
             );
            $htmIndex = str_replace( 
            	"{{MNEMONICO_SEGMENT_AULAS_ASSISTIDAS}}", 
            	$htmAulasAssistidas, 
            	$htmIndex
             );
            $htmIndex = str_replace( 
            	"{{MNEMONICO_SEGMENT_OPCOES_REGISTRO}}", 
            	$htmOpcoesRegistro, 
            	$htmIndex
             );
            
            echo $htmIndex;
        }
    }

 ?>
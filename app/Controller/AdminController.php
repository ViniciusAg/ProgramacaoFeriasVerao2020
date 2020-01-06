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

            $oUsuariosRegistrados = NULL;

            $oAdminModel->getUsuariosRegistrados( $oUsuariosRegistrados );
             
            $sTableUsrsAguardandoAprovacaoRows = "";
            $sTableUsuariosInativosRows = "";

            //  $sBotaoAtivar = "<a class='ui green large label' onclick='setUsuarioAtivo( $( this ) );'>Ativar</a>";

            foreach ( $oUsuariosRegistrados as $key => $value ) {
                $sId = $value[ "id" ];

                $sRowToShow  = "";
                $sRowToShow .= "<tr id='TR" . $sId . "'>";
                $sRowToShow .=   "<td id='NM" . $sId . "'>" . $value[ "nome" ]          . "</td>";
                $sRowToShow .=   "<td>" . $value[ "data_nascimento" ]                   . "</td>";
                $sRowToShow .=   "<td>" . $value[ "ano_matricula" ]                     . "</td>";
                $sRowToShow .=   "<td>" . $value[ "escolaridade" ]                      . "</td>";
                $sRowToShow .=   "<td>" . $value[ "escola_ensino_medio" ]               . "</td>";
                $sRowToShow .=   "<td>" . $value[ "email" ]                             . "</td>";
                $sRowToShow .=   "<td>" . $value[ "whatsapp" ]                          . "</td>";
                $sRowToShow .=   "<td id='USR" . $sId . "'>" . $value[ "tipo_usuario" ] . "</td>";

                $sBotaoAtivar  = "<a ";
                $sBotaoAtivar .=    "class='ui green large label'";
                $sBotaoAtivar .=    "onclick='showModalAtivaUsuario( " . $value[ "id" ] . " );'>";
                $sBotaoAtivar .=    "Ativar";
                $sBotaoAtivar .= "</a>";

                $sRowToShow .=   "<td>" . $sBotaoAtivar . "</td>";
                $sRowToShow .= "</tr>";

                if ( $value[ "status" ] == "Inativo" )
                    $sTableUsuariosInativosRows .= $sRowToShow;
                else if ( $value[ "status" ] != "Ativo" )
                    $sTableUsrsAguardandoAprovacaoRows .= $sRowToShow;

            }   $htmIndex = str_replace( 
                "{{MNEMONICO_TBODY_USUARIOS_AGUARDANDO_APROVACAO}}",
                $sTableUsrsAguardandoAprovacaoRows, 
                $htmIndex
             ); ////   Alimenta Table Usuarios Aguardando Aprovacao
            
            $htmIndex = str_replace( 
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
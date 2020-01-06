<?php

    class RegisterModel{

        
        public function getItemInCadastrosUsuariosByColumnName( 
            $sItemToCheck,
            $sColumnName
             ){
                $oDbLink = new Connect;
                $oDbLink = $oDbLink->start();

                $sQuery = "SELECT id FROM cadastros_usuarios WHERE " . $sColumnName . " = '" . $sItemToCheck . "'";
                
                // return $sQuery;

                return $oDbLink->query( $sQuery );
            }

        public function getIdOf( &$sIdEncontrado = NULL ){
            $aTypeOfRegisterToCheck = $sIdEncontrado;

            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start( $aTypeOfRegisterToCheck );

            foreach ($aTypeOfRegisterToCheck as $key => $value) {
                if ( $value[ "nome" ] == $sIdEncontrado )
                    $sIdEncontrado = $value[ "id" ];
            }
        }

        public function getItemInTiposCadastrosByNome( &$aNomeToFind ){
            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();
            
            RegisterModel::getIdOf( $aNomeToFind );
        }   ////    Consulta ID e NOME em TIPOS CADASTROS by nome

        public function getItemInCadastrosGeraisById_Tipo( &$aTipoCadastradoBy ){
            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();
            
            $sTypeOfRegisterToCheck = $aTipoCadastradoBy;
            $iIdTipo = NULL;
            RegisterModel::getIdOf( $sTypeOfRegisterToCheck );
            $sQuery  = "SELECT id, nome FROM cadastros_gerais WHERE (id_tipo = '" . $sTypeOfRegisterToCheck . "');";

            $aTipoCadastradoBy = $oDbLink->query( $sQuery );
        }   ////    Consulta ID e NOME em CADASTROS GERAIS by id_tipo

        public function getItemInCadastrosGeraisByNome( &$aNameOfItem ){
            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();
            
            $sNameToCheck = $aNameOfItem;
            RegisterModel::getIdOf( $sNameToCheck );
            $sQuery  = "SELECT id FROM cadastros_gerais WHERE (nome = '" . $sNameToCheck . "');";

            $aNameOfItem = $oDbLink->query( $sQuery );
        }   ////    Consulta ID em CADASTROS GERAIS by nome

        public function setNewUser( $aCheckedTextValues, &$bSuccess ){
            $sIdCadastroTipoUsuario = "tipo_usuario";         
            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start( $sIdCadastroTipoUsuario );

            $sNomeCompleto        = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "NomeCompleto" ] );
            $sNumeroCPF           = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "CPF" ] );
            $sDataNascimento      = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "DataNascimento" ] );
            $sUsuarioEtnia        = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "UsuarioEtnia" ] );
            $sUsuarioGenero       = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "UsuarioGenero" ] );
            $sUsuarioTelefone     = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "UsuarioTelefone" ] );
            $sUsuarioEscolaridade = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "UsuarioEscolaridade" ] );
            $sCEP                 = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "CEP" ] );
            $sLogradouro          = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "Logradouro" ] );
            $sNumero              = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "Numero" ] );
            $sComplemento         = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "Complemento" ] );
            $sBairro              = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "Bairro" ] );
            $sCidade              = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "Cidade" ] );
            $sEmailAdress         = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "EmailAdress" ] );
            $sTipoUsuario         = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "TipoUsuario" ] );
            $sEscolaEnsinoMedio   = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "EscolaEnsinoMedio" ] );
            $sUserPassword        = mysqli_real_escape_string( $oDbLink, $aCheckedTextValues[ "UserPassword" ] );

            $aDisciplinas = $aCheckedTextValues[ "Disciplinas" ];

            $sColunas  = "`id`, "              . "`nome`, "                . "`cpf`, ";
            $sColunas .= "`data_nascimento`, " . "`ano_matricula`, "       . "`id_etnia`, "; 
            $sColunas .= "`id_genero`, "       . "`id_escolaridade`, "     . "`cep`, "; 
            $sColunas .= "`logradouro`, "      . "`numero`, "              . "`complemento`, "; 
            $sColunas .= "`bairro`, "          . "`cidade`, "              . "`email`, ";
            $sColunas .= "`id_tipo_usuario`, " . "`escola_ensino_medio`, " . "`senha`, ";
            $sColunas .= "`whatsapp`, "        . "`id_status`, "           . "`data_cadastro` ";

            $sNewValues  =       "NULL, '"                 . $sNomeCompleto        . "', '" . $sNumeroCPF    . "', "; 
            $sNewValues .= "'" . $sDataNascimento  . "', '" . date( "Y" )           . "', '" . $sUsuarioEtnia . "', ";
            $sNewValues .= "'" . $sUsuarioGenero   . "', '" . $sUsuarioEscolaridade . "', '" . $sCEP          . "', ";
            $sNewValues .= "'" . $sLogradouro      . "', '" . $sNumero              . "', '" . $sComplemento  . "', ";
            $sNewValues .= "'" . $sBairro          . "', '" . $sCidade              . "', '" . $sEmailAdress  . "', ";
            $sNewValues .= "'" . $sTipoUsuario     . "', '" . $sEscolaEnsinoMedio   . "', '" . $sUserPassword . "', ";
            $sNewValues .= "'" . $sUsuarioTelefone . "', 20, '" . date( "Y-m-d H:i:s" ) . "'";

            $sQuery = "INSERT INTO cadastros_usuarios ( " . $sColunas . " ) VALUES ( " . $sNewValues . " );";

            $oDbLink->query( $sQuery );

            $bProfessorCadastrado = false;

            if ( ($oDbLink->insert_id) != 0 ){
                $sIdProfessorCadastrado = $oDbLink->insert_id;
                $sTipoUsuarioProfessor = "professor";
                RegisterModel::getItemInCadastrosGeraisByNome( $sTipoUsuarioProfessor );
                $sTipoUsuarioProfessor = $sTipoUsuarioProfessor->fetch_assoc()["id"];

                if ( $sTipoUsuario == $sTipoUsuarioProfessor ){
                    $bProfessorCadastrado = true;
                    foreach ( $aDisciplinas as $key => $value) {
                        $sValorTratado = mysqli_real_escape_string( $oDbLink, $value );
                        $sColunas   = "`id`, `id_disciplina`, `id_usuario`";
                        $sNewValues = "NULL, '" . $sValorTratado . "', '" .  $sIdProfessorCadastrado . "'";
                        $sQuery = "INSERT INTO relacao_disciplinas_x_usuarios ( " . $sColunas . " ) VALUES ( " . $sNewValues . " );";
                        $oDbLink->query( $sQuery );
                    }   ////    Vincula Disciplinas Ao Usuario
                }   $bSuccess = true;
                echo "<script>window.alert( 'Usuário cadastrado com sucesso!' );</script>";
            }else
                echo "<script>window.alert( 'Ocorreu um erro, tente novamente' );</script>";
        }
    }

 ?>
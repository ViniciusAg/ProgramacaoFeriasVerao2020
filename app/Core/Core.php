<?php

    class Core{

        function validateLogin( $sLoginUser, $sLoginPass ){

            ////    conecta no dataBase

            $sDbServer = "localhost";
            $sDbName = "programacaoferiasverao2020";
            $sDbUser = "root";
            $sDbPass = "";
            $oDbLink = new mysqli( $sDbServer, $sDbUser, $sDbPass, $sDbName );

            $oDbLink->set_charset( "utf8" );

            ////    conecta no dataBase final

            ////    valida login

            if ( $sLoginPass ){
                $sQuery  = "select * from cadastros where ( senha = '" . md5( $sLoginPass ) . "' )";

                $sRes = $oDbLink->query( $sQuery );

                $sEvaluated = $sRes->fetch_assoc();

                if ( $sRes->num_rows ){
                    if ( $sEvaluated[ "tipo" ] == "X" )
                        $sController = new AdminController;
                    if ( $sEvaluated[ "tipo" ] == "A" )
                        $sController = new AlunoController;
                    if ( $sEvaluated[ "tipo" ] == "P" )
                        $sController = new ProfessorController;
                }else
                    $sController = new HomeController;

                $sController->index();
            }

            ////    valida login final
        }

        public function start(){
            $sController = new HomeController;

            $sLoginUser = filter_input( 
                INPUT_POST, 
                "loginUser", 
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );

            $sLoginPass = filter_input( 
                INPUT_POST, 
                "loginPass", 
                FILTER_SANITIZE_STRING,
                FILTER_FLAG_NO_ENCODE_QUOTES
            );

            if ( isset( $sLoginUser ) && isset( $sLoginPass ) )
                Core::validateLogin( $sLoginUser, $sLoginPass );
            else
                $sController->index();
        }
    }

 ?>
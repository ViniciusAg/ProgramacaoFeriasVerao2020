<?php

    class Login{
        ////    conecta no dataBase

        $sController = new HomeController;

        $sDbServer = "localhost";
        $sDbName = "programacaoferiasverao2020";
        $sDbUser = "root";
        $sDbPass = "";
        $oDbLink = new mysqli( $sDbServer, $sDbUser, $sDbPass, $sDbName );

        $oDbLink->set_charset( "utf8" );

        ////    conecta no dataBase final

        ////    valida login

        if ( $sLoginPass ){

            $sEcrypted = md5( $sLoginPass );

            // $sQuery  = "select * from cadastros ";
            // $sQuery .= "where ( rg = ". $sLoginUser ." ) and ( senha = '". $sEcrypted ."' )";

            // $sQuery  = "select * from cadastros where ( senha = '" . md5( $sLoginPass ) . "' )";
            $sQuery  = "select * from cadastros where ( senha = '" . $sEcrypted . "' )";

            $sRes = $oDbLink->query( $sQuery );

            if ( $sRes ){
                if ( $sRes->num_rows ){
                    $sEvaluated = $sRes->fetch_assoc();
                    if ( $sEvaluated[ "tipo" ] == "X" )
                        $sController = new AdminController;
                    if ( $sEvaluated[ "tipo" ] == "A" )
                        $sController = new AlunoController;
                    if ( $sEvaluated[ "tipo" ] == "P" )
                        $sController = new ProfessorController;
                }       
            }

            $sController->index();
        }

        ////    valida login final
    }

 ?>
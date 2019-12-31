<?php

    class ProfessorController{
        public function index(){
            $oRequestAlunosTurma = new ProfessorModel;
            $oRequestAlunosTurma = $oRequestAlunosTurma->getListagemDaTurma();

            $sListagemDeAlunos = "";
            $sOnClick = 'getNewStatus( $( this ) );';

            if ( ($oRequestAlunosTurma) && ($oRequestAlunosTurma->num_rows) ){
                foreach ( $oRequestAlunosTurma as $item) {
                	$sListagemDeAlunos .= "<tr onclick='" . $sOnClick ."' ><td>" . $item[ "nome" ] . "</td></tr>";
                }
            }

            $htmProfessorView = file_get_contents( "app/View/ProfessorView.html" );
            $htmProfessorView = str_replace( "{{MNEMONICO_LISTAGEM}}" , $sListagemDeAlunos, $htmProfessorView);
            $htmProfessorView = str_replace( "{{MNEMONICO_TURMA}}", "Geral", $htmProfessorView );

            $oController = new LogoutController;
            $oController->index( $htmProfessorView );
            
            echo $htmProfessorView;

        }
    }

 ?>
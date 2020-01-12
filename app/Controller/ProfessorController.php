<?php

    class ProfessorController{
        public function index(){
            $oRequestAlunosTurma = new ProfessorModel;
            $oRequestAlunosTurma = $oRequestAlunosTurma->getListagemDaTurma();

            $sListagemDeAlunos = "";
            $sOnClick = 'getNewStatus( $( this ) );';

            if ( ($oRequestAlunosTurma) && ($oRequestAlunosTurma->num_rows) ){
                foreach ( $oRequestAlunosTurma as $item) {
                	$sListagemDeAlunos .= "<tr id='" . $item[ "id" ] . "' onclick='" . $sOnClick ."' >";
                    $sListagemDeAlunos .= "<td>" . $item[ "nome" ] . "</td>";
                    $sListagemDeAlunos .= "</tr>";
                }
            }

            $htmProfessorView = file_get_contents( "app/View/ProfessorView/index.html" );
            $htmProfessorView = str_replace( "{{MNEMONICO_LISTAGEM}}" , $sListagemDeAlunos, $htmProfessorView);
            $htmProfessorView = str_replace( "{{MNEMONICO_TURMA}}", "Geral", $htmProfessorView );

            $oController = new LogoutController;
            $oController->index( $htmProfessorView );
            
            echo $htmProfessorView;

        }
    }

 ?>
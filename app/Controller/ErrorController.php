<?php

    class ProfessorController{
        public function index(){
            $oRequestAlunosTurma = new ProfessorModel;
            $oRequestAlunosTurma = $oRequestAlunosTurma->getListagemDaTurma();

            $sListagemDeAlunos = "";
            $sOnClick = '$( this ).addClass( "positive" )';

            if ( ($oRequestAlunosTurma) && ($oRequestAlunosTurma->num_rows) ){
                foreach ( $oRequestAlunosTurma as $item) {
                	$sListagemDeAlunos .= "<tr onclick='" . $sOnClick ."' ><td>" . $item[ "nome" ] . "</td></tr>";
                }
            }

            $htmLoginBody = file_get_contents( "app/View/ProfessorView.html" );
            $htmLoginBody = str_replace( "{{MNEMONICO_LISTAGEM}}" , $sListagemDeAlunos, $htmLoginBody);
            $htmLoginBody = str_replace( "{{MNEMONICO_TURMA}}", "Geral", $htmLoginBody );

            
            echo $htmLoginBody;

        }
    }

 ?>
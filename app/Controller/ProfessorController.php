<?php

    class ProfessorController{

        public function index(){

            // teste

            var_dump($_POST);
            echo date("h:i:s");

            // verifica aula atual

            ////    falta incluir rotina que casa aula atual com alunos presentes

            // verifica aula atual final

            // teste final

            $sNomeProfessorAtual = $_SESSION["nome"];

            $oProfessorModel = new ProfessorModel;

            $sListagemDosAlunosDaTurma = $this->getRegistrosDosAlunos(
                $oProfessorModel
            );
            $sListagemDasOpcoesDeTurma = $this->getTurmasExistentes(
                $oProfessorModel
            );
            $sListagemDasOpcoesDeDisci = $this->getDisciplinasVinculadasAoProfessor(
                $oProfessorModel
            );

            $htmProfessorView = file_get_contents( 
                "app/View/ProfessorView/index.html" 
            );
            $htmProfessorView = str_replace( 
                "{{MNEMONICO_AULA_ATUAL}}", 
                "1a", 
                $htmProfessorView
            );
            $htmProfessorView = str_replace( 
                "{{MNEMONICO_LISTAGEM_ALUNOS}}", 
                $sListagemDosAlunosDaTurma, 
                $htmProfessorView
            );
            $htmProfessorView = str_replace( 
                "{{MNEMONICO_DISCIPLINA}}", 
                $sListagemDasOpcoesDeDisci, 
                $htmProfessorView
            );
            $htmProfessorView = str_replace( 
                "{{MNEMONICO_TURMA}}", 
                $sListagemDasOpcoesDeTurma, 
                $htmProfessorView 
            );
            $htmProfessorView = str_replace( 
                "{{MNEMONICO_PROFESSOR_ATUAL}}", 
                "Por gentileza, indique os alunos presentes na aula.", 
                $htmProfessorView );

            $oController = new LogoutController;
            $oController->index( $htmProfessorView );
            
            echo $htmProfessorView;

        }

        private function getRegistrosDosAlunos(
            $oProfessorModel
        ){
            $oResponseFromDataBase = $oProfessorModel->getListagemDosAlunos();

            if(isset($_POST["TurmaSelecionada"])){
                $sSelectedTurma = $_POST["TurmaSelecionada"];
            } else{
                $sSelectedTurma = "21";
            }

            $sListagemDeAlunos = "";
            $sOnClick = 'getNewStatus( $( this ) );';
            if ( ($oResponseFromDataBase) && ($oResponseFromDataBase->num_rows) ){
                foreach ( $oResponseFromDataBase as $item) {
                    if($item["id_turma"] == $sSelectedTurma){
                        $sEmAula = ($item["ultima_aula"] != null)?("em-aula"):("");

                        $sListagemDeAlunos .= "<tr class='{$sEmAula}' id='{$item["id"]}' onclick='{$sOnClick}' >";
                        $sListagemDeAlunos .= "<td colspan='3'>{$item["nome"]}</td>";
                        $sListagemDeAlunos .= "</tr>";
                    }
                }
            }   ////    Listagem de Alunos

            return $sListagemDeAlunos;
        }

        private function getTurmasExistentes(
            $oProfessorModel
        ){
            $sListagemDeTurmas = $oProfessorModel->getListagemDeTurmas(); 

            return $sListagemDeTurmas;
        }

        private function getDisciplinasVinculadasAoProfessor(
            $oProfessorModel
        ){
            $sListDisciplinas = $oProfessorModel->getListagemDeDisciplinasDoProfessor();

            return $sListDisciplinas;
        }

    }

 ?>
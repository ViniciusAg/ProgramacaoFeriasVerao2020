<?php

    class ProfessorModel{
        private function getRegistersByQuery($sQuery){
            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();
            $oRes = NULL;

            $oRes = $oDbLink->query( $sQuery );

            return $oRes;
        }

        public function getListagemDeDisciplinasDoProfessor(){

            $sQuery = file_get_contents(
                "app/Model/Query/DisciplinasVinculadasAoUsuarioID.txt"
            );

            $sQuery = str_replace( 
                "{{MNEMONICO_ID_PROFESSOR}}", 
                $_SESSION["id"], 
                $sQuery 
            );

            $oRetornoDaQuery = $this->getRegistersByQuery($sQuery);

            $sListDisciplinas  = "";

            foreach ($oRetornoDaQuery as $key => $value) {

                $sIdDisciplina = $value["id"];
                $sListDisciplinas .= "<option value='{$sIdDisciplina}'>";
                $sListDisciplinas .=   $value["nome"];
                $sListDisciplinas .= "</option>";
            }

            return $sListDisciplinas;
        }

        public function getListagemDeTurmas(){

            $sQuery = file_get_contents(
                "app/Model/Query/ProfessorModel/ListagemTurmasCadastradas.txt"
            );

            $oRetornoDaQuery = $this->getRegistersByQuery($sQuery);

            $sListTurmasAtuais  = "";

            $sTurmaDefault = NULL;

            if(isset($_POST["TurmaSelecionada"])){
                $sTurmaDefault = $_POST["TurmaSelecionada"];
            }

            foreach ($oRetornoDaQuery as $key => $value) {
                $sIdTurma = $value["id"];
                $sNomeTurma = $value["turma"];

                $sStatus = ($sTurmaDefault == $sIdTurma)?("selected"):("");

                $sListTurmasAtuais .= "<option value='{$sIdTurma}' {$sStatus}>";
                $sListTurmasAtuais .=   "Turma {$sNomeTurma}";
                $sListTurmasAtuais .= "</option>";
            }

            return $sListTurmasAtuais;
        }

        public function getListagemDosAlunos(){

            $oDbLink = new Connect;
            $oDbLink = $oDbLink->start();
            $oRes = NULL;

            $sQuery = file_get_contents(
                "app/Model/Query/ProfessorModel/ListagemAlunosParaChamadaQuery.txt"
            );

            $oRes = $oDbLink->query( $sQuery );

            return $oRes;
        }
    }

 ?>
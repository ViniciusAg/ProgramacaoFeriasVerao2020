<?php

    class Core{
    	function getMyController( $sTipo, &$sController ){
    		if ( $sTipo == "X" )
                $sController = "AdminController";
            if ( $sTipo == "A" )
                $sController = "AlunoController";
            if ( $sTipo == "P" )
                $sController = "ProfessorController";
    	}

    	function tst(){
    		echo "hello world";
    	}

        public function start( $htmEstruturaPage ){
        	$bLoggedUser = false;
        	$bLoggedUser = isset( $_SESSION[ "tipo" ] );
        	$sLoginUser  = NULL;
        	$sLoginPass  = NULL;
        	$bStatus     = false;

        	$sController = "LoginController";
        	$sAction     = "index";

        	if ( $bLoggedUser ){
        		Core::getMyController( $_SESSION[ "tipo" ], $sController );
        	}else{
        		$oController = new LoginController;
        		$oController->login( $sLoginUser, $sLoginPass, $bLoggedUser, $sUserType );
        		
        		if ( $bLoggedUser )
        			Core::getMyController( $sUserType, $sController );
        	} call_user_func_array( array( new $sController, $sAction ), array( $htmEstruturaPage ) );
        }
    }

 ?>
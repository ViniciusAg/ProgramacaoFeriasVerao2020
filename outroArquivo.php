<?php
	
	function _print( $sTexto ){
		echo $sTexto . "<br/>";
	}

	function _printAlert( $sTexto ){
		echo "<script>window.alert('" . $sTexto ."');</script>";
	}

	function getPostForms( &$inputA = NULL, &$inputB = NULL, &$inputC = NULL ){
		$sSwork1 = $inputA;
		$inputA = filter_input( INPUT_POST, $sSwork1, FILTER_SANITIZE_STRING );
		$sSwork1 = $inputB;
		$inputB = filter_input( INPUT_POST, $sSwork1, FILTER_SANITIZE_STRING );
		$sSwork1 = $inputC;
		$inputC = filter_input( INPUT_POST, $sSwork1, FILTER_SANITIZE_STRING );
	}

	function testThisFile(){
		_print( "a rotina me consome e aos poucos" );
		_print( "deixo de ter o tempo que queria ter" );
		_print( "e mesmo não tendo esse tempo ainda o perco" );
		_print( "sem saber ao certo em que" );
	}

	$sArrayAssocExterno = [
		"item1" => "a rotina me consome e aos poucos",
		"item2" => "deixo de ter o tempo que queria ter",
		"item3" => "e mesmo não tendo esse tempo ainda o perco",
		"item4" => "sem saber ao certo em que"
	]

 ?>
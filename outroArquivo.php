<?php
	
	function _print( $sTexto ){
		echo $sTexto . "<br/>";
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
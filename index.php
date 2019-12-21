<?php

/*
    arquivo para unificar os testes
    e itens e rotinas que eu for 
    aprendendo 
*/

    function occurOf( $sMainString, $sSubString ){
        $iPosicao = strpos( $sMainString, $sSubString );
        $bOcorrencia = false; 
        if ( $iPosicao !== false )
            $bOcorrencia = true;
        return $bOcorrencia;
    }   ////    verifica ocorrencia de uma string em outra

    $sTeste = "";
    // $sTeste .= "1";

    if ( occurOf( $sTeste, "1" ) ){
        echo "hello world";
    }

 ?>
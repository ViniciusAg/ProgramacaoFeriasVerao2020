<?php

/*
    arquivo para unificar os testes, itens 
    e rotinas que eu for aprendendo 
*/

    require( "outroArquivo.php" );  ////    a file with methods and data
    require( "app/routes.php" );

    function occurOf( $sMainString, $sSubString ){
        $iPosicao = strpos( $sMainString, $sSubString );
        $bOcorrencia = false; 
        if ( $iPosicao !== false )
            $bOcorrencia = true;
        return $bOcorrencia;
    }   ////    #   verifys de occurrency of a string in another

    $sTeste = "";
    // $sTeste .= "1";  ////    simplewest hello world
    // $sTeste .= "2";  ////    making arrays and showing data from them
    // $sTeste .= "3";  ////    associative arrays ( why not a oldest type of json??? )
    // $sTeste .= "4";  ////    usage of an external file
    // $sTeste .= "5";  ////    usage of foreach method
    // $sTeste .= "6";  ////    paramethers with reference in functions
    $sTeste .= "7";  ////    started with a html file
    // $sTeste .= "8";  ////    receiving parameters with $_POST[] method
    $sTeste .= "9";  ////   receiving parameters with filter_input() method

    if ( occurOf( $sTeste, "9" ) ){
        $loginUser = filter_input( INPUT_POST, "loginUser", FILTER_SANITIZE_STRING );
        $loginPass = filter_input( INPUT_POST, "loginPass", FILTER_SANITIZE_STRING );

        if ( $loginUser )
            _print( "login " . $loginUser );
        if ( $loginPass )
            _print( "senha " . $loginPass );
    }   #   ////    receiving parameters with filter_input() method

    if ( occurOf( $sTeste, "8" ) ){
        $swork1 = "loginUser";
        $boolExistLoginUser = isset( $_POST[ $swork1 ] );    
        if ( $boolExistLoginUser ){
            $loginUser = $_POST[ $swork1 ]; _print( "login " . $loginUser );
        }
        $swork1 = "loginPass";
        $boolExistLoginPass = isset( $_POST[ $swork1 ] );    
        if ( $boolExistLoginPass ){
            $loginPass = $_POST[ $swork1 ]; _print( "senha " . $loginPass );
        }
    }   #   ////    receiving parameters with $_POST[] method

    if ( occurOf( $sTeste, "7" ) ){
        $htmEstruturaFile = file_get_contents( $htmEstruturaFileRoute );
        $htmLoginFile = file_get_contents( $htmLoginFileRoute );

        $pageToShow = str_replace( "{{CONTENT}}", $htmLoginFile, $htmEstruturaFile );

        _print( $pageToShow );
    }   #   ////    started with a html file

    if ( occurOf( $sTeste, "6" ) ){
        $sSouUmPonteiroNaoTenteNegarIsso = "hey there";

        _print( $sSouUmPonteiroNaoTenteNegarIsso );

        function euTratoPonteirosTaOk( &$ponteiroQuePodeNaoSerUmPonteiro ){
            $ponteiroQuePodeNaoSerUmPonteiro = "bye :)";
        } euTratoPonteirosTaOk( $sSouUmPonteiroNaoTenteNegarIsso );

        _print( $sSouUmPonteiroNaoTenteNegarIsso );
    }   ////    #   paramethers with reference in functions

    if ( occurOf( $sTeste, "5" ) ){
        foreach ( $sArrayAssocExterno as $sItem ) {
            _print( $sItem );
        }
    }   ////    #   usage of foreach method

    if ( occurOf( $sTeste, "4" ) ){
        testThisFile();
        _print( "" );
        _print( "by Pereira" );
    }   ////    #   usage of an external file

    if ( occurOf( $sTeste, "3" ) ){
        $sArrayAssociativo = [
            "item1" => "seria",
            "item2" => "eu",
            "item3" => "um",
            "item4" => "objeto",
            "item5" => "ou",
            "item6" => "alguma",
            "item7" => "especie",
            "item8" => "de ser hibrido?"
        ];

        echo "array associativo " . $sArrayAssociativo[ "item4" ];
    }   ////    #   associative arrays ( why not a oldest type of json??? )

    if ( occurOf( $sTeste, "2" ) ){
        $sArray = array( "arcas", "fabil", "luccas", "roninho", "burno" );
        $iTamanhoArray = count( $sArray );

        $iAux = 0;

        echo    "<select id='selectArrays'>";
        while ( $iAux < $iTamanhoArray ){
            echo "<option value=" . $iAux . " >" . $sArray[ $iAux ] . "</option>";
            $iAux++;    ////    imprime itens do array
        } echo  "</select>";
        
        echo    "<button onclick='window.alert( tst() );'> Click At Me! </button>";
        echo    "<script>"; ////    !)nao sei se e a melhor maneira de imprimir elementos ;
        echo        "var tst = () => { return  document.getElementById( 'selectArrays' ).value; };";
        echo    "</script>";
    }   ////    #   making arrays and showing data from them

    if ( occurOf( $sTeste, "1" ) ){
        echo "hello world";
    }   ////    #   simplewest hello world

 ?>
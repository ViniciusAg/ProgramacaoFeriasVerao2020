<?php

/*
    arquivo para unificar os testes, itens 
    e rotinas que eu for aprendendo 
*/

    require( "outroArquivo.php" );  ////    a file with methods and data
    require( "app/routes.php" );

    date_default_timezone_set( "America/Sao_Paulo" );

    function occurOf( $sMainString, $sSubString ){
        $iPosicao = strpos( $sMainString, $sSubString );
        $bOcorrencia = false; 
        if ( $iPosicao !== false )
            $bOcorrencia = true;
        return $bOcorrencia;
    }   ////    #   verifys de occurrency of a string in another

    $sTeste = "";
    // $sTeste .= "a";  ////    simplewest hello world
    // $sTeste .= "b";  ////    making arrays and showing data from them
    // $sTeste .= "c";  ////    associative arrays ( why not a oldest type of json??? )
    // $sTeste .= "d";  ////    usage of an external file
    // $sTeste .= "e";  ////    usage of foreach method
    // $sTeste .= "f";  ////    paramethers with reference in functions
    // $sTeste .= "g";  ////    started with a html file
    // $sTeste .= "h";  ////    receiving parameters with $_POST[] method
    // $sTeste .= "i";  ////    receiving parameters with filter_input() method
    // $sTeste .= "j";  ////    showing the current date as a spam
    // $sTeste .= "k";  ////    encrypting the received post data
    // $sTeste .= "l";  ////    creating cookies
    // $sTeste .= "m";  ////    test with json and array
    // $sTeste .= "n";  ////    applying a personal method to encode and decode data
    $sTeste .= "o";  ////    usying database and making querys

    if ( occurOf( $sTeste, "o" ) ){
        $sServer    = "localhost";
        $sBase      = "programacaoferiasverao2020";
        $sUser      = "root";
        $sPass      = "";

        $oMsqli = new mysqli( $sServer, $sUser, $sPass, $sBase );

        $oMsqli->set_charset( "utf8" );

        $oQuery = $oMsqli->query( "select nome from cadastros" );

        foreach ( $oQuery as $item )
            _print( $item["nome"] );
    }   ////    #   usying database and making querys

    if ( occurOf( $sTeste, "n" ) ){
        $sTestCrypt = "hello world";

        for ( $i = 0; $i < 17; $i++ )
            $sTestCrypt = base64_encode( $sTestCrypt );

        for ( $i = 0; $i < 17; $i++ )
            $sTestCrypt = base64_decode( $sTestCrypt );

        echo $sTestCrypt;
    }   ////    #   applying a personal method to encode and decode data

    if ( occurOf( $sTeste, "m" ) ){
        $sArray = array( 
            "item1" => "hello",
            "item2" => "world"
         ); echo "array: " . var_dump( $sArray );

        $sJson = '{ "item1": "this", "item2": "is", "item3": "a", "item4": "little", "item5": "test" }';
        echo "json: " . var_dump( $sJson );

        $sJsonToArray = json_decode( $sJson );

        echo var_dump( $sJsonToArray );
    }   ////    #   test with json and array

    if ( occurOf( $sTeste, "l" ) ){
        setcookie( "teste", "hello world", 20 );
        echo filter_input( INPUT_COOKIE, "teste", FILTER_SANITIZE_STRING );
    }   ////    #   creating cookies

    if ( occurOf( $sTeste, "k" ) ){
        $loginUser = "loginUser";
        $loginPass = "loginPass";
        getPostForms( $loginUser, $loginPass );

        if ( $loginUser )
            _print( "recebi o login: " . $loginUser );
        if ( $loginPass )
            _print( "recebi a senha:  " . md5( $loginPass ) );
    }   ////    #   encrypting the received post data

    if ( occurOf( $sTeste, "j" ) ){
        _printAlert( "the current date is: " . date( "D d/m/y" ) );
    }   ////    #   showing the current date as a spam

    if ( occurOf( $sTeste, "i" ) ){
        $loginUser = filter_input( INPUT_POST, "loginUser", FILTER_SANITIZE_STRING );
        $loginPass = filter_input( INPUT_POST, "loginPass", FILTER_SANITIZE_STRING );

        if ( $loginUser )
            _print( "login " . $loginUser );
        if ( $loginPass )
            _print( "senha " . $loginPass );
    }   ////    #   receiving parameters with filter_input() method

    if ( occurOf( $sTeste, "h" ) ){
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
    }   ////    #   receiving parameters with $_POST[] method

    if ( occurOf( $sTeste, "g" ) ){
        $htmEstruturaFile = file_get_contents( $htmEstruturaFileRoute );
        $htmLoginFile = file_get_contents( $htmLoginFileRoute );

        $pageToShow = str_replace( "{{CONTENT}}", $htmLoginFile, $htmEstruturaFile );

        echo $pageToShow;
    }   ////    #   started with a html file

    if ( occurOf( $sTeste, "f" ) ){
        $sSouUmPonteiroNaoTenteNegarIsso = "hey there";

        _print( $sSouUmPonteiroNaoTenteNegarIsso );

        function euTratoPonteirosTaOk( &$ponteiroQuePodeNaoSerUmPonteiro ){
            $ponteiroQuePodeNaoSerUmPonteiro = "bye :)";
        } euTratoPonteirosTaOk( $sSouUmPonteiroNaoTenteNegarIsso );

        _print( $sSouUmPonteiroNaoTenteNegarIsso );
    }   ////    #   paramethers with reference in functions

    if ( occurOf( $sTeste, "e" ) ){
        foreach ( $sArrayAssocExterno as $sItem ) {
            _print( $sItem );
        }
    }   ////    #   usage of foreach method

    if ( occurOf( $sTeste, "d" ) ){
        testThisFile();
        _print( "" );
        _print( "by Pereira" );
    }   ////    #   usage of an external file

    if ( occurOf( $sTeste, "c" ) ){
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

    if ( occurOf( $sTeste, "b" ) ){
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

    if ( occurOf( $sTeste, "a" ) ){
        echo "hello world";
    }   ////    #   simplewest hello world

 ?>
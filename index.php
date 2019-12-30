<?php

    require_once( "app/Core/Core.php" );
    
    require_once( "app/Controller/LoginController.php" );
    require_once( "app/Controller/ErroController.php" );
    require_once( "app/Controller/AlunoController.php" );
    require_once( "app/Controller/ProfessorController.php" );
    require_once( "app/Controller/AdminController.php" );
    require_once( "app/Controller/LogoutController.php" );
    require_once( "app/Controller/RegisterController.php" );
   
    require_once( "app/Model/LoginModel.php" );
    require_once( "app/Model/ConnectionModel.php" );
    require_once( "app/Model/ProfessorModel.php" );
    require_once( "app/Model/RegisterModel.php" );

    session_start();
    // $_SESSION = [];

    $htmEstruturaPage = file_get_contents( "app/Template/Estrutura.html" );

    ob_start(); ////    inicializa buffer

    $oCore = new Core;
    $oCore->start( $htmEstruturaPage );

    $htmBodyOfPage = ob_get_contents(); ////    armazena todos os "echo"

    ob_end_clean();

    $htmEstruturaPage = str_replace( "{{CONTENT}}", $htmBodyOfPage, $htmEstruturaPage );
    $htmEstruturaPage = str_replace( "{{NUCLEO}}", "Rosa Parks", $htmEstruturaPage );

    echo $htmEstruturaPage;

 ?>
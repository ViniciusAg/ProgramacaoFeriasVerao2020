<?php

    require_once( "app/Core/Core.php" );
    
    require_once( "app/Controller/LoginController.php" );
    require_once( "app/Controller/ErroController.php" );
    require_once( "app/Controller/AlunoController.php" );
    require_once( "app/Controller/ProfessorController.php" );
    require_once( "app/Controller/AdminController.php" );
   
    require_once( "app/Model/LoginModel.php" );
    require_once( "app/Model/ConnectionModel.php" );
    require_once( "app/Model/ProfessorModel.php" );

    session_start();
    // $_SESSION = [];

    $htmEstruturaPage = file_get_contents( "app/Template/estrutura.html" );

    ob_start(); ////    inicializa buffer

    $oCore = new Core;
    $oCore->start( $htmEstruturaPage );

    $htmBodyOfPage = ob_get_contents(); ////    armazena todos os "echo"

    ob_end_clean();

    $htmEstruturaPage = str_replace( "{{CONTENT}}", $htmBodyOfPage, $htmEstruturaPage );

    echo $htmEstruturaPage;

 ?>
<?php

    ////    imprime pagina htm

    require_once( "app/Core/Core.php" );
    require_once( "app/Controller/HomeController.php" );
    require_once( "app/Controller/ErroController.php" );
    require_once( "app/Controller/AlunoController.php" );
    require_once( "app/Controller/ProfessorController.php" );
    require_once( "app/Controller/AdminController.php" );

    $oCore = new Core;
    $oCore->start();

    ////    imprime pagina htm final

 ?>
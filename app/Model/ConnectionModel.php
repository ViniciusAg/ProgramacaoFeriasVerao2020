<?php

	class Connect{
        private static $oConn;

		public static function start( &$aTipeOfRegisterToCheck = NULL ){
            $sDbServer = "localhost";
            $sDbName   = "programacaoferiasverao2020";
            $sDbUser   = "root";
            $sDbPass   = "";

            if ( self::$oConn == NULL )
                self::$oConn   = new mysqli( $sDbServer, $sDbUser, $sDbPass, $sDbName );

            self::$oConn->set_charset( "utf8" );

            $sQuery = "SELECT nome, id FROM tipos_cadastros WHERE ( nome = '" . $aTipeOfRegisterToCheck . "' )";

            $aTipeOfRegisterToCheck = self::$oConn->query( $sQuery );

            return self::$oConn;
		}
	}

 ?>
<?php

	class Connect{
        private static $oConn;

		public static function start(){
            $sDbServer = "localhost";
            $sDbName   = "programacaoferiasverao2020";
            $sDbUser   = "root";
            $sDbPass   = "";

            if ( self::$oConn == NULL )
                self::$oConn   = new mysqli( $sDbServer, $sDbUser, $sDbPass, $sDbName );

            self::$oConn->set_charset( "utf8" );

            return self::$oConn;
		}
	}

 ?>
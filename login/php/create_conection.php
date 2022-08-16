<?php
    class Conection{
        private static $conexion;

        public function __construct(){
            if(!isset(self::$conexion)){
                try{
                    
                    self::$conexion = new PDO('mysql:host=localhost;dbname=bd','root','');
                    self::$conexion -> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
                    self::$conexion -> exec('SET CHARACTER SET utf8');
                    
                }catch(PDOException $ex){
                    print $ex->getMessage();
                    print "Not cannot connected";
                    die();
                }
            }
        }

        public static function close_conection(){
            if(isset(self::$conexion))
                self::$conexion = NULL;
                print '<br>'.'Conexion Closed';
        }

        public static function get_conection(){
            return self::$conexion;
        }
    }
?>
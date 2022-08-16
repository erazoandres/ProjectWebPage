<?php

function foo(iterable $it){
        foreach($it as $registro){
        }
    return 1;
}

function bar(): iterable {
    return $ab = array();
}
    class auto{
        
        private $marca;
        private $color;
        private $placa;
        private static $cambio_dueño;


        public function  __construct(){

            $this->marca = "Mazda";
            $this->color = "Negro";
            $this->placa = "LYQ32B";

        }

        public function showData(){
            echo $this->marca.' ';
            echo $this->color.' ';
            echo $this->placa.' ';
            echo self::$cambio_dueño.' ';
            echo '<br>';
        }


        public function set($marca , $color, $placa){
            $this->marca = $marca;
            $this->color = $color;
            $this->placa = $placa;
        }

        public static function set_change_owner(){
            self::$cambio_dueño++;
        }

    }

    
    $auto1 = new auto;
    $auto2 = new auto;
    $auto3 = new auto;

    auto::set_change_owner();
    auto::set_change_owner();
    auto::set_change_owner();

    $auto2->set("Ferrrari" , "Rojo" , "fdf23" , 1);
    $auto3->set("NULL" , "NULL" , "NULL" , 0);

    $auto1->showData();
    $auto2->showData();
    $auto3->showData();

?>

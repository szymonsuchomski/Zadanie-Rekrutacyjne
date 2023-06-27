<!DOCTYPE html>
<html>
<head>
    <title>Zadanie 1</title>
</head>
<body>

<?php
    //stworzenie klasy Pipeline
    class Pipeline
    {   
        //deklaracja funkcji make
        public function make( ...$functions ) {
            //funkcja make zwraca funkcję stworzoną z funkcji przekazanych jako argumenty
            return function ( $arg ) use ( $functions ) {
                $result = $arg;
                //wywołanie funkcji przekazanych jako argumenty 
                foreach ( $functions as $func ) {                
                    $result = $func( $result );
                }
                //zwrócenie ostatecznego wyniku
                return $result;
            };
        }
    }
    
    //inicjalizacja klasy
    $Pipeline = new Pipeline();

    //stworzenie funkcji przy użyciu funkcji make
    $function = $Pipeline -> make(function( $var ) { return $var * 3; }, function( $var ) { return $var + 1 ;}, function( $var ) { return $var / 2 ; } ); 

    //wywołanie funkcji stworzonej przez funkcję make
    echo $function(3);
?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Zadanie 2</title>
</head>
<body>
    <?php
        //stworzenie klasy TextInput
        class TextInput
        {
            public $fullText = " ";
            //funkcja dodająca podany tekst do wcześniej podanych
            public function add( $text )
            {
                $this->fullText .= $text;
            }
            //funkcja zwracająca cały podany tekst
            public function getValue()
            {
                return $this->fullText;
            }
        }
        //stworzenie klasy NumericInput dziedziczącej z klasy TextInput
        class NumericInput extends TextInput
        {
            //funkcja dodająca podany tekst do wcześniej podanych ignorując nienumeryczne znaki
            public function add ( $text )
            {
                preg_match_all( '/\d+/', $text, $matches );
                for( $i = 0; $i < count($matches[0]); $i++)
                {
                    $this->fullText .= $matches[0][$i];
                }
            }
        }

        //inicjalizacja klas
        $TextInput = new TextInput();
        $NumericInput = new NumericInput();


        //dodanie do obiektów tekstu i wywołanie funkcji getValue
        $TextInput->add("123abc321");
        echo "TextInput: " . $TextInput->getValue();

        $NumericInput->add("123abc321");
        echo "<br>NumericInput: " . $NumericInput->getValue();
    ?>
</body>
</html>
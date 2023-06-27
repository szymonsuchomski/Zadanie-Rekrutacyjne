<!DOCTYPE html>
<html>
<head>
    <title>Zadanie 2</title>
</head>
<body>
    <?php
        class TextInput
        {
            public $fullText = " ";
            public function add( $text )
            {
                $this->fullText .= $text;
            }

            public function getValue()
            {
                return $this->fullText;
            }
        }
        
        class NumericInput extends TextInput
        {
            public function add ( $text )
            {
                preg_match_all( '/\d+/', $text, $matches );
                for( $i = 0; $i < count($matches[0]); $i++)
                {
                    $this->fullText .= $matches[0][$i];
                }
            }
        }

        $TextInput = new TextInput();
        $NumericInput = new NumericInput();

        $TextInput->add("123abc321");
        echo "TextInput: " . $TextInput->getValue();

        $NumericInput->add("123abc321");
        echo "<br>NumericInput: " . $NumericInput->getValue();
    ?>
</body>
</html>
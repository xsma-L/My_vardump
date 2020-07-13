<?php
    function my_vardump($data){

        if(is_string($data)){
            //si data est une string
            $length = strlen($data);
            echo "string(" . $length . ") " . $data . PHP_EOL;
        } elseif(is_integer($data)){
            //si data est un int
            echo "int(" . $data . ")" . PHP_EOL;
        } elseif(is_float($data)){
            //si data est un nombre décimal
            echo "float(" . $data . ")" . PHP_EOL;
        } elseif(is_array($data)){
            //si data est un array
            array_print($data);
        }elseif(is_bool($data)){
            //si data est un boolean
            if($data == true){
                echo "bool(true)" . PHP_EOL;
            } elseif($data == false){
                echo "bool(false)" . PHP_EOL;
            }
        }
    }
    
    function array_print($data, $level = 2){
        //compte les éléments du tablbeau
        $length = count($data);
        //système de niveaux pour se repérer dans la recursive et pour gérer l'indentation
        if($level != 2){
            echo str_repeat(' ', $level) . "array(" . $length . ") {" . PHP_EOL;    
        } else{
            echo "array(" . $length . ") {" . PHP_EOL;
        }
    //str_repeat = indentation
        foreach ($data as $key => $value) {
            if(is_array($value)){
                echo str_repeat('', $level+1) . "[" . $key . "]=>" .PHP_EOL;
                array_print($value, $level+1);
            } elseif(is_string($value)){
                echo str_repeat(' ', $level+1) . "[" . $key . "]=>" .PHP_EOL;
                $length = strlen($value);
                echo str_repeat(' ', $level+1) . "string(" . $length . ") \"" . $value . "\"" . PHP_EOL;
            } elseif(is_integer($value)){
                echo str_repeat(' ', $level+1) . "[" . $key . "]=>" .PHP_EOL;
                echo str_repeat(' ', $level+1) . "int(" . $value . ")" . PHP_EOL;
            } elseif(is_float($value)){
                echo str_repeat(' ', $level+1) . "[" . $key . "]=>" .PHP_EOL;
                echo str_repeat(' ', $level+1) . "float(" . $value . ")" . PHP_EOL;
            }
        }
        if($level != 2){
            echo str_repeat(' ', $level) . "}" . PHP_EOL;
        } else{
            echo "}" . PHP_EOL;
        }
    }

    $myarray = array( 
        array("Ankit", array(1, 2, 3, 4),"Ram", "Shyam"), 
        array("Unnao", "Trichy", "Kanpur") 
    );

    my_vardump($myarray);

?>
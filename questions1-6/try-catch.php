<?php
try{
    $name = 'Nora'; 
    if($name == 'Nora'){
        throw new Exception();
    }
} catch (Exception $e){
    echo "Exception found: value for name ($name) not valid\n";
}

?>
<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=test", "root", "");
} catch ( PDOException $e ){
    print $e->getMessage();
}

function Filtrele($deger){
    $A = trim($deger);
    $B = strip_tags($A);
    $C = htmlspecialchars($B, ENT_QUOTES);
    return $C;
}
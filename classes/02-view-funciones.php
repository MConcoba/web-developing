<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    include("funciones.php");
    $name = 'Deve';
    welcome($name);
    

    function aasdf() {
        global $name;
        $name = 'UMG';
        //echo "{$name} <br>";
    }

    aasdf();
    echo "{$name} <br>";
?>
    
</body>
</html>
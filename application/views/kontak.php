<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
foreach ($kirim->result_array() as $key) {
    echo $key['kontak'];
}


?>
    
</body>
</html>
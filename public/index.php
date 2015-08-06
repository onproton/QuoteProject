<!DOCTYPE HTML>
<html>


<head>
    <title>YAY</title>
    <meta charset="utf-8">
</head>


<body>
    <ol>
<?php

require_once "../app/config.local.php";

$db = new PDO($config['db']['dsn'], $config['db']['user'], $config['db']['pass']);

function test($db) {
    $sql = 'SELECT * FROM Quotes';
    foreach ($db->query($sql) as $row) {
        echo "<li>" . $row['q_id'] ." - ". $row['quotation'] ." - ". $row['author_id'] . "</li>\n";
    }
}

test($db);

?>
    </ol>

</body>

</html>

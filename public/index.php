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

function test($db, $start_id=1, $count=10) {

    $sql = 'SELECT `quotation`, `author` FROM Quotes
        JOIN `authors` ON `authors`.`a_id`= quotes.`author_id`
        LIMIT ' . $start_id . ', ' . $count;

    foreach ($db->query($sql) as $row) {
        echo "<li>" . $row['quotation'] ." - ". $row['author'] . "</li>\n";
    }
}

$start_id = 1;
$count = 10;

if (isset($_GET['start_id'])) {
    $start_id = $_GET['start_id'];
}

if (isset($_GET['count'])) {
    $count = $_GET['count'];
}

test($db, $start_id, $count);


?>
    </ol>

</body>

</html>

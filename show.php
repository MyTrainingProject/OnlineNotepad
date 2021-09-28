<?php

require 'database/QueryBuilder.php';

$db = new QueryBuilder();
$task = $db->getTask($_GET['id']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?= $task['title'] ?></h1>
            <p><?= $task['content'] ?></p>
            <a href="/Online_notepad/index.php">Go Back</a>
        </div>
    </div>
</div>

</body>
</html>
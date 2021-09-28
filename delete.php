<?php

function deleteTask($id)
{
    $sql = 'DELETE FROM tasks WHERE id=:id';
    $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "root");
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $id);
    $result = $statement->execute();
    header('Location: /Online_notepad/index.php'); exit;

}
?>
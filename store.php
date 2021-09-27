<?php

$pdo = new PDO("mysql:host=localhost; dbname=test", "root", "root");
$sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";//:title, :content затем заменяются значениями ниже через bindParam
$statement = $pdo->prepare($sql);
//$statement->bindParam(":title", $_POST['title']); //VALUES(:title)
//$statement->bindParam(":content", $_POST['content']);//VALUES(:content)
$statement->execute($_POST);

header('Location: /level01/index.php'); exit;

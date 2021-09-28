<?php

class QueryBuilder
{
    function getAllTasks()
    {
        $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "root");
        $sql = "SELECT * FROM tasks";
        $statement = $pdo->prepare($sql);
        $result = $statement->execute();//возвращает true или false
        $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);//получить все данные в виде ассциативного массива
        return $tasks;
    }


    function getTask($id)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "root");
        $statement = $pdo->prepare("SELECT * FROM tasks WHERE id=:id");
        $statement->bindParam(":id", $id);//старый способ
        $statement->execute();
        $task = $statement->fetch(PDO::FETCH_ASSOC);
        return $task;
    }

    function deleteTask($id)
    {
        $sql = 'DELETE FROM tasks WHERE id=:id';
        $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "root");
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $result = $statement->execute();
        header('Location: /Online_notepad/index.php'); exit;

    }

    function updateTask($data)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "root");
        $sql = 'UPDATE tasks SET title=:title, content=:content WHERE id=:id';
        $statement = $pdo->prepare($sql);
        $result = $statement->execute($data);
        header('Location: /Online_notepad/index.php'); exit;
    }

    function addTask($data)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "root");
        $sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";//:title, :content затем заменяются значениями ниже через bindParam
        $statement = $pdo->prepare($sql);
        $statement->execute($data);

        header('Location: /Online_notepad/index.php'); exit;

    }


}
?>

<?php

class QueryBuilder
{
    public $pdo;
    function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost; dbname=test", "root", "root");

    }
    function store($table, $data)
    {
        $stringOfQuery = implode(', ', array_keys($data)) ;
        var_dump($stringOfQuery);
        $placeholders = ":" . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table($stringOfQuery) VALUES ($placeholders)";//:title, :content затем заменяются значениями ниже через bindParam
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);

        header('Location: /Online_notepad/index.php'); exit;

    }


    function all($table)
    {
        $sql = "SELECT *  FROM $table";
        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute();//возвращает true или false
        $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);//получить все данные в виде ассциативного массива
        return $tasks;
    }


    function getOne($table, $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $table WHERE id=:id");
        $statement->bindParam(":id", $id);//старый способ
        $statement->execute();
        $task = $statement->fetch(PDO::FETCH_ASSOC);
        return $task;
    }

    function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $result = $statement->execute();
        header('Location: /Online_notepad/index.php'); exit;

    }

    function update($table, $data)
    {
        $stringOfQuery = '';
        foreach (array_keys($data) as $item)
        {
            $stringOfQuery = "$stringOfQuery $item=:$item,";
        }
        $stringOfQuery = rtrim($stringOfQuery, ',');
        $sql = "UPDATE $table SET $stringOfQuery WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute($data);
        header('Location: /Online_notepad/index.php'); exit;
    }



}
?>

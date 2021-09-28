<?php
//1.connect

function getAllTasks()
{
    $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "root");
    $sql = "SELECT * FROM tasks";
    $statement = $pdo->prepare($sql);
    $result = $statement->execute();//возвращает true или false
    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);//получить все данные в виде ассциативного массива
    return $tasks;
}
$tasks = getAllTasks();
var_dump($tasks);

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
            <h1>All tasks</h1>
            <a href="create.php" class="btn btn-success">Add Task</a>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($tasks as $task):?>
                    <tr>
                        <td><?= $task['id'];?></td>
                        <td><?= $task['title'];?></td>
                        <td>
                            <a href="show.php?id=<?= $task['id']; ?>" class="btn btn-info">Show</a>
                            <a href="edit.php?id=<?= $task['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $task['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>

                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
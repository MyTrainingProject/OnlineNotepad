
<?php
$pdo = new PDO("mysql:host=localhost; dbname=test", "root", "root");
$statement = $pdo->prepare("SELECT * FROM tasks WHERE id=:id");
//$statement->bindParam(":id", $_GET['id']);//старый способ
$statement->execute($_GET);
$task = $statement->fetch(PDO::FETCH_ASSOC);

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
            <h1>Edit Task</h1>
            <form action="update.php?id=<?= $task['id'] ?>" method="post">

                <div class="form-group">
                    <input type="text" name="title" class="form-control"   value="<?= $task['title'] ?>"">
                </div>

                <div class="form-group">
                    <textarea name="content" class="form-control"><?= $task['content'] ?></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-warning" type="submit">Submit</button>
                </div>


            </form>
        </div>
    </div>
</div>

</body>
</html>
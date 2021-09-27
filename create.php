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
            <h1>Create Task</h1>
            <form action="store.php" method="POST">

                <div class="form-group">
                    <input name="title" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <textarea name="content" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>


            </form>
        </div>
    </div>
</div>

</body>
</html>
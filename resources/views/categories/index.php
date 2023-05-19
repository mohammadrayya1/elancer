<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css')?>">
    <title>Categories</title>
</head>
<body>
    <div class="container">
            <h1 class="m-3">  <?= $title?></h1>

            <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>Slug</th>
                    <th>Parent</th>
                    <th>Created at</th>

                </tr>
                </thead>
                    <tbody>
                    <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category->id?></td>
                        <td><a href="categories/<?=$category->id ?>"><?= $category->name?></a></td>
                        <td><?= $category->slug?></td>
                        <td><?= $category->parent_id ?></td>
                        <td><?= $category->created_at?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
            </table>
            </div>
    </div>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>

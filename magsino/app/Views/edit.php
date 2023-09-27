<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        input[type="text"], input[type="number"]{
            text-align:center;
        }
        .container{
            width:200%
            height: 2px;
            padding: 20px;
            border: 1%;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
            background-color:aquamarine;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="home">
        <div class="row justify-content-center">
        <div class="col-md-4">
            <h1 class="text-center mb-4">Edit Product</h1>
            <form method="post" action="/main/update/<?= $record['id'] ?>">
                <div class="mb-3">
                    <label for="ProductName" class="form-label">ProductName:</label>
                    <input type="text" id="ProductName" name="ProductName" value="<?= $record['ProductName'] ?>" class="form-control" required>
                </div>

                <div class="mb-3 ">
                    <label for="ProductDescription" class="form-label">ProductDescription:</label>
                    <input type="text" id="ProductDescription" name="ProductDescription" value="<?= $record['ProductDescription'] ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="ProductCategory" class="form-label">ProductCategory:</label>
                    <select name="ProductCategory" id="ProductCategory">
                    <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['ProductCategory'] ?>" <?php if ($category['ProductCategory'] === $record['ProductCategory']): ?>selected<?php endif; ?>>
                        <?= $category['ProductCategory'] ?>
                    </option>
        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ProductQuantity" class="form-label" value="<?= $record['ProductQuantity'] ?>">ProductQuantity:</label>
                    <input type="text" id="ProductQuantity" name="ProductQuantity" value="<?= $record['ProductQuantity'] ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="ProductPrice" class="form-label">ProductPrice:</label>
                    <input type="number" id="ProductPrice" name="ProductPrice" value="<?= $record['ProductPrice'] ?>" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="update" style="width: 160px;">Update</button>
                </div>
            </form>
        </div>
       </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-4j+3s1Pj8w6t4+XW3UvI3/5XpGy9Gg5xKv+Z6a7u8z5w+qQ9zJQzUew+0R6wXpG" crossorigin="anonymous"></script>
</body>
</html>
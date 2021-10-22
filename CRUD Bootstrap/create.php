<?php 

// DB connection 
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors = [];

$title = '';
$price = '';
$desc = '';


// check for requst method

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');

    // Check Null Values
    if (!$title) {
        $errors[] = 'Please, Product Title is required.';
    }

    if (!$price) {
        $errors[] = 'Please, Product Price is required.';
    }

    // Check for Images Dir
    if (!is_dir('images')) {
        mkdir('images');
    }


    if(empty($errors)) {

        $image = $_FILES['image'] ?? null;
        $imagePath = '';

        if($image && $image['tmp_name']) {
            // Generate random for New Images.
            $imagePath = 'images/'.generateRandomString(8).'/'.$image['name'];
            mkdir(dirname($imagePath));

            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, created) VALUES (:title, :image, :desc, :price, :date)");

        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':desc', $desc);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', $date);
        $statement->execute(); 

        // clear values
        $errors = [];
        $image = '';
        $title = '';
        $price = '';
        $desc = '';

        // redirect to index
        header('Location: index.php');
    }
}

// Generate Random String
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="app.css">
    <title>Products CRUD</title>
  </head>
  <body>
    <h1>Create New Product</h1>
    <p>
        <a href="index.php" class="btn btn-success">Product List</a>
    </p>

    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <div><?php echo $error?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="#" method="post" enctype="multipart/form-data">
       <div class="form-group">
           <label for="image">Product Image</label>
           <input type="file" name="image" id="image" class="form-control">
       </div>
       <div class="form-group">
           <label for="title">Product Title</label>
           <input type="text" name="title" id="title" value="<?php echo $title; ?>" class="form-control">
       </div>
       <div class="form-group">
           <label for="desc">Product Description</label>
           <textarea name="desc" id="desc" class="form-control"><?php echo $desc ?></textarea>
       </div>
       <div class="form-group">
           <label for="price">Product Description</label>
           <input type="number" step="0.01" name="price" id="price" value="<?php echo $price ?>" class="form-control">
       </div>
       <br/>
       <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>
<?php
include("login/connection.php");
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM cards WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Captsone Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Smith Card Design</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="index.php">Home</a>
                        <a class="nav-link active" aria-current="page" href="product.php">Products</a>
                        <a class="nav-link" href="about.php">About</a>
                        <a class="nav-link" href="contact.php">Contact</a>
                        <!-- <a class="nav-link" href="registration/register.php">Register</a> -->
                        <a class="nav-link float-end" href="cart.php">Cart</a> 
                        <!-- <a class="nav-link" href="server.php">DatabaseConnectionTest</a> -->
                        <a class="nav-link" href="login/login.php">Login</a>
                    </div>
                </div>

            </div>
        </nav>
        <main>
        <div class="featured">
            <h2>Cards</h2>
            <p>Check out our selection of custom cards!</p>
        </div>
        <div class="recentlyadded content-wrapper">
            <h2>Options</h2>
            <div class="products">
                <?php foreach ($recently_added_products as $product): ?>
                <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
                    <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
                    <span class="name"><?=$product['name']?></span>
                    <span class="price">
                        &dollar;<?=$product['price']?>
                        <?php if ($product['rrp'] > 0): ?>
                        <span class="rrp">&dollar;<?=$product['rrp']?></span>
                        <?php endif; ?>
                    </span>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        </main>
    </body>
</html>
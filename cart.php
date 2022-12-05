<?php
include("login/connection.php");
    if(isset($_POST["add_to_cart"]))
    {
        if(isset($_SESSION["shopping_cart"]))
        {
            $card_array_id = array_column($_SESSION["shopping_cart"], "card_id");
            if(!in_array($_GET["id"], $card_array_id))
            {
                $count = count($_SESSION["shopping_cart"]);
                $card_array = array(
                    'card_id' => $_GET["id"],
                    'card_name' => $_POST["hidden_name"],
                    'card_price' => $_POST["hidden_price"],
                    'card_quantity' => $_POST["quantity"]
                );
                $_SESSION["shopping_cart"][$count] = $card_array;
            }
        }
        else
        {
            $card_array = array(
                'card_id' => $_GET["id"],
                'card_name' => $_POST["hidden_name"],
                'card_price' => $_POST["hidden_price"],
                'card_quantity' => $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][0] = $card_array;
        }
    }
?>

<!-- Influenced by: https://www.webslesson.info/2016/08/simple-php-mysql-shopping-cart.html-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Captsone Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="bg-secondary bg-gradient">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Smith Card Design</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                      <a class="nav-link" aria-current="page" href="index.php">Home</a>
                      <a class="nav-link" href="gallery.php">Gallery</a>
                      <a class="nav-link" href="about.php">About</a>
                      <a class="nav-link" href="contact.php">Contact</a>
                      <a class="nav-link active" href="cart.php">Cart</a> 
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid text-center bg-light bg-gradient p-3 my-3 border">
            <h1>Checkout</h1>
        </div>
        <main>
            <div class="container-fluid">
                <?php 
                    $query = "SELECT * FROM cards ORDER BY id ASC";
                    $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0) 
                {
                    while ($row = mysqli_fetch_array($result))
                    {
                ?>
                <div class="col-md-4">
                    <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>"
                        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" text-align="center">
                            <h4 class="text"><?php echo $row["cardName"];?></h4>
                            <h4 class="text-info"><?php echo $row["description"];?></h4>
                            <h4 class="text-danger">$<?php echo $row["price"];?></h4>
                            <input type="text" name="quantity" class="form-control" value="1"/>
                            <input type="hidden" name="hidden_name" value="<?php echo $row["cardName"];?>"/>
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>"/>
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart"/>
                        </div>
                    </form>
                </div>
                <?php      
                    }
                }
                ?>
                <div style="clear:both"></div>
                <br/>
                <h3>Order Details</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="40%">Item Name</th>
                            <th width="10%">Quantity</th>
                            <th width="20%">Price</th>
                            <th width="15%">Total</th>
                            <th width="5%">Action</th>
                        </tr>
                        <?php 
                        if(!empty($_SESSION["shopping_cart"]))
                        {
                            $total = 0;
                            foreach($_SESSION["shopping_cart"] as $keys => $values)
                            {
                        ?>
                        <tr>
                            <td><?php echo $values["card_name"]; ?></td>
                            <td><?php echo $values["card_quantity"]; ?></td>
                            <td>$<?php echo $values["card_price"]; ?></td>
                            <td><?php echo number_format($values["card_quantity"] * $values["card_price"], 2); ?></td>
                            <td><a href="cart.php?action=delete&id=<?php echo $values["card_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                        </tr>
                        <?php
                                $total = $total + ($values["card_quantity"] * $values["card_price"]);
                            }
                        ?>
                        <tr>
                            <td colspan="3" text-align="right">Total</td>
                            <td text-align="right">$ <?php echo number_format($total, 2); ?></td>
                            <td></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </main>
    </body>
</html>
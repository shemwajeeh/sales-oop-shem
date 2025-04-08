<?php
    session_start();
    if(empty($_SESSION)){
        header("location: ../views/");
        exit;
    }

    include "../classes/Product.php";

    $product = new Product;

    $product_details = $product->displaySpecificProduct($_GET['product_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a href="dashboard.php" class="navbar-brand ms-3">
            <i class="fa-solid fa-house fa-2x text-dark"></i>
        </a>

        <div class="ms-auto me-3 navbar-nav">
            <a href="../actions/logout.php" class="nav-link" title="Logout"><i class="fa-solid fa-user-xmark fa-2x text-danger"></i></a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card border-0 mx-auto w-50">
            <div class="card-header bg-white border-0">
                <h1 class="display-4 fw-bold text-success text-center"><i class="fa-solid fa-cash-register"></i> Buy Product</h1>
            </div>
            <div class="card-body">
                <form action="../views/payment.php?product_id=<?= $product_details['id']?>" method="post" class="w-75 mx-auto pt-4 p-5">
                    <div class="row mb-3">
                        <div class="col-md">
                            <label for="product-name" class="form-label small text-secondary">Product Name</label>
                            <h2 class="display-6 fw-bold"><?= $product_details['product_name'] ?></h2>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="price" class="form-label small text-secondary">Price</label>
                            <h2 class="display-6 fw-bold">$ <?= $product_details['price'] ?></h2>
                        </div>
                        <div class="col-md-6">
                            <label for="quantity" class="form-label small text-secondary">Stocks Left</label>
                            <h2 class="display-6 fw-bold"><?= $product_details['quantity'] ?></h2>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="buy-quantity" class="form-label small text-secondary">Buy Quantity</label>
                        <div class="col-md-8 mx-auto">
                            <input type="number" name="buy_quantity" id="buy-quantity" class="form-control form-control-lg text-center fw-bold" required min="1" max="<?= $product_details['quantity']?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <button type="submit" class="btn btn-success w-100" name="buy_product">Pay</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
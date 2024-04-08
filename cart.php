<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="css/Nav-Bar.css">
    <link rel="stylesheet" href="css/cart.css">
    <script src="js/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    <?php 
        session_start();
        require 'vendor/autoload.php';
        include 'database/dbcon.php'; 

        include 'components/Nav-Bar.php';
        if (!isset($_SESSION['email'])) {
            header("Location: login.php");
            exit;
        }
        try {
            $user = $auth->getUserByEmail($_SESSION['email']);
            $displayName = $user->displayName;
            $userId = $user->uid;
        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
            $_SESSION['error'] = "User not found.";
            header('Location: login.php');
            exit;
        }
        $cartReference = $database->getReference('carts/' . $userId);
        $cartSnapshot = $cartReference->getSnapshot();

        $cartItems = [];
        if ($cartSnapshot->exists()) {
            foreach ($cartSnapshot->getValue() as $key => $item) {
                $cartItems[$key] = $item;
            }
        }
    ?>
    <div id="cart">
    <div class="container-fluid">
        <div class="row align-items-start">
            <div class="col-12 col-sm-8 items">
                <?php if (empty($cartItems)): ?>
                    <p>Your cart is empty.</p>
                <?php else: ?>
                    <div class="cart-items">
                        <?php foreach ($cartItems as $itemKey => $item): ?>
                            <div class="cartItem row align-items-start">
                                <div class="col-3 mb-2">
                                    <?php
                                    $imageUrl = str_replace('images/', '', $item['image']); 
                                    $imageUrl = $baseStorageUrl . urlencode($imageUrl) . '?alt=media';
                                    ?>
                                    <img class="w-100" src="<?php echo $imageUrl; ?>" alt="Product Image">
                                </div>
                                <div class="col-3 mb-2">
                                    <h6 class=""><?php echo $item['manufacturer']; ?></h6>
                                    <p class="pl-1 mb-0">Model: <?php echo $item['model']; ?></p>
                                </div>
                                <div class="col-2">
                                    <p class="cartItemQuantity p-1 text-center">1</p>
                                </div>
                                <div class="col-1">
                                    <p class="cartItemPrice">$<?php echo $item['price']; ?></p>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-danger btn btn-primary shopnow remove-item"
                                            data-item="<?php echo $itemKey; ?>">Remove
                                    </button>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
      <div class="col-12 col-sm-4 p-3 proceed form">
                    <div class="row m-0">
                        <div class="col-sm-8 p-0">
                            <h6>Subtotal</h6>
                        </div>
                        <div class="col-sm-4 p-0">
                            <p id="subtotal">$0.00</p>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-sm-8 p-0 ">
                            <h6>Tax</h6>
                        </div>
                        <div class="col-sm-4 p-0">
                            <p id="tax">$0.00</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mx-0 mb-2">
                        <div class="col-sm-8 p-0 d-inline">
                            <h5>Total</h5>
                        </div>
                        <div class="col-sm-4 p-0">
                            <p id="total">$0.00</p>
                        </div>
                    </div>
                    <a href="#"><button id="btn-checkout"  class="btn btn-primary shopnow"><span>Checkout</span></button></a>
                </div>
            </div>
        </div>
    </div>
    <script>
    // Calculate subtotal, tax, and total dynamically
    window.addEventListener('DOMContentLoaded', () => {
        const cartItemPrices = document.querySelectorAll('.cartItemPrice');
        let subtotal = 0;
        cartItemPrices.forEach(price => {
            subtotal += parseFloat(price.textContent.replace('$', ''));
        });

        const taxRate = 0.05; 
        const tax = subtotal * taxRate;

        const total = subtotal + tax;

        document.getElementById('subtotal').textContent = '$' + subtotal.toFixed(2);
        document.getElementById('tax').textContent = '$' + tax.toFixed(2);
        document.getElementById('total').textContent = '$' + total.toFixed(2);
    });

    // Add event listeners for remove buttons
    const removeButtons = document.querySelectorAll('.remove-item');
    removeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const itemKey = button.getAttribute('data-item');
            // Send AJAX request to PHP script
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'remove_item.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Reload the page or update the cart UI as needed
                    window.location.reload(); // Reloads the page
                } else {
                    console.error('Failed to remove item');
                }
            };
            xhr.send('itemKey=' + itemKey);
        });
    });

    </script>
</body>

</html>

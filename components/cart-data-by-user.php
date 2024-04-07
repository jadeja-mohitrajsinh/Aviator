<?php
        include 'database/dbcon.php';

$cartReference = $database->getReference('carts/');
$cartSnapshot = $cartReference->getSnapshot();

$cartItems = [];
if ($cartSnapshot->exists()) {
    foreach ($cartSnapshot->getValue() as $key => $item) {
        $cartItems[$key] = $item;
    }
}
        ?>
<?php
     $allUsers = $auth->listUsers();
?>

<div class="accordion" id="accordionExample">
    <?php foreach ($allUsers as $userRecord): ?>
        <?php
            $userId = $userRecord->uid;
            $displayName = $userRecord->displayName;

            // Fetch cart data using the user ID
            $cartReference = $database->getReference('carts/' . $userId);
            $cartSnapshot = $cartReference->getSnapshot();

            // Skip user if cart is empty
            if (!$cartSnapshot->exists()) {
                continue;
            }

            $cartItems = $cartSnapshot->getValue();
        ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?php echo $userId; ?>">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#collapse<?php echo $userId; ?>" aria-expanded="true" 
                        aria-controls="collapse<?php echo $userId; ?>">
                    <?php echo $displayName; ?>
                </button>
            </h2>
            <div id="collapse<?php echo $userId; ?>" class="accordion-collapse collapse" 
                 aria-labelledby="heading<?php echo $userId; ?>" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?php foreach ($cartItems as $itemKey => $item): ?>
                        <div class="row align-items-start">
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
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

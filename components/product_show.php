<div class="product-sp">
    <div class="container">
        <div class="row" id="product-container">
 <?php

        $reference = $database->getReference('aircrafts');
        $aircrafts = $reference->getValue();
        foreach ($aircrafts as $aircraftId => $aircraft) {
            // Extract aircraft data
            $manufacturer = $aircraft['manufacturer'];
            $model = $aircraft['model'];
            $price = $aircraft['price'];
            $imageUrl = str_replace('images/', '', $aircraft['image']); 
            $imageUrl = $baseStorageUrl . urlencode($imageUrl) . '?alt=media';
        
            $features = $aircraft['cockpitFeatures'];
        
            ?>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="row no-gutters">
                        <div class="col-md-6  card-img-wrapper">
                            <img src="<?php echo $imageUrl; ?>" class="card-img" alt="Airplane Image">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $manufacturer; ?></h5>
                                <p class="card-text">Model: <?php echo $model; ?></p>
                                <p class="card-text">Price: $<?php echo $price; ?></p>
                                <!-- Display features -->
                                <ul>
                                    <?php foreach ($features as $feature): ?>
                                        <li><?php echo $feature; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <!-- Add buttons or links as needed -->
                                <a href="#" class="btn btn-primary mt-3  w-100">Cart</a>
                                <a href="#" class="btn btn-primary mt-3  w-100">Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>
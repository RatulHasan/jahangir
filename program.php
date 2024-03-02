<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing program</title>
</head>
<body>
    
    <!-- php and html code run -->
    <?php
    $products = [
    [
        'id'                 => 1,
        'title'              => 'iPhone 9',
        'description'        => 'An apple mobile which is nothing like apple',
        'price'              => 549,
        'discountPercentage' => 12.96,
        'rating'             => 4.69,
        'stock'              => 94,
        'brand'              => 'Apple',
        'category'           => 'smartphones',
        'thumbnail'          => 'https://cdn.dummyjson.com/product-images/1/thumbnail.jpg',
        'images'             => [
            'https://cdn.dummyjson.com/product-images/1/1.jpg',
            'https://cdn.dummyjson.com/product-images/1/3.jpg',
            'https://cdn.dummyjson.com/product-images/1/4.jpg',
        ],
    ]
];
?>

<?php foreach ($products as $product) { 
    // discount price calculation
    $discontPrice = $product['price'] - ($product['price'] * ($product['discountPercentage'] / 100));
    $price = (int)$discontPrice;
    ?>
    <div class="flex-container">
        <div class="thumbnail">
            <img src="<?= htmlentities($product['thumbnail'])?>" alt="thumbnail">
        </div>
        <div class="slide-image">
        <?php foreach ($product['images'] as $image) { ?>
             <img src="<?= htmlentities($image) ?>" alt="Image">
        <?php } ?> 
        
        </div>
        <div class="thumbnail-info">
        <p><?= "ID : " . $product['id'] ?></p>
        <p><?= "Title : " . $product['title'] ?></p>
        <p><?= "Description : " . $product['description'] ?></p>
        <p><?= "Price : " . $price; ?></p>
        <p><?= "DiscountPercentage : " . $product['price'] . "&nbsp". "&nbsp" . $product['discountPercentage'] ?></p>
        <p><?= "Rating : " . $product['rating'] ?></p>
        <p><?= "Category : " . $product['category'] ?></p>
        </div>
    </div>

<?php } ?>


</body>
</html>
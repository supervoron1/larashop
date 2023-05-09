<?php
require_once __DIR__ . '/vendor/autoload.php';

use app\models\Products;

$products = Products::all();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaraShop</title>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
</head>
<body>
<header>
    <h1>Магазин книг</h1>
</header>

<section>
    <div class="container">
        <div class="products">
            <?php foreach ($products as $product) { ?>
                <div class="product">
                    <div class="image">
                        <img src="<?= $product['image'] ?>" alt="">
                    </div>
                    <div class="title"><?= $product['name'] ?></div>
                    <div class="price"><?= $product['price'] ?>₽</div>
                    <form action="" class="product-form">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <input type="submit" value="Купить" class="btn">
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<footer>Все права защищены</footer>

<div style="display: none">
    <div id="order">
        <h2>Ваш заказ</h2>
        <div class="title"></div>
        <form action="" class="order-form">
            <div class="form-control count">
                Количество
                <input type="number" name="product_count" value="1" min="1">
            </div>
            <div class="form-control phone">
                Телефон
                <input type="text" name="phone" value="">
            </div>
            <input type="hidden" name="product_id" value="">
            <input type="submit" value="Заказать" class="btn">
        </form>
    </div>
</div>

<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>

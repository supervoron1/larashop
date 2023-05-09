<?php

namespace app\models;

use app\components\Database;

class Orders
{
    public static function add($data)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("insert into orders (
            `product_id`,
            `product_name`,
            `product_price`,
            `product_count`,
            `phone`,
            `created_at`
        ) values (
            :product_id,
            :product_name,
            :product_price,
            :product_count,
            :phone,
            :created_at        
        )");
        $stmt->execute($data);
    }
}

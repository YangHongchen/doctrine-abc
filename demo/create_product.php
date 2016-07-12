<?php

// create_product.php
require_once "../bootstrap.php";
$newProductName = "测试商品名称-".rand(10000,99999);

$product = new \doctrine\abc\Entities\Products(); //实例化Product实体类
$product->setName($newProductName);

$entityManager->persist($product);    //执行持久化操作到doctrine
$entityManager->flush();              //执行sql，并将对应对象数据持久化到数据库

echo "成功新创建一个商品，ID： " . $product->getId() . "\n";
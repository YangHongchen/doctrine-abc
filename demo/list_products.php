<?php
require_once '../bootstrap.php';

$products = $entityManager->getRepository('\doctrine\abc\Entities\Products')->findAll();

foreach($products as $product){
    echo sprintf("-%s\n", $product->getName())."<br>";
}


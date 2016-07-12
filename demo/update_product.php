<?php

// 更新商品信息
require_once "../bootstrap.php";

$id = 1;
$newName = 'new -product name set ' . rand(10000, 99999);

$product = $entityManager->find('\doctrine\abc\Entities\Products', $id);
if ($product === null) {
    echo "Product $id does not exist.\n";
    exit(1);
}
$product->setName($newName);
$res = $entityManager->flush();

print_r($res);
exit;

<?php
// list_bugs.php
require_once "../bootstrap.php";
$dql = "SELECT b, e, r
          FROM \doctrine\abc\Entities\Bugs b
          JOIN b.engineer e
          JOIN b.reporter r
          ORDER BY b.created DESC";

$query = $entityManager->createQuery($dql);
$query->setMaxResults(10);      //设置最大查询数据量
$bugs = $query->getResult();    //获取查询的到的结果
foreach ($bugs as $bug) {
    echo "[bug信息]：" . $bug->getDescription() . " - " . $bug->getCreated()->format('Y-m-d') . "\n<br>";
    echo "[报告人]：" . $bug->getReporter()->getName() . "\n<br>";
    echo "[经办人]：" . $bug->getEngineer()->getName() . "\n<br>";

    $relateProduct = $bug->getProduct();

    foreach ($relateProduct as $product) {
        echo "[bug对应的产品]： " . $product->getName() . "\n<br>";
    }
    echo "<br>" . str_repeat('*', 80) . "</br></br>";
}
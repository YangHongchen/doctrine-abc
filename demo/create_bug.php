<?php
// create_bug.php
require_once "../bootstrap.php";

$theReporterId = 57;         // 报告人
$theDefaultEngineerId = 58;  // 开发人员ID

$productIds = explode(",", '1,2,3');
$reporter = $entityManager->find("\\doctrine\\abc\\Entities\\Users", $theReporterId);
$engineer = $entityManager->find("\\doctrine\\abc\\Entities\\Users", $theDefaultEngineerId);

// 参数检查：检查报告人和所属工程师是否为空
if (!$reporter || !$engineer) {
    throw new Exception("bug[报告人]或[工程师]为空，请确认!\n");
}
// 设置Bug的基本数据
$bug = new \doctrine\abc\Entities\Bugs();
$bug->setDescription("Something does not work!");
$bug->setCreated(new DateTime('now'));
$bug->setStatus("OPEN");

// 添加product和bug的关联关系（多对多用addXXX）
foreach ($productIds as $productId) {
    $product = $entityManager->find("\\doctrine\\abc\\Entities\\Products", $productId);
    $bug->addProduct($product);
}

// 添加Bugs和Users的关联关系（一对一用setXXX）
$bug->setReporter($reporter);
$bug->setEngineer($engineer);

// 持久化操作Bug以及关联关系到数据库
$entityManager->persist($bug);
$entityManager->flush();

echo "Your new Bug Id: " . $bug->getId() . "\n";
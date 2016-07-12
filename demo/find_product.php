<?php

require_once "../bootstrap.php";


$id = 1;
$product = $entityManager->find('\doctrine\abc\Entities\Products', $id);

var_dump($product);
exit;

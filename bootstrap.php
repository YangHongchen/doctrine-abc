<?php
use Doctrine\ORM\Tools\Setup;

require_once "vendor/autoload.php";

// 开发模式开关
$isDevMode = true;

//自定义数据实体描述文件存放目录
$metadataDir = __DIR__ . "/config/yaml/dcm";
if (!file_exists($metadataDir)) {
    mkdir($metadataDir);
}

//Annotation 配置格式
//$config = Setup::createAnnotationMetadataConfiguration(array($metadataDir), $isDevMode);

//XML 配置格式
//$config = Setup::createXMLMetadataConfiguration(array($metadataDir), $isDevMode);

//YAML 配置格式
$config = Setup::createYAMLMetadataConfiguration(array($metadataDir), $isDevMode); //yaml

//MySQL数据库配置（pdo_mysql)
$conn = array(
    'driver' => 'pdo_mysql',
    'host' => 'mysql.host',   //host解析到指定mysql服务器IP
    'dbname' => 'doctrine_abc',
    'user' => 'root',
    'password' => '123456'
);

// 获取一个EntityManager对象实例
$entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);

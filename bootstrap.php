<?php
use Doctrine\ORM\Tools\Setup;

require_once "vendor/autoload.php";

// 开发模式开关
$isDevMode = true;

//Annotation 配置格式
//$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);

// XML 配置格式
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);

//YAML 配置格式
$config = Setup::createYAMLMetadataConfiguration(array(__DIR__ . "/config/yaml/dcm/blog"), $isDevMode); //yaml

//MySQL数据库配置（pdo_mysql)
$conn = array(
    'driver' => 'pdo_mysql',
    'host' => '192.168.33.100',
    'dbname' => 'doctrine_abc',
    'user' => 'root',
    'password' => '123456'
);

// 获取一个EntityManager对象实例
$entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);

<?php
require_once '../bootstrap.php';

$user = new \doctrine\abc\Entities\Users();

$qq = rand(10000, 99999999);
$email = $qq . "qq.com";
$salt = getRandomString(8);
$passwd = md5('123456' . $salt);
$phone = '1' . rand(1, 5) . rand(10000000, 999999999);

$user->setName("Bruce");
$user->setPasswd($passwd);
$user->setPhone($phone);
$user->setEmail($email);
$user->setAge(rand(18, 65));
$user->setQq($qq);
$user->setSalt($salt);

$entityManager->persist($user);
$entityManager->flush();

echo "[新增用户信息成功]:";
$userInfo = $entityManager->getRepository('\doctrine\abc\Entities\Users')->find($user->getId());
// ***************************** debug print *****************************
echo "<pre>";
print_r($userInfo);
echo "</pre>";
exit;
// ***************************** end debug print *****************************


/**
 * 生成随机字母+数字的字符串
 * @param $len         随机字符长度
 * @param null $chars 自定义字符
 * @return string
 */
function getRandomString($len, $chars = null)
{
    if (is_null($chars)) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    }
    mt_srand(10000000 * (double)microtime());
    for ($i = 0, $str = '', $lc = strlen($chars) - 1; $i < $len; $i++) {
        $str .= $chars[mt_rand(0, $lc)];
    }
    return $str;
}

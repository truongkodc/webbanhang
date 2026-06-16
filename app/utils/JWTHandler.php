<?php
require_once 'vendor/autoload.php';
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;
class JWTHandler
{
private $secret_key;
public function __construct()
{
// Khóa phải dài ít nhất 32 ký tự (256 bit) cho HS256
$this->secret_key = "HUTECH_SECRET_KEY_BAI6_2024_ABCD";
}
// Tạo JWT
public function encode($data)
{
$issuedAt = time();
$expirationTime = $issuedAt + 3600; // Hết hạn sau 1 giờ
$payload = array(
'iat' => $issuedAt,
'exp' => $expirationTime,
'data' => $data
);
return JWT::encode($payload, $this->secret_key, 'HS256');
}
// Giải mã JWT
public function decode($jwt)
{
try {
$decoded = JWT::decode($jwt, new Key($this->secret_key, 'HS256'));
return (array) $decoded->data;
} catch (Exception $e) {
return null;
}
}
}
?>
<?php
// 암호화 함수 정의
function encrypt_private_key($key) {
    $encryption_key = base64_decode("your_base64_encoded_key_here"); // 암호화 키를 base64로 인코딩하여 사용
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($key, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

// 복호화 함수 정의
function decrypt_private_key($encrypted_key) {
    $encryption_key = base64_decode("your_base64_encoded_key_here"); // 암호화 키를 base64로 인코딩하여 사용
    list($encrypted_data, $iv) = explode('::', base64_decode($encrypted_key), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}

// 테스트용 프라이빗 키
$private_key = "L11E5bzj2nYE7GV4QSzkc28kWLmcRF3Gox8nAeChA2c6TByWc5qq";

// 암호화 테스트
$encrypted_key = encrypt_private_key($private_key);
echo "Encrypted Key: " . $encrypted_key . "\n";

// 복호화 테스트
$decrypted_key = decrypt_private_key($encrypted_key);
echo "Decrypted Key: " . $decrypted_key . "\n";

?>

<?php

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    // Thực hiện yêu cầu POST
    $result = curl_exec($ch);
    // Đóng kết nối
    curl_close($ch);
    return $result;
}

$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
$orderInfo = "Thanh toán qua MoMo";
$amount = "10000";
$orderId = time() ."";
$redirectUrl = "http://localhost/booking/thanks.php";
$ipnUrl = "http://localhost/booking/user/ipn.php";
$extraData = "";

$requestId = time() . "";
$requestType = "captureWallet";

// Sửa lỗi ở đây từ $serectkey thành $secretKey
$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
$signature = hash_hmac("sha256", $rawHash, $secretKey);

$data = array(
    'partnerCode' => $partnerCode,
    'partnerName' => "Test",
    "storeId" => "MomoTestStore",
    'requestId' => $requestId,
    'amount' => $amount,
    'orderId' => $orderId,
    'orderInfo' => $orderInfo,
    'redirectUrl' => $redirectUrl,
    'ipnUrl' => $ipnUrl,
    'lang' => 'vi',
    'extraData' => $extraData,
    'requestType' => $requestType,
    'signature' => $signature
);

$result = execPostRequest($endpoint, json_encode($data));
$jsonResult = json_decode($result, true);  // Giải mã JSON

// Chỉ là một ví dụ, hãy kiểm tra chi tiết hơn ở đây

if (isset($jsonResult['payUrlqr'])) {
    // Chuyển hướng đến trang thanh toán Momo
    header('Location: ' . $jsonResult['payUrlqr']);
} else {
    // Xử lý lỗi
    echo "Có lỗi xảy ra khi tạo đơn hàng Momo: " . $jsonResult['message'];
    // Hoặc có thể chuyển hướng đến trang lỗi khác
}
?>

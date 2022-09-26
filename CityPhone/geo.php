<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

const GEO_SERVER = 'http://api.sypexgeo.net/json/';

$cityPhoneList = [
    'Moscow' => '495'
];
$phoneCode = '400';

$url = sprintf('%s%s', GEO_SERVER, $_SERVER['HTTP_CLIENT_IP']);
$data = json_decode(file_get_contents($url), true);
$city = $data['city']['name_en'];

if (array_key_exists($city, $cityPhoneList)) {
    $phoneCode = $cityPhoneList[$city];
}

echo json_encode(['phone_code' => $phoneCode]);

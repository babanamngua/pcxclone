<?php

namespace App\Services;

use GuzzleHttp\Client;

class GHTKService
{
    protected $client;
    protected $token;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://services.giaohangtietkiem.vn',
            'verify' => false, // Bỏ qua xác thực SSL
        ]);

        // Đặt token của bạn ở đây
        $this->token = '';
    }

    public function calculateShippingFee($params)
    {
        try {
            // Build query string đúng cách, sử dụng rawurlencode cho address và tags
            $queryParams = [
                "address" => "P.503 tòa nhà Auu Việt, số 1 Lê Đức Thọ",
                "province" => "Hà nội",
                "district" => "Quận Cầu Giấy",
                "pick_province" => "Hà Nội",
                "pick_district" => "Quận Hai Bà Trưng",
                "weight" => 1000,
                "value" => 3000000,
                "deliver_option" => "xteam",
                "tags"  => [1]
            ];

           // Xây dựng query string mà không mã hóa quá mức
           $queryString = http_build_query($queryParams, '', '&', PHP_QUERY_RFC3986);
           $url = "/services/shipment/fee?" . $queryString;

           $response = $this->client->request('GET', $url, [
               'headers' => [
                   'Token' => $this->token,
               ],
           ]);

            $body = $response->getBody();
            return json_decode($body, true);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}

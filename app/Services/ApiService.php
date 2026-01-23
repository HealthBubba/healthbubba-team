<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService {

    public $api;

    public function __construct() {
        $this->api = Http::baseUrl(env('API_URL').'/api');
    }

    function authorize() {
        $this->api->withToken(decrypt(session()->get('token')));
        return $this;
    }

    function resolve($res){
        if(!$res) return [false];
        if(!$data = $res->json()) return [false];
        return [$data['ok'], $data['message'], $data['data'] ?? $data['errors'] ?? ''];
    }

    function register($data) {
        return $this->resolve($this->api->post('register', $data));
    }

    function login($data) {
        return $this->resolve($this->api->post('login', $data));
    }

    function verifyOtp($data) {
        return $this->resolve($this->api->post('verify-otp', $data));
    }

    function createOrder($data){
        return $this->authorize()->resolve($this->api->post('/order/create-order', $data));
    }

    function addToCart($data){
        return $this->authorize()->resolve($this->api->post('cart/add-to-cart', $data));
    }

    function payOrder($order_id, $amount){
        return $this->authorize()->resolve($this->api->post('order/pay-order', [
            'order_id' => $order_id,
            'order_amount' => $amount
        ]));
    }

    function testCategories(){
        return $this->resolve($this->api->get('test/categories'));
    }

    function packages($category){
        return $this->resolve($this->api->get("test/{$category}/packages"));
    }

    function tests($category){
        return $this->resolve($this->api->get("test/category/{$category}"));
    }

    function allTests(){
        return $this->resolve($this->api->get("tests"));
    }

    function medicationCategories(){
        return $this->resolve($this->api->get("medication/categories"));
    }

    function medications($category){
        return $this->resolve($this->api->get("medication/category/{$category}"));
    }

}

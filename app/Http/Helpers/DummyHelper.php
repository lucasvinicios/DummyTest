<?php

namespace App\Http\Helpers;

use GuzzleHttp\Client;

class DummyHelper{

    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' =>  'https://dummyjson.com',
            'headers'  =>   ['Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTUsInVzZXJuYW1lIjoia21pbmNoZWxsZSIsImVtYWlsIjoia21pbmNoZWxsZUBxcS5jb20iLCJmaXJzdE5hbWUiOiJKZWFubmUiLCJsYXN0TmFtZSI6IkhhbHZvcnNvbiIsImdlbmRlciI6ImZlbWFsZSIsImltYWdlIjoiaHR0cHM6Ly9yb2JvaGFzaC5vcmcvYXV0cXVpYXV0LnBuZyIsImlhdCI6MTY3ODc0ODUyMywiZXhwIjoxNjc4NzUyMTIzfQ.62fGGOeecGc_dlEjD0nWpfZV-l_NdCjN16ipBZ0GZPY',
                             'Content-Type' => 'application/json'],
        ]);
    }

    public function test()
    {
        if ($this->client->get('/test')->getStatusCode() == '200')
            return ['status' => 'Connected'];
        else 
            return 'Not Connected';
    }

    public function products()
    {
        return $this->client->get('/products')->getBody()->getContents();
    }

    public function getProduct($id)
    {
        return $this->client->get("/products/$id")->getBody()->getContents();
    }

    public function addProduct()
    {
        return $this->client->post('/products/add')->getBody()->getContents();
    }

}
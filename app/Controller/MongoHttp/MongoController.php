<?php


namespace App\Controller\MongoHttp;


use App\Controller\BaseController;
use Hyperf\GoTask\MongoClient\MongoClient;

class MongoController extends BaseController
{
    public function insert(MongoClient $client)
    {
        $client->database('examples')->runCommand(['db.auth'],['admin','123456']);
        $data = $client->database('examples')->collection('test')->insertOne(['name' => '嘻嘻','value' => 'GG', 'val' => ['t' => 1, 'b' => 2]]);
        $this->success($data);
    }
}
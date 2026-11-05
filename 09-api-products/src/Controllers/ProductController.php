<?php
declare(strict_types = 1);
namespace App\Controllers;
use App\Models\Product;

class ProductController{

    private function getBody():array{
        return json_decode(file_get_contents("php://input"),true) ?? [];
    }

    public function newProduct():void{
        $data = $this->getBody();
        $product = new Product(
            name:$data['name'] ?? '',
            category:$data['category'] ?? '',
            price:$data['price'] ?? -1
        );
        $id=$product->save();
        jsonResponse(
            data:["id"=>$id],
            message:"Producto creado exitosamente",
            status:201
        );
    }

    public function updateProduct():void{
        $data = $this->getBody();
        $product = new Product(
            name:$data['name'] ?? '',
            category:$data['category'] ?? '',
            price:$data['price'] ?? -1
        );
        $affectedRows=$product->update((int)$data['id']);
        jsonResponse(data:["id"=>$data['id']],status: $affectedRows ? 200 : 404); 
    }

    public function showProducts():void{
        $products = Product::getProducts();
        jsonResponse(data:$products);
    }

    public function showProduct(int $id):void{
        $product = Product::getProduct($id);
        jsonResponse(data:$product,status:$product ? 200:404);
    }

    public function deleteProduct(int $id):void{
        $confirm = Product::deleteProduct($id);
        jsonResponse(data:["id"=>$id],status:$confirm ? 200:404);
    }

}
<?php
declare(strict_types = 1);
namespace App\Models;
use App\Database\Database;
use  InvalidArgumentException;

class Product{
    private int $id{
        set(int $value){
            if($value < 0)
                throw new InvalidArgumentException("El id no puede ser negativo");
            $this->id=$value;
        }
    }

    private string $name{
        set(string $value){
            $auxStr = trim($value);
            if($auxStr === "") throw new InvalidArgumentException("El nombre es obligatorio");
            if(strlen($auxStr) < 3 ) throw new InvalidArgumentException("El nombre debe contener minimo 3 caracteres");
            $this->name = trim($value);
        }
    }

    private string $category{
        set(string $value){
            if(trim($value) === "") throw new InvalidArgumentException("La categoria es obligatoria");
            $this->category = trim($value);
        }
    }

    private float $price{
        set(float $value){
            if($value < 0) throw new InvalidArgumentException("El valor no debe ser menor a 0");
            $this->price=$value;
        }
    }
    
    public function __construct(string $name, string $category, float $price,){
        $this->name=$name;
        $this->category=$category;
        $this->price=$price;
    }

    public function save():int{
        $db = Database::getConnection();
        $stmt = $db->prepare("
            INSERT INTO products (name,category,price) VALUES (:name,:category,:price)
        ");
        $stmt->execute([
            "name"=>$this->name,
            "category"=>$this->category,
            "price"=>$this->price
        ]);
        $this->id=(int)$db->lastInsertId();
        return $this->id;
    }

    public function update(int $id):bool{
        $db = Database::getConnection();
        $sql=<<<SQL
            UPDATE products
                SET name=:name, category=:category, price=:price
            WHERE id=:id
        SQL;
        $stmt = $db->prepare($sql);
        $stmt->execute([
            "id"=>$id,
            "name"=>$this->name,
            "category"=>$this->category,
            "price"=>$this->price
        ]);
        return $stmt->rowCount() > 0;
    }

    public static function getProducts():array{
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getProduct(int $id):?array{
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM products WHERE id=:id");
        $stmt->execute(["id"=>$id]);
        return $stmt->fetch() ?: [];
    }

    public static function deleteProduct(int $id):bool{
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM products WHERE id=:id");
        $stmt->execute(["id"=>$id]);
        return $stmt->rowCount() > 0;
    }
}
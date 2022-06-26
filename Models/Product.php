<?php

namespace Models\Product;

use Models\Model\Model;

class Product extends Model
{
    const ORDER_BY_PRICE_ASC = 'price-asc';
    const ORDER_BY_PRICE_DESC = 'price-desc';
    
    public $id;
    public $title;
    public $description;
    public $status;
    public $price;
    public $category;
    public $img;
    public $brand;
    public $barcode;

   

    public function __construct($product)
    {
        $this->id = $product['id'];
        $this->title = $product['title'];
        $this->description = $product['description'];
        $this->available = $product['available'];
        $this->price = $product['price'];
        $this->category = $product['category'];
        $this->img = $product['img'];
        $this->brand= $product['brand'];
        $this->barcode=$product['barcode'];

    }

    public static function getAllProducts()
    {
        parent::connection('products');
        $allProducts = [];
        if (self::$db_status) {
            foreach (parent::fetchAll() as $product) {
                $allProducts[] = new self($product);
            }
        }
        return $allProducts;
     
    }
 
    public static function getAvailableProducts($page = null)
    {
        $availabaleProducts = [];
        foreach (self::getAllProducts() as $product) {
            if ($product->available == 1) {
                $availabaleProducts[] = $product;
            }
        }
        return $availabaleProducts;
    }

    public static function getOneProductById($id)
    {
        $products = self::getAvailableProducts();
        foreach ($products as $product) {
            if ($product->id == $id) {
                return $product;
            }
        }
    }
    public static function getOneProductByBarcode($barcode)
    {
        $products = self::getAvailableProducts();
        foreach ($products as $product) {
            if ($product->barcode == $barcode) {
                return $product;
            }
        }
    }

    public static function filteredProducts($term, $products = [])
    {
        $filteredProducts = [];
        $products = !empty($products) ? $products : self::getAvailableProducts();
        foreach ($products as $product) {
            if (str_contains($product->title, $term) ) {
                $filteredProducts[] = $product;
            }
        }
        return $filteredProducts;
    }

    public static function sortProductBy($sort, $products = [])
    {
        $products = !empty($products) ? $products : self::getAvailableProducts();
        switch ($sort) {
            case self::ORDER_BY_PRICE_ASC:
                usort($products, function ($item1, $item2) {
                    return $item1->price > $item2->price;
                });
                break;
            case self::ORDER_BY_PRICE_DESC:
                usort($products, function ($item1, $item2) {
                    return $item1->price < $item2->price;
                });
                break;
            default:
                break;
        }
        return $products;
    }

    public static function getFourRandomProducts() {
    
        $randProd = []; 
        $arr=(array)self::getAvailableProducts();
        shuffle($arr);
        foreach ($arr as $product) { 
         if (count($randProd) >= 4)  break ;
          
            $randProd[] = $product;}

        
        return $randProd; 
}
public static function getFourCheapProducts() {
    
    $randProd = []; 

    foreach (self::getAvailableProducts() as $product) { 
     if ( count($randProd) >= 4)  break ;
     if ($product->price<= 150) 
        $randProd[] = $product;}

    
    return $randProd; 
}
    public function getRelatedProducts()
    {
        $related = [];
        $products = self::getAvailableProducts();
        foreach ($products as  $product) {
            if ($product->category == $this->category && $this->id != $product->id) {
                $related[] = $product;
                if (count($related) >= 3) {
                    break;
                }
            }
        }
        return $related;
    }

    public function getPrevProductId()
    {
        $products = self::getAvailableProducts();
        foreach ($products as $key => $product) {
            if ($product->id == $this->id) {
                if ($key == 0) {
                    return $products[count($products) - 1]->id;
                } else {
                    return $products[$key - 1]->id;
                }
            }
        }
    }

    public function getNextProductId()
    {
        $products = self::getAvailableProducts();
        foreach ($products as $key => $product) {
            if ($product->id == $this->id) {
                if ($key == (count($products) - 1)) {
                    return $products[0]->id;
                } else {
                    return $products[$key + 1]->id;
                }
            }
        }
  
    }

public static function sortByCategory($category,$products=[]){
    $filteredProducts = [];
    $products = !empty($products) ? $products : self::getAvailableProducts();
    foreach ($products as $product) {
        if (str_contains($product->category, $category) ) {
            $filteredProducts[] = $product;
        }
    }
    return $filteredProducts;
}
}






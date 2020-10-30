<?php
namespace School\Shop\Payment\Paypal;

use School\Database\Database;

class Basket {

    private $products;

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     * @return Basket
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
        return $this;
    }

    public function getPrice(): float {
        return array_reduce($this->getProducts(), function ($total, Product $product) {
            return $product->getPrice()  + $total;
        }, 0);
    }

    public function getVatPrice($rate): float {
        return round($this->getPrice() * $rate * 100) / 100;
    }

    private static function getProductFromDb () {
        $query = Database::prepare('SELECT name, price, quantity FROM basket_content LEFT JOIN articles ON articles.id = basket_content.articles_id WHERE member_id = :member_id', array(":member_id"  =>  $_SESSION['id']));
        return $query;
    }

    public static function items() {
        $products = [];
        foreach (self::getProductFromDb() as $productDbKey => $productDbValue) {
           $product = new Product();
           $product->setName($productDbValue['name']. " ×".$productDbValue['quantity']);
           $product->setPrice($productDbValue['price'] * $productDbValue['quantity']);
           array_push($products, $product);
        }
        return (new self())
            ->setProducts($products);
        /*$products = array_map(function ($price) {
            return (new Product())
            ->setPrice($price);
        }, [1.21, 10.22, 80.00]);
        return (new self())
            ->setProducts($products);*/
    }

}
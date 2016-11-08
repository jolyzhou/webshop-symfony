<?php
/**
 * Created by PhpStorm.
 * User: jolyzhou
 * Date: 2016/11/8
 */
namespace AppBundle\Service\Menu;

class OnSale {
    public function getItems() {
        return array(
            array('path' =>'iphone', 'name' =>'iPhone', 'img' =>
                '/img/missing-image.png', 'price' => 19.99,
                'add_to_cart_url' =>'#'),
            array('path' =>'lg', 'name' =>'LG', 'img' =>
                '/img/missing-image.png', 'price' => 29.99,
                'add_to_cart_url' =>'#'),
            array('path' =>'samsung', 'name' =>'Samsung', 'img' =>
                '/img/missing-image.png', 'price' => 39.99,
                'add_to_cart_url' =>'#'),
            array('path' =>'lumia', 'name' =>'Lumia', 'img' =>
                '/img/missing-image.png', 'price' => 49.99,
                'add_to_cart_url' =>'#'),
            array('path' =>'edge', 'name' =>'Edge', 'img' =>
                '/img/missing-image.png', 'price' => 69.99,
                'add_to_cart_url' =>'#'),
        );
    }
}
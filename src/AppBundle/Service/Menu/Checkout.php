<?php
/**
 * Created by PhpStorm.
 * User: jolyzhou
 * Date: 2016/11/8
 * Time: 11:20
 */
namespace AppBundle\Service\Menu;

class Checkout {
    public function getItems() {
        // Initial dummy menu
        return array(
            array('path' =>'cart', 'label' =>'Cart (3)'),
            array('path' =>'checkout', 'label' =>'Checkout'),
        );
    }
}
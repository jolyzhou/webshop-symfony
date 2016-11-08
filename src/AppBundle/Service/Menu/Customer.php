<?php
/**
 * Created by PhpStorm.
 * User: jolyzhou
 * Date: 2016/11/8
 */
namespace AppBundle\Service\Menu;

class Customer {
    public function getItems() {
        return array(
            array('path' =>'account', 'label' =>'John Doe'),
            array('path' =>'logout', 'label' =>'Logout'),
        );
    }
}
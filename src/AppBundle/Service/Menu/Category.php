<?php
/**
 * Created by PhpStorm.
 * User: jolyzhou
 * Date: 2016/11/8
 */
namespace AppBundle\Service\Menu;

class Category {
    public function getItems() {
        return array(
            array('path' =>'women', 'label' =>'Women'),
            array('path' =>'men', 'label' =>'Men'),
            array('path' =>'sport', 'label' =>'Sport'),
        );
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: jolyzhou
 * Date: 2016/11/10
 */
namespace AppBundle\Service\Menu;
class AddToCartUrl
{
    // To be implemented as part of checkout module
    public function getAddToCartUrl($productId)
    {
        // Just a dummy link, to be implemented later
        return '/cart/add/' . $productId;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: jolyzhou
 * Date: 2016/11/14
 */
namespace Foggyline\SalesBundle\Service;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
class AddToCartUrl {
    private $em;
    private $router;
    public function __construct(EntityManager $entityManager, Router $router)
    {
        $this->em = $entityManager;
        $this->router = $router;
    }
    public function getAddToCartUrl($productId)
    {
        return $this->router->generate('foggyline_sales_cart_add', array('id' => $productId));
    }
}
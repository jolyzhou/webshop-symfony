<?php
/**
 * Created by PhpStorm.
 * User: jolyzhou
 * Date: 2016/11/14
 */
namespace Foggyline\SalesBundle\Service;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
class BestSellers
{
    private $em;
    private $router;
    public function __construct(EntityManager $entityManager,Router $router)
    {
        $this->em = $entityManager;
        $this->router = $router;
    }
    public function getItems()
    {
        $products = array();
        $salesOrderItem = $this->em->getRepository('FoggylineSalesBundle:SalesOrderItem');
        $_products = $salesOrderItem->getBestsellers();
        foreach ($_products as $_product) {
            $products[] = array(
                'path' => $this->router->generate('product_show', array('id' => $_product->getId())),
                'name' => $_product->getTitle(),
                'img' => $_product->getImage(),
                'price' => $_product->getPrice(),
                'id' => $_product->getId(),
            );
        }
        return $products;
    }
}
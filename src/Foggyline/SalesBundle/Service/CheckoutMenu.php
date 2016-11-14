<?php
/**
 * Created by PhpStorm.
 * User: jolyzhou
 * Date: 2016/11/14
 */
namespace Foggyline\SalesBundle\Service;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Foggyline\CustomerBundle\Entity\Customer;
class CheckoutMenu
{
    private $em;
    private $token;
    private $router;
    public function __construct(EntityManager $entityManager, $tokenStorage,Router $router)
    {
        $this->em = $entityManager;
        $this->token = $tokenStorage->getToken();
        $this->router = $router;
    }
    public function getItems()
    {
        if ($this->token && $this->token->getUser() instanceof Customer) {
            $customer = $this->token->getUser();
            $cart = $this->em->getRepository('FoggylineSalesBundle:Cart')->findOneBy(array('customer' => $customer));
            if ($cart) {
                return array(
                    array('path' => $this->router->generate('foggyline_sales_cart'), 'label' => sprintf('Cart (%s)', count($cart->getItems()))),
                    array('path' => $this->router->generate('foggyline_sales_checkout'), 'label' => 'Checkout'),
                );
            }
        }
        return array();
    }
}
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
class CustomerOrders {
    private $em;
    private $token;
    private $router;
    public function __construct(EntityManager $entityManager,$tokenStorage,Router $router)
    {
        $this->em = $entityManager;
        $this->token = $tokenStorage->getToken();
        $this->router = $router;
    }
    public function getOrders()
    {
        $orders = array();
        if ($this->token && $this->token->getUser() instanceof Customer) {
            $salesOrders = $this->em->getRepository('FoggylineSalesBundle:SalesOrder')
                ->findBy(array('customer' => $this->token->getUser()));
            foreach ($salesOrders as $salesOrder) {
                $orders[] = array(
                    'id' => $salesOrder->getId(),
                    'date' => $salesOrder->getCreatedAt()->format('d/m/Y H:i:s'),
                    'ship_to' => $salesOrder->getAddressFirstName() . ' ' . $salesOrder->getAddressLastName(),
                    'order_total' => $salesOrder->getTotalPrice(),
                    'status' => $salesOrder->getStatus(),
                    'actions' => array(
                        array(
                            'label' => 'Cancel',
                            'path' => $this->router->generate('foggyline_sales_order_cancel', array('id' => $salesOrder->getId()))
                        ),
                        array(
                            'label' => 'Print',
                            'path' => $this->router->generate('foggyline_sales_order_print', array('id' => $salesOrder->getId()))
                        )
                    )
                );
            }
        }
        return $orders;
    }
}
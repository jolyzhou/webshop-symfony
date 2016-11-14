<?php
/**
 * Created by PhpStorm.
 * User: jolyzhou
 * Date: 2016/11/14
 */
namespace Foggyline\ShipmentBundle\Service;
class FlatRateShipment
{
    private $router;
    public function __construct(
        \Symfony\Bundle\FrameworkBundle\Routing\Router $router
    )
    {
        $this->router = $router;
    }
    public function getInfo($street, $city, $country, $postcode, $amount, $qty)
    {
        /**
         * This is a fixed rate shipment, meaning no API requests, so we do not really need order and address info here.
         * Still, imagining this is a sort of interface all methods must comply to.
         */
        return array(
            'shipment' => array(
                'title' => 'Foggyline FlatRate Shipment',
                'code' => 'flat_rate',
                'delivery_options' => array(array(
                    'title' => 'Fixed',
                    'code' => 'fixed',
                    'price' => 9.99
                )),
                'url_process' => $this->router->generate('foggyline_shipment_flat_rate_process'),
            )
        );
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: jolyzhou
 * Date: 2016/11/14
 */
namespace Foggyline\SalesBundle\Service;
class Shipment {
    private $container;
    private $methods;

    public function __construct($container, $methods)
    {
        $this->container = $container;
        $this->methods = $methods;
    }

    public function getAvailableMethods()
    {
        $methods = array();
        foreach ($this->methods as $_method) {
            $methods[$_method] = $this->container->get($_method);
        }
        return $methods;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: jolyzhou
 * Date: 2016/11/10
 */
namespace Foggyline\CatalogBundle\Tests\Service\Menu;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Foggyline\CatalogBundle\Service\Menu\Category;
class CategoryTest extends KernelTestCase
{
    private $container;
    private $em;
    private $router;

    public function setUp()
    {
        static::bootKernel();
        $this->container = static::$kernel->getContainer();
        $this->em = $this->container->get('doctrine.orm.entity_manager');
        $this->router = $this->container->get('router');
    }

    public function testGetItems()
    {
        $service = new Category($this->em, $this->router);
        $this->assertNotEmpty($service->getItems());
    }

    protected function tearDown()
    {
        $this->em->close();
        unset($this->em, $this->router);
    }
}
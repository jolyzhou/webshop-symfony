<?php
/**
 * Created by PhpStorm.
 * User: jolyzhou
 * Date: 2016/11/10
 */
namespace Foggyline\CatalogBundle\Service\Menu;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

class Category {
    private $em;
    private $router;

    public function __construct(EntityManager $entityManager,Router $router)
    {
        $this->em = $entityManager;
        $this->router = $router;
    }

    public function getItems()
    {
        $categories = array();
        $_categories = $this->em->getRepository('FoggylineCatalogBundle:Category')->findAll();

        foreach($_categories as $_category) {
            /* @var $_category \Foggyline\CatalogBundle\Entity\Category */
            $categories[] = array(
                'path' => $this->router->generate('category_show',
                    array('id' => $_category->getId())),
                'label' => $_category->getTitle(),
            );
        }
        return $categories;
    }
}
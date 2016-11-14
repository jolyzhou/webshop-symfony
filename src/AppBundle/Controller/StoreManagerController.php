<?php
/**
 * Created by PhpStorm.
 * User: jolyzhou
 * Date: 2016/11/14
 */
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class StoreManagerController extends Controller
{
    /**
     * @Route("/store_manager", name="store_manager")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:default:store_manager.html.twig');
    }
}
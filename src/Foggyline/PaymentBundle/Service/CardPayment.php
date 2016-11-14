<?php
/**
 * Created by PhpStorm.
 * User: jolyzhou
 * Date: 2016/11/14
 */
namespace Foggyline\PaymentBundle\Service;
use Foggyline\PaymentBundle\Entity\Card;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
class CardPayment {
    private $formFactory;
    private $router;
    public function __construct($formFactory,Router $router)
    {
        $this->formFactory = $formFactory;
        $this->router = $router;
    }
    public function getInfo()
    {
        $card = new Card();
        $form = $this->formFactory->create('Foggyline\PaymentBundle\Form\CardType', $card);
        return array(
            'payment' => array(
                'title' => 'Foggyline Card Payment',
                'code' => 'card_payment',
                'url_authorize' => $this->router->generate('foggyline_payment_card_authorize'),
                'url_capture' => $this->router->generate('foggyline_payment_card_capture'),
                'url_cancel' => $this->router->generate('foggyline_payment_card_cancel'),
                'form' => $form->createView()
            )
        );
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: jolyzhou
 * Date: 2016/11/14
 */
namespace Foggyline\PaymentBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class CheckMoneyController extends Controller {
    public function authorizeAction(Request $request)
    {
        // Imagine we are calling the real payment processor API here, and getting some transaction id back
        $transaction = md5(time() . uniqid()); // Just a dummy string, simulating some transaction id, if any
        return new JsonResponse(array(
            'success' => $transaction
        ));
    }
    public function captureAction(Request $request)
    {
        // Imagine we are calling the real payment processor API here, and getting some transaction id back
        $transaction = md5(time() . uniqid()); // Just a dummy string, simulating some transaction id, if any
        return new JsonResponse(array(
            'success' => $transaction
        ));
    }
    public function cancelAction(Request $request)
    {
        // Imagine we are calling the real payment processor API here, and getting some transaction id back
        $transaction = md5(time() . uniqid()); // Just a dummy string, simulating some transaction id, if any
        return new JsonResponse(array(
            'success' => $transaction
        ));
    }
}
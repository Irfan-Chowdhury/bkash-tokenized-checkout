<?php
declare(strict_types=1);

namespace IrfanChowdhury\BkashTokenizedCheckout\Services;

use IrfanChowdhury\BkashTokenizedCheckout\Payment\BkashPayment;

// use App\Payment\OtherPayment;


class PaymentService
{
    public function initialize(string $paymentMethod)
    {
        switch ($paymentMethod) {
            case 'bkash':
                return new BkashPayment();
            // case 'other':
            //     return new OtherPayment();
            default:
                break;
        }
    }
}
?>

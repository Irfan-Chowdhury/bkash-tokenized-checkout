<?php

namespace IrfanChowdhury\BkashTokenizedCheckout\Contracts;

interface PaybleContract
{
    public function pay($request);
    public function cancel();
}

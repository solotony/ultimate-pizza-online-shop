<?php

public function format_price($value, $currency) {
    return $value . $currency->sign;
}


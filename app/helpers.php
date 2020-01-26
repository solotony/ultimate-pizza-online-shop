<?php

function format_price($value, $currency) {
    $v = number_format($value / $currency->rate, 2, '.', '');
    if ($currency->sign_before) {
        $v = $currency->sign . $v;
    }
    else {
        $v = $v . $currency->sign;
    }
    return $v;
}

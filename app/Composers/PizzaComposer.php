<?php

namespace App\Composers;

use App\Currency;
use Illuminate\Support\Facades\View;

class PizzaComposer
{
    public $currencies;
    public $sel_currency;
    public $sel_currency_id;

    public function compose($view)
    {
        $this->currencies = Currency::query()->get();
        $this->sel_currency_id = session()->get('currency', config('pizza.main_currency'));
        $this->sel_currency = Currency::query()->where('id', $this->sel_currency_id)->first();

        $view->with( 'currencies', $this->currencies )
            ->with ( 'sel_currency_id', $this->sel_currency_id)
            ->with ( 'sel_currency', $this->sel_currency);
    }
}

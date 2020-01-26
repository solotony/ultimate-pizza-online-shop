<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $currencies;
    public $sel_currency;
    public $sel_currency_id;

    public function __construct() {

        $this->currencies = Currency::query()->get();
        $this->sel_currency_id = session()->get('currency', config('pizza.main_currency'));
        $this->currency_id = Currency::query()->where('id', $this->sel_currency_id)->first();

        View::share ( 'currencies', $this->currencies );
        View::share ( 'sel_currency_id', $this->sel_currency_id);
        View::share ( 'sel_currency', $this->sel_currency);
    }

}

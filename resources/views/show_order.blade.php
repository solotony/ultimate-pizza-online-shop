@extends('layout')

@section('title')
    Show order # {{ $order_id }} - UPOShop
@endsection

@section('content')
    @if($order && $order->status > 0)

        <h2>Status: {{$order->status_text() }}</h2>

        <ul>
            <li>
                Delivery method: {{$order->method_text()}}
            </li>
            <li>
                Delivery time: from {{(new \Carbon\Carbon($order->delivery_time))->format('d.m H:i')}} to {{(new \Carbon\Carbon($order->delivery_time))->addHour()->format('d.m H:i')}}
            </li>
            @if($order->shop)
            <li>
                Shop: {{ $order->shop->name }}  {{ $order->shop->address }}
            </li>
            @endif
            <li>
                Delivery address: hidden
            </li>
            <li>
                Delivery comment: hidden
            </li>
        </ul>

        <table class="cart-table">
            @foreach ($order->items as $item)
                <tr>
                    @if(!$item->related_id)
                        <td><strong>{{ $item->name }}</strong></td>
                        <td><strong>{{ $item->qty }}</strong></td>
                        <td><strong>{{ format_price($item->price, $sel_currency) }}</strong></td>
                        <td><strong>{{ format_price($item->amount, $sel_currency) }}</strong></td>
                    @else
                        <td><small>{{ $item->name }}</small></td>
                        <td> &nbsp; </td>
                        <td><small>{{ format_price($item->price, $sel_currency) }}</small></td>
                        <td><small>{{ format_price($item->amount, $sel_currency) }}</small></td>
                    @endif
                </tr>
            @endforeach
            <tr class="cart-table__total">
                <td><strong>Total</strong></td>
                <td><strong></strong></td>
                <td><strong></strong></td>
                <td><small>{{ format_price($order->amount, $sel_currency) }}</small></td>
            </tr>
        </table>
    @else
        No such order
    @endif
@endsection

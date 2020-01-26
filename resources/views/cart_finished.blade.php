@extends('layout')

@section('title')
    Checkout - UPOShop
@endsection

@section('content')
    Your order # {{ $order->id }} has been registerd.
    We weill contact to You as soon as possible.
@endsection

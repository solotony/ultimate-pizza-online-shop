@extends('layout')

@section('title')
    Cart - UPOShop
@endsection

@section('content')
    <cart-editor></cart-editor>
    <form action="{{route('cart_checkout')}}" method="post">
        @csrf
        <button>Checkout</button>
    </form>
@endsection

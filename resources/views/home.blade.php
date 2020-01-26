@extends('layout')

@section('title')
    User's {{ Auth::user()->name}} cabinet
@endsection

@section('content')
    <h2>Profile</h2>
    <ul>
        <li>{{ Auth::user()->name }}</li>
        <li>{{ Auth::user()->email }}</li>
        <li>{{ Auth::user()->tel }}</li>
    </ul>
    <h2>Orders</h2>
    <table class="cart-table">
        <tr>
            <th>ID</th>
            <th>created at</th>
            <th>status</th>
            <th>delivery time</th>
            <th>delivery method</th>
            <th>shop</th>
            <th>amount</th>

        </tr>
    @foreach(Auth::user()->orders as $order)

     <tr>
         <td><a href="{{route('home_order', $order->id)}}">{{$order->id}}</a></td>
         <td>{{$order->created_at->format('d.m h:i')}}</td>
         <td>{{$order->status_text()}}</td>
         <td>{{ (new \Carbon\Carbon($order->delivery_time))->format('d.m h:i') }}</td>
         <td>{{$order->method_text()}}</td>
         <td>{{$order->shop->name}}</td>
         <td>{{format_price($order->amount, $sel_currency)}}</td>

     </tr>
    @endforeach
    </table>

@endsection

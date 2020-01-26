@extends('layout')

@section('title')
    Checkout - UPOShop
@endsection

@section('content')
    <form action="{{route('cart_finish')}}" method="post">
        @csrf

        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>


        <table>
            <tr>
                <td>
                    <label for="phone">phone</label>
                </td>
                <td>
                    <input name="phone" id="phone" value="{{old('phone')}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name">name</label>
                </td>
                <td>
                    <input name="name" id="name" value="{{old('name')}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">email</label>
                </td>
                <td>
                    <input name="email" id="email" value="{{old('email')}}">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="shop">preferred shop</label>
                </td>
                <td>
                    <select name="shop" id="shop">
                        @foreach($shops as $shop)
                            <option value="{{$shop->id}}" @if(old('shop')==$shop->id) selected @endif>{{ $shop->name }} {{ $shop->address }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="delivery_method">delivery method</label>
                </td>
                <td>
                    <select name="delivery_method" id="delivery_method" >
                        <option value="1" @if(old('delivery_method')==1) selected @endif>Delivery</option>
                        <option value="2" @if(old('delivery_method')==2) selected @endif>Pickup</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="time_of_delivery">time of delivery</label>
                </td>
                <td>
                    <select name="time_of_delivery" id="time_of_delivery" >
                        @php $tim = \Carbon\Carbon::now(config('app.timezone'))->addHour()->startOfHour() @endphp
                        @for($i=0;$i<24;$i++)
                            <option value="{{$i}}" @if(old('time_of_delivery')==$i) selected @endif>
                                @php $ts = clone $tim; $ts->addHours($i); $te = clone $tim; $te->addHours($i+1); @endphp
                                @if($tim->hour <= $ts->hour) today @else tomorrow  @endif from {{$ts->format("H:i")}} to {{$te->format("H:i")}}
                            </option>
                        @endfor
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="address">delivery address</label>
                </td>
                <td>
                    <textarea name="address" id="address">{{old('address')}}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="delivery_comment">delivery comment</label>
                </td>
                <td>
                    <textarea name="delivery_comment" id="delivery_comment"> {{old('delivery_comment')}}</textarea>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <button>Finish</button>
                </td>
            </tr>
        </table>
    </form>
@endsection

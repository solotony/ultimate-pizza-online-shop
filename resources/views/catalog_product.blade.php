@extends('layout')

@section('title')
    {{$product->name}} - UPOShop
@endsection

@section('content')

    <div class="product">
        {{--        @foreach ($product->units_instock as $u)--}}
        {{--            {{ $u }}--}}
        {{--        @endforeach--}}

        @if($product->info)
        <h2>Info</h2>
        <p>
            {!!  $product->info !!}
        </p>
        @endif
        @if($product->ingradients->count())
        <h2>Ingradients</h2>
            <ul>
                @foreach($product->ingradients as $i)
                <li>
                    {{ $i->name }}
                </li>
                @endforeach
            </ul>
        @endif

        @if($product->units_instock->count())
            @if($product->units_instock->count()>1)
                <h2>Offers</h2>
                <ul>
                    @foreach($product->units_instock as $u)
                        <li>
                            @if($u->weight)
                                weight {{ $u->weight }} g &nbsp; &nbsp;
                            @endif
                            @if($u->size)
                                size {{ $u->size }} cm &nbsp; &nbsp;
                                @endif
                            @if($u->volume)
                                volume {{ $u->size }} ml &nbsp; &nbsp;
                                @endif
                            <strong>{{ $u->price }}₽ </strong>
                        </li>
                    @endforeach
                </ul>
            @else
                <h2>Price</h2>
                @foreach($product->units_instock as $u)
                    <p>
                        @if($u->weight)
                            weight {{ $u->weight }} g &nbsp; &nbsp;
                        @endif
                        @if($u->size)
                            size {{ $u->size }} cm &nbsp; &nbsp;
                        @endif
                        @if($u->volume)
                            volume {{ $u->size }} ml &nbsp; &nbsp;
                        @endif
                        <strong>{{ $u->price }}₽ </strong>
                    </p>
                @endforeach
            @endif
        @else
            <p>not in stock</p>
        @endif

    </div>
@endsection

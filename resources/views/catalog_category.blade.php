@extends('layout')

@section('title')
    {{$category->name}} - UPOShop
@endsection

@section('content')

    <div class="menutable">
        @foreach($category->subcategories as $s)
            <div class="menutable__subcategory">
                <h2>{{ $s->name }}</h2>
                <div class="menutable__container">
                    @foreach($s->products_instock as $p)
                        <div class="menutable__item">
                            <h3><a href="{{route('product_page', [$category->id, $p->id] )}}">{{ $p->name }}</a></h3>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection

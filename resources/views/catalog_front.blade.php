@extends('layout')

@section('title')
    Ultimate Pizza Online Shop (UPOShop)
@endsection

@section('content')

    <div class="categories">
        @foreach($categories as $c)
            <div class="categories__item">
                <h2><a href="{{route('category_page', $c->id)}}">{{ $c->name }}</a></h2>
            </div>
        @endforeach
    </div>
@endsection

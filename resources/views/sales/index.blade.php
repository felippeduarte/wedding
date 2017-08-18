@extends('layout.layout')
@section('content')
<div class="row row-table row-background">
    <div class="col-xs-12 content">
    	@foreach($products as $product)
            <div class="col-xs-12 col-sm-6">
                <img src="/img/products/{{ $product->image }}">
                <label>{{ $product->name }}</label>
                <a href="/presentes/{{$product->id}}" class="btn btn-success"><i class="fa fa-gift"></i> Presentear</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
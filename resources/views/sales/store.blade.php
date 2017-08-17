@extends('layout.layout')
@section('content')
<div class="row row-table row-background">
    <div class="col-xs-12 content">
    	Obrigado por blablabla
	</div>
	<div class="col-xs-12 content">
		<a href="{{ $paymentLink }}" target="_blank">Imprimir Boleto</a>
	</div>
</div>
@endsection
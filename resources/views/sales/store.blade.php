@extends('layout.layout')
@section('content')
<div class="row row-table row-background">
    <div class="col-xs-12 content">
        Obrigado por blablabla
    </div>
    @if($tipo == \App\Enums\EnumTipoPagamento::DEPOSIT)
    <div class="col-xs-12 content">
        Para depósito bancário, utilize os seguintes dados:<br/>
        001 - Banco do Brasil<br/>
        1386-2 - Agência<br/>
        36068-6 - Conta Corrente<br/>
        056.947.249-09 - CPF<br/>
        Felippe Roberto Bayestorff Duarte<br/>
    </div>
    @else if($tipo == EnumTipoPagamento::BOLETO)
    <div class="col-xs-12 content">
        <a href="{{ $paymentLink }}" target="_blank">Imprimir Boleto</a>
    </div>
    @endif
</div>
@endsection
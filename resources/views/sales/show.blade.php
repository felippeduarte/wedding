@extends('layout.layout')
@section('content')
<div class="row row-table row-background">
    <div class="col-xs-12 content">
        <img src="/img/products/{{ $product->image }}">
        <label>{{ $product->name }}</label>
        <span>{{ $product->description }}</span>
        <a href="/presentes/" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
    </div>
    <div id="target" class="col-xs-12 content"></div>
</div>

<script type="text/javascript" src="{{ env('PAGSEGURO_JS') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
	var sessionId = '{{ PagSeguro::startSession() }}';
    PagSeguroDirectPayment.setSessionId(sessionId);

    PagSeguroDirectPayment.getPaymentMethods({
        amount: 500.00,
        success: function(response) {
        	var senderHash = PagSeguroDirectPayment.getSenderHash();
            //meios de pagamento disponíveis
            var img_boleto = response.paymentMethods.BOLETO.options.BOLETO.images.MEDIUM.path;
            var img_visa = response.paymentMethods.CREDIT_CARD.options.VISA.images.MEDIUM.path;
            var img_mastercard = response.paymentMethods.CREDIT_CARD.options.MASTERCARD.images.MEDIUM.path;
            var img_deposito = response.paymentMethods.DEPOSIT.options.BANCO_BRASIL.images.MEDIUM.path;

            var html = 'Presentear com:<br/>';
            html += '<a href="/presentes/create?id={{ $product->id }}&tipo={{\App\Enums\EnumTipoPagamento::BOLETO}}&sessionId='+sessionId+'&hash='+senderHash+'">Boleto: <img class="img-responsive" src="https://stc.pagseguro.uol.com.br/'+img_boleto+'"/></a><br/>';
            html += '<a href="/presentes/create?id={{ $product->id }}&tipo={{\App\Enums\EnumTipoPagamento::CREDIT_CARD}}&sessionId='+sessionId+'&hash='+senderHash+'">Cartão de Crédito: <img class="img-responsive" src="https://stc.pagseguro.uol.com.br/'+img_visa+'"/>'+
                    '<img class="img-responsive" src="https://stc.pagseguro.uol.com.br/'+img_mastercard+'"/></a><br/>';
            html += '<a href="/presentes/create?id={{ $product->id }}&tipo={{\App\Enums\EnumTipoPagamento::DEPOSIT}}&sessionId='+sessionId+'&hash='+senderHash+'">Depósito Online: <img class="img-responsive" src="https://stc.pagseguro.uol.com.br/'+img_deposito+'"/></a><br/>';
            $('#target').html(html);
        },
        error: function(response) {
            //tratamento do erro
            debugger;
        }
    });
});
</script>
@endsection
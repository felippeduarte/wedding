@extends('layout.layout')
@section('content')
<div class="row row-table row-background">
    <div class="col-xs-12 content">
        <img src="/img/products/{{ $product->image }}">
        <label>{{ $product->name }}</label>
        <span>{{ $product->description }}</span>
        <span>{{ $product->price }}</span>
    </div>
    <div class="col-xs-12 content">
        <form method="POST" action="/presentes">
            {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="session_id" value="{{ $session_id }}">
            <input type="hidden" name="hash" value="{{ $hash }}">
            <input type="hidden" name="tipo" value="{{ $tipo }}">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
            </div>
            @if($tipo != \App\Enums\EnumTipoPagamento::DEPOSIT)
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="000.000.000-00">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name="telefone" id="telefone" placeholder="(48) 99999-9999">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="email@email.com">
            </div>
            @endif
            <div class="form-group">
                <label for="mensagem">Mensagem</label>
                <textarea class="form-control" name="mensagem" id="mensagem" placeholder="Deixe aqui uma mensagem para os noivos" rows="3">
                </textarea>
            </div>
            @if($tipo == \App\Enums\EnumTipoPagamento::BOLETO)
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Confirmar e Gerar Boleto</button>
                </div>
            </div>
            @endif
            @if($tipo == \App\Enums\EnumTipoPagamento::CREDIT_CARD)
            <div class="form-group">
                <label for="dataNascimento">Data Nascimento</label>
                <input type="text" class="form-control" name="dataNascimento" id="dataNascimento" placeholder="00/00/0000">
            </div>
            <div class="form-group">
                <label for="billingAddressStreet">Rua</label>
                <input type="text" class="form-control" name="billingAddressStreet" id="billingAddressStreet" placeholder="Rua">
            </div>
            <div class="form-group">
                <label for="billingAddressNumber">Número</label>
                <input type="text" class="form-control" name="billingAddressNumber" id="billingAddressNumber" placeholder="123">
            </div>
            <div class="form-group">
                <label for="billingAddressComplement">Complemento</label>
                <input type="text" class="form-control" name="billingAddressComplement" id="billingAddressComplement">
            </div>
            <div class="form-group">
                <label for="billingAddressDistrict">Bairro</label>
                <input type="text" class="form-control" name="billingAddressDistrict" id="billingAddressDistrict" placeholder="Bairro">
            </div>
            <div class="form-group">
                <label for="billingAddressPostalCode">CEP</label>
                <input type="text" class="form-control" name="billingAddressPostalCode" id="billingAddressPostalCode" placeholder="00000-000">
            </div>
            <div class="form-group">
                <label for="billingAddressCity">Cidade</label>
                <input type="text" class="form-control" name="billingAddressCity" id="billingAddressCity" placeholder="Cidade">
            </div>
            <div class="form-group">
                <label for="billingAddressState">UF</label>
                <input type="text" class="form-control" name="billingAddressState" id="billingAddressState" placeholder="SC" value="SC">
            </div>
            <div class="form-group">
                <label for="cartao">Número Cartão</label>
                <input type="text" class="form-control" name="cartao" id="cartao" placeholder="9999 9999 9999 9999">
                <input type="hidden" name="bandeira" id="bandeira" value="">
                <input type="hidden" name="tokenCartaoCredito" id="tokenCartaoCredito" value="">
            </div>
            <div class="form-group">
                <label for="cvv">Código Segurança</label>
                <input type="text" class="form-control" name="cvv" id="cvv" placeholder="999">
            </div>
            <div class="form-group">
                <label for="validadeMes">Validade</label>
                <div class="form-inline">
                    <input type="text" class="form-control" name="validadeMes" id="validadeMes" placeholder="12">
                    <input type="text" class="form-control" name="validadeAno" id="validadeAno" placeholder="2017">
                </div>
            </div>
            <div class="form-group">
                <label for="parcelas">Parcelas</label>
                <select class="form-control" name="parcelas" id="parcelas">
                    <option value="1" selected="selected">1x</option>
                    <option value="2">2x</option>
                    <option value="3">3x</option>
                    <option value="4">4x</option>
                    <option value="5">5x</option>
                </select>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Confirmar</button>
                </div>
            </div>
            @endif
            @if($tipo == \App\Enums\EnumTipoPagamento::DEPOSIT)
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Confirmar</button>
                </div>
            </div>
            @endif
        </form>
    </div>
</div>
<script type="text/javascript" src="{{ env('PAGSEGURO_JS') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    PagSeguroDirectPayment.setSessionId('{{$session_id}}');
    $('#cpf').unmask();
    $('#cpf').mask('000.000.000-00', {reverse: true});

    var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
          field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };
    $('#telefone').unmask();
    $('#telefone').mask(SPMaskBehavior, spOptions);

    @if($tipo == \App\Enums\EnumTipoPagamento::CREDIT_CARD)

    $('#dataNascimento').unmask();
    $('#dataNascimento').mask('00/00/0000');
    
    $('#billingAddressPostalCode').unmask();
    $('#billingAddressPostalCode').mask('00000-000');

    $('#cartao').unmask();
    $('#cartao').mask('0000 0000 0000 0000');

    $('#cvv').unmask();
    $('#cvv').mask('00000');
    $('#validadeMes').unmask();
    $('#validadeMes').mask('00', {reverse: true});

    $('#validadeAno').unmask();
    $('#validadeAno').mask('0000');

    $('form').submit(function() {
        event.preventDefault();

        var token = false;

        PagSeguroDirectPayment.getBrand({
            cardBin: $("input#cartao").val().replace(/ /g, '').slice(0, 6),
            success: function(response) {
                $("input#bandeira").val(response.brand.name);

                var param = {
                    cardNumber: $("input#cartao").val(),
                    cvv: $("input#cvv").val(),
                    expirationMonth: $("input#validadeMes").val(),
                    expirationYear: $("input#validadeAno").val(),
                    brand: $("input#bandeira").val(),
                    success: function(response) {
                        token = response.card.token;
                        $("input#tokenCartaoCredito").val(token);
                        $('form').unbind('submit').submit();
                    },
                    error: function(response) {
                        alert('Ocorreu um erro ao processar a solicitação. Verifique os dados do seu cartão de crédito. Não se preocupe, nenhuma cobrança foi feita');
                        return false;
                    }
                };

                PagSeguroDirectPayment.createCardToken(param);
            },
            error: function(response) {
                alert('Ocorreu um erro ao processar a solicitação. Verifique os dados do seu cartão de crédito. Não se preocupe, nenhuma cobrança foi feita');
                return false;
            }
        });
    });
    @endif
});

</script>

@endsection

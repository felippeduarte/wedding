@extends('layout.layout')
@section('content')
<div class="row row-table row-background">
    <div class="col-xs-12 content">
        <img src="/img/products/{{ $product->image }}">
        <label>{{ $product->name }}</label>
        <span>{{ $product->description }}</span>
    </div>
    <div class="col-xs-12 content">
        <form method="POST" action="/presentes">
            {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="session_id" value="{{ $session_id }}">
            <input type="hidden" name="hash" value="{{ $hash }}">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
            </div>
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
            <div class="form-group">
                <label for="mensagem">Mensagem</label>
                <textarea class="form-control" name="mensagem" id="mensagem" placeholder="Deixe aqui uma mensagem para os noivos" rows="3">
                </textarea>
            </div>
            @if($tipo == 'BOLETO')
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Confirmar e Gerar Boleto</button>
                </div>
            </div>
            @endif
        </form>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#cpf').unmask();
    $('#telefone').unmask();

    $('#cpf').mask('000.000.000-00', {reverse: true});

    var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
          field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

    $('#telefone').mask(SPMaskBehavior, spOptions);

});
</script>

@endsection

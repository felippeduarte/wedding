@extends('layout.layout')
@section('content')
<div class="row row-table row-background row-background-image">
    <div class="col-xs-12 content">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="center-block text-center">
                    <h1 class="time">Passado</h1>
                    <div class="video embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YEX_MirPvNw"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="center-block text-center">
                    <h1 class="time">Presente</h1>
                    <p class="presente">faltam<br/>
                        <span id="presente_meses"></span> meses<br/>
                        <span id="presente_dias"></span> dias<br/>
                        <span id="presente_horas"></span> horas<br/>
                        <span id="presente_minutos"></span> minutos<br/>
                        <span id="presente_segundos"></span> segundos
                    </p>
                    <p class="hidden-xs"><br/><br/></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="center-block text-center">
                    <h1 class="time">Futuro</h1>
                    <div id="videoFuturo">
                        <div class="video embed-responsive embed-responsive-4by3">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/h4-BBsEjXZI"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
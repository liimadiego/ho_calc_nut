@extends('layouts.app')
@section('content')
<div class="page_title_division">
    <h2 class="text-center w-100 montserrat font-weight-bold">Quer saber como oferecer uma incrível<br class="d-none d-md-block" /> experiência Nutella ao seu cliente e obter ótimos<br class="d-none d-md-block" /> resultados para o seu negócio?</h2>
</div>
<h2 class="subtitle text-center w-100 montserrat font-weight-bold mb-0">Para começar, selecione a receita que se<br class="d-none d-md-block" /> encaixa perfeitamente no seu menu.</h2>
<div class="container pt-4">
    <div class="row">
        <div class="col-12">
            <h3 class="title_panificacao montserrat">Panificação</h3>
        </div>
        @foreach($receitas_json as $receita)
        <div class="col-md-4 mb-4">
            <a href="{{ route('calculadora.calculator', $receita->id) }}">
                <div class="card">
                    <div class="square">
                        <div>
                            <img src="{{asset('img/' . $receita->img)}}">
                        </div>
                        <span class="btn_plus">+</span>
                        <h4 class="mt-3 mb-0 ml-4 text-left card_title">{{$receita->nome_venda}}</h4>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        <div class="col-md-4 m-auto">
            <a href="{{ route('calculadora.calculator', $receita->id) }}" class="btn_voltar montserrat">
                Voltar para home
                <span></span>
            </a>
        </div>
    </div>
</div>
@endsection

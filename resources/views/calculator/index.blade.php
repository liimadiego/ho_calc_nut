@extends('layouts.app')
@section('content')
<div class="page_title_division">
    <h2 class="text-center w-100">Você sabe qual a quantidade correta de nutella para sua receita?</h2>
</div>
<div class="container pt-4">
        <div class="row">
            @foreach($receitas_json as $receita)
                <a href="{{ route('calculadora.calculator', $receita->id) }}" class="col-md-6 mb-4">
                    <div class="card">
                        <div class="square">
                            <div>
                                <img src="{{asset('img/' . $receita->img)}}">
                            </div>
                            <h4 class="mt-3 mb-0">{{$receita->nome_venda}}</h4>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')

<div class="page_title_division">
    <h2 class="text-center w-100">Resumo financeiro</h2>
</div>
<div class="pt-4 resumo_case">
    <div style="padding: 0 5rem" class="container-fluid">
        <div class="row">
            <div class="result_table font-weight-bold col-md-6">
                <h5 class="font-weight-bold">
                    Resultado financeiro da receita
                </h5>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Total Nutella® (em gramas)</th>
                            <td>{{number_format($defaultResult['qtd_nutella_ideal'],0)}}g</td>
                        </tr>
                        <tr>
                            <th>CUSTO TOTAL DA RECEITA</th>
                            <td>R${{number_format($defaultResult['custo_total_receita'],2,",",".")}}</td>
                        </tr>
                        <tr>
                            <th>CUSTO POR QUILO DA RECEITA</th>
                            <td>R${{number_format($defaultResult['custo_por_kg'],2,",",".")}}</td>
                        </tr>
                        <tr>
                            <th>RENDIMENTO DA RECEITA (KG)</th>
                            <td>{{$receita_selecionada->dados->rendimento_kg}}kg</td>
                        </tr>
                        <tr>
                            <th>PESO DA PORÇÃO</th>
                            <td>{{$receita_selecionada->dados->peso_porcao_kg}}kg</td>
                        </tr>
                        <tr>
                            <th>Nº DE PORÇÕES</th>
                            <td>{{number_format($defaultResult['qtd_porcoes'],0,)}}</td>
                        </tr>
                        <tr>
                            <th>CUSTOS DA PORÇÃO (CMV)</th>
                            <td>R${{number_format($defaultResult['custo_porcao_cmv'],2,",",".")}}</td>
                        </tr>
                        <tr>
                            <th>CMV META (%)</th>
                            <td>{{number_format($defaultResult['cmv_meta'] * 100, 2)}}%</td>
                        </tr>
                        <tr>
                            <th>PREÇO DE VENDA MÍNIMO</th>
                            <td>R${{number_format($defaultResult['preco_minimo_venda'],2,",",".")}}</td>
                        </tr>
                        <tr>
                            <th>PREÇO FINAL DEFINIDO</th>
                            <td>R${{number_format($receita_selecionada->dados->preco_final,2,",",".")}}</td>
                        </tr>
                        <tr>
                            <th>CMV REAL (%)</th>
                            <td>{{number_format($defaultResult['cmv_real'] * 100, 2)}}%</td>
                        </tr>
                        <tr>
                            <th>MARGEM DE CONTRIBUIÇÃO (R$)</th>
                            <td>R${{number_format($defaultResult['margem_contribuicao_real'],2,",",".")}}</td>
                        </tr>
                        <tr>
                            <th>MARGEM DE CONTRIBUIÇÃO (%)</th>
                            <td>{{number_format($defaultResult['margem_contribuicao_porcentagem'] * 100,2)}}%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="result_table font-weight-bold col-md-6">
                <h4 class="font-weight-bold">
                    Resumo
                </h4>
                <p class="obj_text">Se o seu objetivo
                    <br class="d-none d-md-block">
                    é atingir um
                    <br class="d-none d-md-block">
                    <span class="max_text">CMV máximo de 30%</span>
                    <br class="d-none d-md-block">
                    o preço de venda recomendado por porção deve ser de:
                    <br class="d-none d-md-block">
                    <span class="value_text">R$ X</span>
                </p>
                <div class="text-center">
                    <img src="{{asset('img/box_nutella.png')}}" alt="nutella" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="mt-4 row">
            <div class="col-md-12">
                <p class="obj_text font-weight-bold">
                    <span class="max_text">Você sabia?</span>
                    <br class="d-none d-md-block">
                    Você sabia? Que o consumidor brasileiro está disposto a pagar pelo menos
                    <br class="d-none d-md-block">
                    <span class="value_text">R$ 2,00</span>
                    <b class="text-black">a mais</b> por uma receita preparada com Nutella?
                    <br class="d-none d-md-block">
                </p>
            </div>
            <div class="col-12 w-50 mt-5">
                <h2 class="titulo_result">
                    Veja na prática como isso funciona
                </h2>
            </div>
            <div class="col-md-6 mt-3">
                <span class="tag_result">Receita SEM Nutella</span>
                <img src="{{asset('img/pao.png')}}" alt="pao" class="img-fluid">
                <div class="price">
                    <div class="price2">
                        R$<br class="d-none d-md-block">14,70
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <span class="tag_result2">
                    <span class="text_n">n</span>
                    Receita COM Nutella
                </span>
                <span class="tag_result3">PORÇÃO DE XXg</span>
                <img src="{{asset('img/nutella.png')}}" alt="nutella" class="img-fluid" />
                <div class="text-left price_nutella">
                    <div class="price2">
                        R$<br class="d-none d-md-block">xx,xx
                    </div>
                    <img src="{{asset('img/icon6.png')}}" alt="icon" class="img-fluid" />
                </div>
                <br>
                <small><b>*Preço médio de venda em São Paulo - junho 23</b></small>
            </div>
        </div>
        <div class="text-center mt-4">
            <a class="btn btn_primary font-weight-bold px-2 pl-4" href="{{route('calculadora.index')}}">Ver mais receitas <img src="http://local.nutella/img/icon4.png" alt="icon" class="img_btn"></a>
        </div>
    </div>
</div>

@endsection

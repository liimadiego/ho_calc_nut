@extends('layouts.app')

@section('content')

<div class="page_title_division">
    <h2 class="text-center w-100 font_32">Resumo financeiro</h2>
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
                            <td class="p-0">
                                <div style="border: 2px solid #E33530;width:100%; height: 50px; padding-right: 12px; border-top-right-radius: 20px;" class="d-flex justify-content-end align-items-center">
                                    {{$defaultResult['qtd_nutella_ideal']}}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Custo total da receita</th>
                            <td>R${{number_format($defaultResult['custo_total_receita'],2,",",".")}}</td>
                        </tr>
                        <tr>
                            <th>Custo por quilo da receita</th>
                            <td>R${{number_format($defaultResult['custo_por_kg'],2,",",".")}}</td>
                        </tr>
                        <tr>
                            <th>Rendimento da receita (KG)</th>
                            <td>{{$receita_selecionada->dados->rendimento_kg}}kg</td>
                        </tr>
                        <tr>
                            <th>Peso da porção</th>
                            <td>{{$receita_selecionada->dados->peso_porcao_kg}}kg</td>
                        </tr>
                        <tr>
                            <th>Nº de porções</th>
                            <td>{{number_format($defaultResult['qtd_porcoes'],0,)}}</td>
                        </tr>
                        <tr>
                            <th>Custos da porção (CMV)</th>
                            <td>R${{number_format($defaultResult['custo_porcao_cmv'],2,",",".")}}</td>
                        </tr>
                        <tr>
                            <th>CMV Meta (%)</th>
                            <td>{{number_format($defaultResult['cmv_meta'] * 100, 0)}}%</td>
                        </tr>
                        <tr>
                            <th>Preço de venda mínimo</th>
                            <td>R${{number_format($defaultResult['preco_minimo_venda'],2,",",".")}}</td>
                        </tr>
                        <!-- <tr>
                            <th>PREÇO FINAL DEFINIDO</th>
                            <td>R${{number_format($defaultResult['preco_minimo_venda'],2,",",".")}}</td>
                        </tr> -->
                        <tr>
                            <th>CMV Real (%)</th>
                            <td>{{number_format($defaultResult['cmv_real'] * 100, 0)}}%</td>
                        </tr>
                        <tr>
                            <th>Margem de contribuição (R$)</th>
                            <td>R${{number_format($defaultResult['margem_contribuicao_real'],2,",",".")}}</td>
                        </tr>
                        <tr style="border-bottom: 20px solid #fff;">
                            <th>Margem de contribuição (%)</th>
                            <td>{{number_format($defaultResult['margem_contribuicao_porcentagem'] * 100,0)}}%</td>
                        </tr>
                        <tr style="border-top: 20px solid #fff;">
                            <th>Markup (%)</th>
                            <td>{{number_format($defaultResult['markup'] * 100,0)}}%</td>
                        </tr>
                        <!-- <tr>
                            <th>Margem bruta</th>
                            <td>X</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>X</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="result_table font-weight-bold col-md-6">
                <h4 class="">
                    RESUMO
                </h4>
                <p class="obj_text">Se o seu objetivo é atingir um
                    <br class="d-none d-md-block">
                    <span class="max_text">CMV (Custo da Mercadoria Vendida)
                    <br class="d-none d-md-block"> máximo de 30%</span>
                    <br class="d-none d-md-block">
                    o preço de venda recomendado por porção deve ser de:
                    <br class="d-none d-md-block">
                    <span class="value_text">R${{number_format($defaultResult['preco_minimo_venda'],2,",",".")}}</span>
                </p>
                <div class="text-center">
                    <img src="{{asset('/img/' . $receita_selecionada->img)}}" alt="nutella" class="img-fluid img_food">
                </div>
            </div>
        </div>
        <div class="mt-4 row">
            <div class="col-md-12">
                <p class="obj_text font-weight-normal">
                    <span class="max_text" style="margin-bottom:8px;display:inline-block">Você sabia?</span>
                    <br class="d-none d-md-block">
                    Que o consumidor brasileiro está disposto a pagar pelo menos
                    <br class="d-none d-md-block">
                    <span class="value_text" style="margin-top:6px;display:inline-block">R$ 2,00</span>
                    <b class="text-black">a mais</b> por uma receita preparada com Nutella?
                    <br class="d-none d-md-block">
                    <span style="margin-top:6px;display:inline-block">
                        Nesse caso, esta porção poderia ser vendida por <span class="value_text">R$ {{number_format($defaultResult['preco_minimo_venda'] + 2,2,",",".")}}</span>
                    </span>
                </p>
            </div>

            <!-- ===== SITUACIONAL ===== -->
            @if(!!$defaultResult['dados_sem_nutella'])
            <div class="row">
                <div class="col-12 w-50 mt-5">
                    <h2 class="titulo_result">
                        Veja na prática como isso funciona
                    </h2>
                </div>
                <div class="col-md-6 mt-3">
                    <span class="tag_result">Receita SEM Nutella</span>
                    <img src="{{asset('img/pao.png')}}" alt="pao" class="img-fluid d-block">
                    <div class="price">
                        <div class="price2">
                            R$<br class="d-none d-md-block">{{number_format($defaultResult['preco_sem_nutella'],2,",",".")}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <span class="tag_result2">
                        <span class="text_n">n</span>
                        Receita COM Nutella
                    </span>
                    <span class="tag_result3">PORÇÃO DE {{$receita_selecionada->dados->peso_porcao_kg * 1000}}g</span>
                    <img src="{{asset('img/nutella.png')}}" alt="nutella" class="img-fluid" />
                    <div class="text-left price_nutella">
                        <div class="price2">
                            R$<br class="d-none d-md-block">{{number_format($defaultResult['preco_minimo_venda'] + 2,2,",",".")}}
                        </div>
                        <img src="{{asset('img/icon6.png')}}" alt="icon" class="img-fluid" />
                    </div>
                    <br>
                    <small><b>*Preço médio de venda em São Paulo - junho 23</b></small>
                </div>
            </div>
            @endif
            <!-- ===== SITUACIONAL ===== -->
        </div>
        <div class="text-center mt-4">
            <a class="btn btn_primary font-weight-bold px-2 pl-4" href="{{route('calculadora.index')}}">Ver mais receitas <img src="{{asset('img/icon4.png')}}" alt="icon" class="img_btn"></a>
        </div>
    </div>
</div>

@endsection

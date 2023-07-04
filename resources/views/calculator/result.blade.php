@extends('layouts.app')

@section('content')

<div class="page_title_division">
    <h2 class="text-center w-100">Saiba qual quantidade ideal de Nutella para sua receita</h2>
</div>
<div class="pt-4 resumo_case">
    <div style="padding: 0 5rem">
        <div>
            <h5>Resumo</h5>
            <hr>
        </div>
        <div class="d-flex justify-content-between">
            <div class="result_table">
                Quantidade de Nutella utilizada
                <hr>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Recheio Nutella</th>
                            <td>{{number_format($dados['qtd_nutella'],0,",",".")}}g</td>
                        </tr>
                        <tr>
                            <th>CUSTO TOTAL DA RECEITA</th>
                            <td>R${{number_format($userResult['custo_total_receita'],2,",",".")}}</td>
                        </tr>
                        <tr>
                            <th>CUSTO POR QUILO DA RECEITA</th>
                            <td>R${{number_format($userResult['custo_por_kg'],2,",",".")}}</td>
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
                            <td>{{number_format($userResult['qtd_porcoes'],0,",",".")}}</td>
                        </tr>
                        <tr>
                            <th>CUSTOS DA PORÇÃO (CMV)</th>
                            <td>R${{number_format($userResult['custo_porcao_cmv'],2,",",".")}}</td>
                        </tr>
                        <tr>
                            <th>CMV META (%)</th>
                            <td>{{number_format($userResult['cmv_meta'] * 100, 2)}}%</td>
                        </tr>
                        <tr>
                            <th>PREÇO DE VENDA MÍNIMO</th>
                            <td>R${{number_format($userResult['preco_minimo_venda'],2,",",".")}}</td>
                        </tr>
                        <tr>
                            <th>PREÇO FINAL DEFINIDO</th>
                            <td>R${{number_format($receita_selecionada->dados->preco_final,2,",",".")}}</td>
                        </tr>
                        <tr>
                            <th>CMV REAL (%)</th>
                            <td>{{number_format($userResult['cmv_real'] * 100, 2)}}%</td>
                        </tr>
                        <tr>
                            <th>MARGEM DE CONTRIBUIÇÃO (R$)</th>
                            <td>R${{number_format($userResult['margem_contribuicao_real'],2,",",".")}}</td>
                        </tr>
                        <tr>
                            <th>MARGEM DE CONTRIBUIÇÃO (%)</th>
                            <td>{{number_format($userResult['margem_contribuicao_porcentagem'] * 100,2)}}%</td>
                        </tr>
                    </tbody>
                </table>
            </div><div class="result_table">
                Quantidade de Nutella Ideal
                <hr>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Recheio Nutella</th>
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
        </div> 
        <div class="mt-4">
            <h5>Resumo Resultado</h5>
            <hr>
            <div>
                {{$texto_ideal}} 
            </div>
            <div class="d-flex justify-content-between mt-3">
                <img style="width:49%" src="{{asset('img/receita (5).jpg')}}">
                <img style="width:49%" src="{{asset('img/receita (5).jpg')}}">
            </div>
            <div class="mt-3">
                <h5>18% pagaria até 5 reais a mais</h5>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam, est sit amet ullamcorper bibendum, sem elit accumsan tortor, eu congue nulla leo ac quam.
            </div>
        </div> 
        <div class="text-center mt-4">
            <a class="btn btn-danger" href="{{route('calculadora.index')}}">Ver mais receitas</a>
        </div>
    </div>
</div>

@endsection
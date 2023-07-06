@extends('layouts.app')

@section('content')
    @if(!is_null($receita_selecionada))
        <div class="page_title_division">
            <h2 class="text-center w-100">Quanto de nutella você usaria em sua receita?</h2>
        </div>
        <form method="GET" action="{{ route('calculadora.calculate', $receita_selecionada->id) }}" accept-charset="UTF-8" id="calcularForm" data-gtm-form-interact-id="0" class="container" style="min-height:80vh;display:flex;flex-direction:column;justify-content: center;">
            @csrf
            <div class="monte-sua-receita">
                <h1 class="titulo text-center">{{$receita_selecionada->nome_venda}}</h1>
                <table class="table table-striped">
                    <!-- d-flex TITULOS -->
                    <thead class="titulos">
                        <tr>
                            <th>
                                Ingredientes
                            </th>
                            <th>
                                Peso Líquido <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="Quantidade do pacote/unidade.<br>Esta relacionado com o campo<br><b>Valor do Pacote <i class='fa fa-arrow-right'></i></b>"></i>
                            </th>
                            <th>
                                Unitário <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="Quantidade do pacote/unidade.<br>Esta relacionado com o campo<br><b>Valor do Pacote <i class='fa fa-arrow-right'></i></b>"></i>
                            </th>
                            <th>
                                Bruto <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="Quantidade do pacote/unidade.<br>Esta relacionado com o campo<br><b>Valor do Pacote <i class='fa fa-arrow-right'></i></b>"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($receita_selecionada->receita as $row)
                            <tr class="px-2 py-2">
                                <td><h6 class="m-0">{{ $row->tipo }}</h6></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach($row->ingredientes as $ingredientes)
                                <tr>
                                    <td class="pl-5">{{$ingredientes[0]}}</td>
                                    <td>{{$ingredientes[1]}}</td>
                                    <td>R${{str_replace('.', ',', $ingredientes[2])}}</td>
                                    <td>R${{str_replace('.', ',', $ingredientes[3])}}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                <div class="case_error"></div>
                            
            </div>
            <!-- -->
            <div class="calcular-preco">
                <div class="row w-100" style="">
                    <div class="col-md-12 d-flex justify-content-center">
                        <button class="btn btn-dark" id="btnCalcular">Calcular</button>
                    </div>
                </div>

            </div>
        </form>
        <script>
            // Seleciona o campo de entrada
            // const qtd_nutella = document.getElementById('qtd_nutella');
            // const bruto_nutella = document.getElementById('bruto_nutella');
            // const valor_total_nutella = document.getElementById('valor_total_nutella').value;
            // const input_valor_bruto_nutella = document.getElementById('input_valor_bruto_nutella');

            // qtd_nutella.addEventListener('input', function(event) {
            //     const valorDigitado = event.target.value;
            //     let resultado_conta = parseFloat((valorDigitado / 1000) * valor_total_nutella);
            //     bruto_nutella.innerHTML = `R$${String(resultado_conta.toFixed(2)).replace('.', ',')}`
            //     input_valor_bruto_nutella.value = resultado_conta
            // });
        </script>
    @else
        <div style="display:flex;justify-content:center;align-items:center;height:80vh;width:100%">
            <h2 class="display-4">Receita não encontrada</h2>
        </div>
    @endif
@endsection
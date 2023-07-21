@extends('layouts.app')

@section('content')
@if(!is_null($receita_selecionada))
<div class="page_title_division">
    <h2 class="text-center w-100 montserrat font-weight-bold">Veja os detalhes da receita<br class="d-none d-md-block">selecionada.</h2>
</div>
<form method="GET" action="{{ route('calculadora.calculate', $receita_selecionada->id) }}" accept-charset="UTF-8" id="calcularForm" data-gtm-form-interact-id="0" class="container" style="min-height:80vh;display:flex;flex-direction:column;justify-content: center;">
    @csrf
    <div class="monte-sua-receita">
        <h1 class="titulo text-left icon_title">{{$receita_selecionada->nome_venda}}<span class="r">®</span></h1>
        <table class="table table-striped">
            <!-- d-flex TITULOS -->
            <thead class="titulos">
                <tr class="linha_custo">
                    <th colspan="2" class="col_trans"></th>
                    <th colspan="2" class="col_custo">
                        <h2>Custo do ingrediente R$</h2>
                        <p>*Custos estimados, base cidade de São Paulo, junho 2023.</p>
                    </th>
                </tr>
                <tr>
                    <th>
                        Ingredientes
                    </th>
                    <th>
                        Peso líquido (g)
                    </th>
                    <th>
                        Por quilo
                    </th>
                    <th>
                        Receita Total
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($receita_selecionada->receita as $row)
                <tr class="px-2 py-2">
                    <td class="calc_base" colspan="4">
                        <h6 class="m-0">{{ $row->tipo }}</h6>
                    </td>
                </tr>
                @foreach($row->ingredientes as $ingredientes)
                <tr>
                    <td class="pl-5">{{$ingredientes[0]}}</td>
                    <td>{{$ingredientes[1]}}</td>
                    <td>R${{number_format($ingredientes[2],2,",",".")}}</td>
                    <td>R${{number_format($ingredientes[3],2,",",".")}}</td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
        <div class="case_error"></div>

    </div>
    <!-- -->
    <div class="calcular-preco" style="background: url('{{asset('/img/' . $receita_selecionada->img)}}')">
        <div class="row w-100">
            <div class="col-md-12 d-flex justify-content-center align-items-end">
                <button class="btn btn-dark btn_primary font-weight-bold px-5" id="btnCalcular">
                    Ir para a análise financeira
                    <img src="{{asset('/img/icon3.png')}}" alt="icon" class="img_btn">
                </button>
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

<script>
    let arrayNutella = document.querySelectorAll("#calcularForm > div.monte-sua-receita tr:nth-child(n) td");

    arrayNutella.forEach((e, i) => {
        if (e.textContent === "Nutella") {
            e.style.background = '#E33530';
            e.textContent = "";
            let imgLogo = document.createElement("img");
            imgLogo.src = "https://i.ibb.co/SXmvrgz/logo-nutella.png";
            imgLogo.style.width = "100px"
            e.appendChild(imgLogo);

            arrayNutella[i + 1].style.background = "white";
            arrayNutella[i + 1].style.color = "#1a171b";
            arrayNutella[i + 2].style.background = "#1a171b";
            arrayNutella[i + 3].style.background = "#1a171b";
        }
    })
</script>
@else
<div style="display:flex;justify-content:center;align-items:center;height:80vh;width:100%">
    <h2 class="display-4">Receita não encontrada</h2>
</div>
@endif
@endsection

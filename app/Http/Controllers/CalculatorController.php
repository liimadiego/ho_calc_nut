<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jsonString = file_get_contents(public_path('json/receitas.json'));
        $receitas_json = json_decode($jsonString);

        return view('calculator.index', compact('receitas_json'));
    }
    
    /**
     * Display a listing of the resource.
     */
    public function calculator($receita_id)
    {
        $jsonString = file_get_contents(public_path('json/receitas.json'));
        $receitas_json = json_decode($jsonString);

        $receita_selecionada = null;

        foreach($receitas_json as $receita) {
            if ($receita->id == $receita_id) {
                $receita_selecionada = $receita;
                break;
            }
        }

        return view('calculator.calculator', compact('receita_selecionada'));
        
    }

    public function calculate(Request $request, $receita_id)
    {
        $dados = $request->all();

        $jsonString = file_get_contents(public_path('json/receitas.json'));
        $receitas_json = json_decode($jsonString);
        $receita_selecionada = null;
        
        foreach($receitas_json as $receita) {
            if ($receita->id == $receita_id) {
                $receita_selecionada = $receita;
                break;
            }
        }

        // $userResult = $this->getResult($receita_selecionada, $receita_id, $dados);
        $defaultResult = $this->getResult($receita_selecionada, $receita_id, $dados);

        // if($defaultResult['qtd_nutella_ideal'] < $dados['qtd_nutella']){
        //     $texto_ideal = $receita_selecionada->textos->usuario_usando_demais;
        // }elseif($defaultResult['qtd_nutella_ideal'] == $dados['qtd_nutella']){
        //     $texto_ideal = $receita_selecionada->textos->usuario_na_margem;
        // }else{
        //     $texto_ideal = $receita_selecionada->textos->usuario_usando_menos;
        // }

        // dd(compact('userResult', 'defaultResult', 'dados', 'receita_selecionada'));

        return view('calculator.result', compact('defaultResult', 'dados', 'receita_selecionada'));
        
    }

    /**
     * Display a listing of the resource.
     */
    public function getResult($receita_selecionada, $receita_id, $dados)
    {
        $calc = 0;
        $qtd_nutella_ideal = 0;

        foreach($receita_selecionada->receita as $rec){
            foreach($rec->ingredientes as $ing){
                
                if(isset($ing[4])){
                    $qtd_nutella_ideal = $ing[1];
                }
                // if(!$userResult && isset($ing[5])){
                //     $calc += $ing[5];
                //     $qtd_nutella_ideal = $ing[4];
                // }else{
                    $calc += $ing[3];
                // }
                
            }
        }

        // if($userResult){
            // $calc += $dados['input_valor_bruto_nutella'];
        // }

        $custo_por_kg = $calc / $receita_selecionada->dados->rendimento_kg;
        $qtd_porcoes = $receita_selecionada->dados->rendimento_kg / $receita_selecionada->dados->peso_porcao_kg;
        $custo_porcao_cmv = $calc / $qtd_porcoes;
        $cmv_meta = $receita_selecionada->dados->cmv_meta_porcentagem;
        $preco_minimo_venda = $custo_porcao_cmv / $cmv_meta;
        $cmv_real = $custo_porcao_cmv / $receita_selecionada->dados->preco_final;
        $margem_contribuicao_porcentagem = 1 - $cmv_real;
        $margem_contribuicao_real = $receita_selecionada->dados->preco_final - $custo_porcao_cmv;
        $custo_total_receita = $calc;

        return compact('custo_total_receita','custo_por_kg', 'qtd_porcoes', 'custo_porcao_cmv', 'cmv_meta', 'preco_minimo_venda', 'cmv_real', 'margem_contribuicao_porcentagem', 'margem_contribuicao_real', 'qtd_nutella_ideal');
    }

}

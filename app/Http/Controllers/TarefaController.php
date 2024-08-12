<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\ModelTarefa;
use App\Http\Requests\TarefaRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;

class TarefaController extends Controller {

    public function index() {
        $tarefa = ModelTarefa::all();
        return view('index', compact('tarefa'));
    }

    public function create() {
        return view('cadastrar');
    }

//
    public function store(TarefaRequest $request) {

        $arrayTarefa = array(
            'tarefa_titulo' => $request->tarefa_titulo,
            'tarefa_descricao' => $request->tarefa_descricao,
            'tarefa_local' => $request->tarefa_local,
            'tarefa_num_participantes' => $request->tarefa_num_participantes
        );

//         dd($arrayTarefa);   
        $cad = ModelTarefa::create($arrayTarefa);

        if ($cad) {
            return redirect('tarefa');
        }
    }

    public function show($id) {
//        dd("passa na controller");
        $tarefa = ModelTarefa::find($id);
        return view('dados', compact('tarefa'));
    }

//
    public function edit($id) {
        $tarefa = ModelTarefa::find($id);
//        dd($tarefa);
        return view('cadastrar', compact('tarefa'));
    }

    public function update(TarefaRequest $request, $id) {

        $arrayTarefa = array(
            'tarefa_titulo' => $request->tarefa_titulo,
            'tarefa_descricao' => $request->tarefa_descricao,
            'tarefa_local' => $request->tarefa_local,
            'tarefa_num_participantes' => $request->tarefa_num_participantes
        );

        $where = array('id' => $id);

        ModelTarefa::where($where)->update($arrayTarefa);
        return redirect('tarefa');
    }

//
    public function destroy($id) {
        $del = ModelTarefa::destroy($id);
        return redirect('tarefa');
    }

    public function gerarPDF($id) {

        $modelTarefa = ModelTarefa::find($id);
        $tarefa = array(
            'id' => $modelTarefa->id,
            'tarefa_titulo' => $modelTarefa->tarefa_titulo,
            'tarefa_descricao' => $modelTarefa->tarefa_descricao,
            'tarefa_local' => $modelTarefa->tarefa_local,
            'tarefa_num_participantes' => $modelTarefa->tarefa_num_participantes,
            'created_at' => $modelTarefa->created_at
        );
        $tarefa = (object) $tarefa;
        $pdf = Pdf::loadView('dados', compact('tarefa'));
        $directory = public_path('pdf');
        $filePath = $directory . '/relatorio_tarefa_' . $tarefa->id . '.pdf';
        $pdf->save($filePath);
        return $pdf->download('relatorio.pdf');
    }

    public function search(Request $request) {
        $id = $request->input('id');
        $tarefa = "";
        $tarefa_id = "";
        if ($id) {
            $tarefa_id = ModelTarefa::find($id);
            if (!$tarefa_id) {
                // Redireciona de volta para a página de busca com uma mensagem de erro
                return redirect()->route('index')->with('error', 'Tarefa não encontrada.');
            }
        } else {
            $tarefa = ModelTarefa::all();
        }
        // Passa a variável de tarefa para a view
        return view('index', compact(($tarefa)? 'tarefa': "tarefa_id"));
    }
}

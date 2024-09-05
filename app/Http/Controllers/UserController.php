<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonalRecordRequest;
use App\Models\ModelPersonalRecord;
use App\Models\ModelUser;
use App\Models\ModelMovement;

//use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller {

    public function index() {

        $records = ModelPersonalRecord::getRankedPersonalRecords();
//        dd($records);
        return view('index', compact('records'));
    }

    public function create() {
        return view('cadastrar');
    }

//
    public function cadastrar(PersonalRecordRequest $request) {
        $lastUserId = ModelUser::max('id'); 
        $newUserId = $lastUserId ? $lastUserId + 1 : 1; 

        $arrayUser = array(
            'id' => $newUserId, 
            'name' => $request->user_name
        );

        $cad_user = ModelUser::create($arrayUser);
        $cad_user_id = $cad_user->id;

        $lastMovementId = ModelMovement::max('id'); 
        $newMovementId = $lastMovementId ? $lastMovementId + 1 : 1; 

        $arrayMovement = array(
            'id' => $newMovementId, 
            'name' => $request->movement_name
        );

        $cad_movement = ModelMovement::create($arrayMovement);
        $cad_movement_id = $cad_movement->id;

        if ($cad_user_id && $cad_movement_id) {
            $lastPersonalRecord = ModelPersonalRecord::max('id');
            $newPersonalRecord = $lastPersonalRecord ? $lastPersonalRecord + 1 : 1; 
            // Criando o registro pessoal
            $arrayPersonalRecord = array(
                'id' => $newPersonalRecord,
                'user_id' => $cad_user_id,
                'movement_id' => $cad_movement_id,
                'value' => $request->score,
                'date' => date("Y-m-d H:i:s")
            );
            $cad = ModelPersonalRecord::create($arrayPersonalRecord);

            
            if ($cad) {
                return redirect('index')->with('success', 'Cadastro realizado com sucesso!');
            }
        }else{
            return redirect('index')->with('error', 'Falha ao cadastrar.');
        }
    }

    public function search(Request $request) {
        $name_user = $request->input('name_user');
        $records = "";
        if ($name_user) {
            $records = ModelPersonalRecord::getRankedPersonalRecordsByName($name_user);
            if ($records->isEmpty()) {
                return redirect()->route('index')->with('error', 'Usuário Não Encontrado');
            }
        } else {
            $records = ModelPersonalRecord::getRankedPersonalRecords();
        }
        return view('index', compact('records'));
    }
    
    public function destroy($id) {
        $del = ModelPersonalRecord::destroy($id);
        if($del){
            return redirect('index')->with('success', '## Usuário Excluído com sucesso!');
        }else{
            return redirect()->route('index')->with('error', '## Usuário Não Excluído, contate o desenvolvedor');
        }
    }

}

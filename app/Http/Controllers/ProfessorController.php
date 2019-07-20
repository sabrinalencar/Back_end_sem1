<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
class ProfessorController extends Controller
{
    public function createProfessor(Request $request){
        /**cria um registro da instancia professor */
        $professor = new Professor;
        $professor->nome = $request->nome;
        $professor->email = $request->email;
        $professor->tel = $request->tel;
        $professor->matricula = $request->matricula;
        $professor->titulacao = $request->titulacao;
        $professor->save();

    }
    public function listProfessor(){
        /** lista todos os registros de professor*/
        return Professor::all();
    }
    public function showProfessor($id){
        /** lista somente um registro, a partir do id */
        $professor = Professor::findOrFail($id);
        return $professor;
        if($professor){
            return response()->success($professor);
        } else{
            $data = "professor não encontrado";
            return response()->error($data, 400);
        }
    }
    public function updateProfessor(Request $request, $id){
        /** Permite modificar no bd atraves do id */
        $professor = Professor::findOrFail($id);

        if($request->nome)
            $professor->nome = $request->nome;
        if($request->email)
            $professor->email = $request->email;
        if($request->tel)
            $professor->tel = $request->tel;
        if($request->matricula)
            $professor->matricula = $request->matricula;
        if($request->titulacao)
            $professor->titulacao = $request->titulacao;
        $professor->save();
        
        return response()->json([$professor]);
    }
    public function deleteProfessor($id){
        /** Deleta um registro pelo id */

        Professor::destroy($id);
        return response()->json(['professor deletado']);
    }
}

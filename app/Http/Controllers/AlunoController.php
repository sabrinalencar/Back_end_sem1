<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;

class AlunoController extends Controller
{
    public function createAluno(Request $request){
        /**cria um registro da instancia aluno */
        $aluno = new Aluno;
        $aluno->nome = $request->nome;
        $aluno->email = $request->email;
        $aluno->tel = $request->tel;
        $aluno->matricula = $request->matricula;
        $aluno->professor_id = $request->professor_id;
        $aluno->save();

    }
    public function listAluno(){
        /** lista todos os registros de aluno*/
        return Aluno::all();
    }
    public function showAluno($id){
        /** lista somente um registro, a partir do id */
        $aluno = Aluno::findOrFail($id);
        if($aluno){
            return response()->success($aluno);
        } else{
            $data = "Aluno não encontrado";
            return response()->error($data, 400);
        }
    }
    public function updateAluno(Request $request, $id){
        /** Permite modificar no bd atraves do id */
        $aluno = Aluno::findOrFail($id);

        if($request->nome)
            $aluno->nome = $request->nome;
        if($request->email)
            $aluno->email = $request->email;
        if($request->tel)
            $aluno->tel = $request->tel;
        if($request->matricula)
            $aluno->matricula = $request->matricula;
        if($request->professor_id)
            $aluno->professor_id = $request->professor_id;
        $aluno->save();
        
        return response()->json([$aluno]);
    }
    public function deleteAluno($id){
        /** Deleta um registro pelo id */

        Aluno::destroy($id);
        return response()->json(['Aluno deletado']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB; //query build
use App\Tarefa; //model

class TarefasController extends Controller
{
    public function list(){

      //  $list = DB::select('SELECT * FROM tarefas');
        $list = Tarefa::All();
      //  $list = DB::select('SELECT * FROM tarefas where resolvido = 1');
      //  $list = DB::select('SELECT * FROM tarefas where resolvido = ?', [1]);
     //   $list = DB::select('SELECT * FROM tarefas where resolvido = :status', ['status'=>0]);
       // print_r($list);
        return view('tarefas.list',['list'=> $list]);

     //   return view('tarefas.list',compact('list'));
    }
    public function add() {
        return view('tarefas.add');
    }
    public function addAction(Request $request){
       // if($request->filled('titulo')) {
            $request->validate([
                'titulo' => ['required', 'string']
            ]);
            $titulo = $request->input('titulo');
            $t = new Tarefa;
            $t->titulo = $titulo;
            $t->save();
          //  DB::insert('INSERT INTO tarefas (titulo) VALUES (:titulo)',[
          //      'titulo' => $titulo
          //      ]);
            return redirect()->route('tarefas.list');
       // } else {
         //   return redirect()->route('tarefas.add')->with('warning', "Você não preencheu o campo!");
       // }
    }
    public function edit($id){
      //  $data = DB::select('SELECT * FROM tarefas where id = :id',
      //  ['id'=> $id]);
      //  print_r($data[0]);
        $data = Tarefa::find($id);
      //  if(count($data) > 0){
        if($data){
          //  return view('tarefas.edit', ['data' => $data[0]]);
            return view('tarefas.edit', ['data' => $data]);
        } else {
            return redirect()->route('tarefas.list');
        }
    }
    public function editAction(Request $request, $id) {
       // if ($request->filled('titulo')) {
            $request->validate([
               'titulo' => ['required', 'string']
            ]);
            $titulo = $request->input('titulo');
            //ALTERAÇÃO EM MASSA
            Tarefa::find($id)->update(['titulo'=>$titulo]);

           // $data = DB::update('UPDATE tarefas set titulo = :titulo where id = :id', [
             //   'titulo' => $titulo,
               //     'id' => $id
              //  ]);
        //SOLUÇÃO 1
       // $t = Tarefa::find($id);
       // $t->titulo = $titulo;
       // $t->save();
        //SOLUÇÃO 2
       // Tarefa::find($id)->update(['titulo'=>$titulo]);

        return redirect()->route('tarefas.list');
   // } else {
     //   return redirect()->route('tarefas.edit', ['id'=> $id])->with('warning', 'Você não preencheu o campo');
//}
}
    public function del($id){
      //  DB::delete('delete from tarefas where id = :id', [
        //    'id'=> $id
       // ]);
        $t = Tarefa::find($id);
        $t->delete();
        return redirect()->route('tarefas.list');
    }
    public function done($id)
    {
        //  DB::update('update tarefas set resolvido = 1 - resolvido where id = :id',[
        //    'id' => $id
        // ]);
        $t = Tarefa::find($id);
        if($t){
        $t->resolvido = 1 - $t->resolvido;
        $t->save();
        }
        return redirect()->route('tarefas.list');
    }
}

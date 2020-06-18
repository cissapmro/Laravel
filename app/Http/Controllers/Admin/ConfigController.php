<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ConfigController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request) {
      // $user = Auth::user();
        $user = $request->user();

        $nome  = $user->name;
       // $nome = 'Bonieky';
        $idade = '90';
        $cidade = $request->input('cidade');

        $lista = [
            ['ingrediente'=> 'ovo', 'qt'=> '2'],
            ['ingrediente'=> 'farinha', 'qt'=> '3'],
            ['ingrediente'=> 'manteiga', 'qt'=> '1'],
            ['ingrediente'=> 'leite', 'qt'=> '4']
        ];
        $dados = [
            'nome'=> $nome,
            'idade'=> $idade,
            'cidade'=> $cidade,
            'lista'=> $lista,
            'showform'=> Gate::allows('see-form') //permissão
        ];
       // print_r($dados);
        return view('admin.config', $dados);

       // return view('config');
    }
    public function info(){
        echo "Informações";
    }
    public function permissoes(){
        echo "Permissões";
    }
}

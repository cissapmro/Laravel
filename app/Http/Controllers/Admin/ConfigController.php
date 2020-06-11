<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request) {

        $nome = 'Bonieky';
        $idade = '90';
        $cidade = $request->input('cidade');

        $lista = [
            ['ingrediente'=> 'ovo', 'qt'=> '2'],
            ['ingrediente'=> 'farinha', 'qt'=> '3'],
            ['ingrediente'=> 'manteiga', 'qt'=> '1'],
            ['ingrediente'=> 'leite', 'qt'=> '4']
        ];
        $dados = [
            'nome'=> 'Renan',
            'idade'=> '20',
            'cidade'=> $cidade,
            'lista'=> $lista
        ];
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

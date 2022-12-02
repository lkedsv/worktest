<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;

class ClienteController extends Controller
{

    public function create (Request $request){
        return view('insereclientes');
    }
    
    public function createCliente (Request $request){
        $new_cliente = [
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'categoria' => $request->categoria,
            'cep' => $request->cpf,
            'rua' => $request->rua,
            'bairro' => $request->bairro,
            'uf' => $request->uf,
            'complemento' => $request->complemento,
            'telefone' => $request->telefone,
        ];

        //Eloquent
        $cliente = new Cliente($new_cliente);
        $cliente->save();
        //dd($cliente);
        //dd = "Dump and Die"
        $Cliente = Cliente::orderBy('created_at', 'asc')->get();

        return view('listaclientes', ['Cliente'=>$Cliente]);
    }
    

    public function read(Request $r){
        $cliente =  new Cliente();
        $cliente = $cliente->find($r->id);
        return view('atualizaclientes',  ['Cliente'=>$cliente]);
        
        //return $cliente;
        //dd($cliente);
    }

    public function all(Request $r){
        $clientes = Cliente::all();
        return $clientes;
    }

    /*
    public function update(Request $r){
        $cliente = Cliente::find($r->id);
        //$cliente = Cliente::where('id','>',0)->update(['cep'=>'96640000']);
        $cliente->nome = 'alterado';
        $cliente->save();
        return $cliente;
    }*/

    public function update(Request $r, $id){
        $cliente = Cliente::find($id);
    
            $cliente->nome = $r->nome;
            $cliente->cpf = $r->cpf;
            $cliente->categoria = $r->categoria;
            $cliente->cep = $r->cep;
            $cliente->rua = $r->rua;
            $cliente->bairro = $r->bairro;
            $cliente->uf = $r->uf;
            $cliente->complemento = $r->complemento;
            $cliente->telefone = $r->telefone;
    

        //Eloquent
        $cliente->save();

        $Cliente = Cliente::orderBy('created_at', 'asc')->get();

        return view('listaclientes', ['Cliente'=>$Cliente]);

        //return $cliente;
        //dd($cliente);
    }

    public function delete(Request $r, $id){
        $cliente = Cliente::find($id);
        if ($cliente){
            $cliente->delete();
            $Cliente = Cliente::orderBy('created_at', 'asc')->get();
            return view('listaclientes', ['Cliente'=>$Cliente]);
        }else{
            return "Cliente não encontrado...";
        }
    }
}

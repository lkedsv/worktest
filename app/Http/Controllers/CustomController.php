<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomController extends Controller
{
    function index()
    {
        return view('login');
    }

    function registration()
    {
        return view('registration');
    }

    function validate_registration(Request $request)
    {
        $request->validate([
            'name'         =>   'required',
            'email'        =>   'required|email|unique:users',
            'password'     =>   'required|min:6'
        ]);

        $data = $request->all();

        User::create([
            'name'  =>  $data['name'],
            'email' =>  $data['email'],
            'password' => $data['password']
        ]);

        //SENDMAIL ?
        /*
        $arrayEmails = ['user@mail.com','empresa@mail.com'];
        $emailSubject = 'Cadastro';
        $emailBody = 'Bem vindo, não responda essa mensagem.';

        Mail::send('emails.normal',
            ['msg' => $emailBody],
            function($message) use ($arrayEmails, $emailSubject) {
                $message->to($arrayEmails)
                ->subject($emailSubject);
            }
        );*/

        return redirect('login')->with('success', 'Cadastro Completo, Agora retorne a página de de LOGIN');
    }

    function validate_login(Request $request)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email', 'password');

        //Still missing tests
        //if(Auth::attempt($credentials))
 
        //return $credentials;
       
        $Cliente = Cliente::orderBy('created_at', 'asc')->get();

        return view('listaclientes', ['Cliente'=>$Cliente]);
    
        //return redirect('login')->with('success', 'Dados fornecidos inválidos!' );
    }

    function logout()
    {
        //Session::flush();

        Auth::logout();

        return Redirect('login');
    }
}

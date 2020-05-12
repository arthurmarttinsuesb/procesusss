<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $validacao_geral = array(
            'nome' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'string', 'max:2'],
            'telefone' => ['required', 'string', 'max:14'],
            'logradouro' => ['required', 'string', 'max:150'],
            'numero' => ['required', 'string', 'max:10'],
            'bairro' => ['required', 'string', 'max:100'],
            'cep' => ['required', 'string', 'max:10'],
            'estado' => ['required'],
            'cidade' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['required'],
        );

        $attributeNames = array(
            'nome' => 'Nome',
            'tipo' => 'Tipo',
            'telefone' => 'Telefone',
            'cpf' => 'CPF',
            'cnpj' => 'CNPJ',
            'logradouro' => 'Logradouro',
            'numero' => 'Número',
            'bairro' => 'Bairro',
            'cep' => 'CEP',
            'estado' => 'Estado',
            'cidade' => 'Cidade',
            'email' => 'E-mail',
            'password' => 'Senha',
            'terms' => 'Termos de Uso',
        );

        if($data['tipo']=="PF"){
            $validacao_cpf_cnpj = array('cpf' => ['required','cpf','formato_cpf','unique:users']); 
        } else if($data['tipo']=="PJ"){
            $validacao_cpf_cnpj = array('cnpj' => ['required','cnpj','formato_cnpj','unique:users']); 
        }

        $validator = Validator::make($data,array_merge($validacao_geral, $validacao_cpf_cnpj));
        $validator->setAttributeNames($attributeNames);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
            try{

                if($data['tipo']=="PF"){
                    $cpf_cnpj = $data['cpf']; 
                } else if($data['tipo']=="PJ"){
                    $cpf_cnpj = $data['cnpj'];
                }

                $user =  new User();
                $user->nome = $data['nome'];
                $user->sexo = $data['sexo'];
                $user->nascimento = $data['nascimento'];
                $user->tipo = $data['tipo'];
                $user->telefone = $data['telefone'];
                $user->cpf_cnpj = $cpf_cnpj;
                $user->logradouro = $data['logradouro'];
                $user->numero = $data['numero'];
                $user->bairro = $data['bairro'];
                $user->cep = $data['cep'];
                $user->cep = $data['complemento'];
                $user->fk_estado = $data['estado'];
                $user->fk_cidade = $data['cidade'];

                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                    
                DB::transaction(function() use ($user) {
                    $user->save();
                    $user->assignRole('cidadao');
                });

                app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
                return $user;
            }catch(\Exception  $erro){
                return response()->json(array('erros' => $erro));
            }

    }
}

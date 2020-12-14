<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;
use DB;
use App\User;
use App\File;
use Auth;
use Mail;
use App\Mail\SendMailUser;


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
            'sexo' => ['required'],
            'nascimento' => ['required'],
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
            'filenames' => ['required'],
        );

        //'filenames.*' => ['mimes:doc,pdf,docx']

        $attributeNames = array(
            'nome' => 'Nome',
            'tipo' => 'Tipo',
            'sexo' => 'Gênero',
            'telefone' => 'Telefone',
            'nascimento' => 'Data de Nascimento',
            'logradouro' => 'Logradouro',
            'numero' => 'Número',
            'bairro' => 'Bairro',
            'cep' => 'CEP',
            'estado' => 'Estado',
            'cidade' => 'Cidade',
            'email' => 'E-mail',
            'password' => 'Senha',
            'terms' => 'Termos de Uso',
            'filenames' => 'Arquivo/Foto',
        );
        $validacao_cpf_cnpj=array('cpf_cnpj' => ['required', 'cpf_cnpj', 'formato_cpf', 'unique:users']);
        $name = array('cpf_cnpj' => 'CPF');
        if ($data['tipo'] == "PF") {
            $validacao_cpf_cnpj = array('cpf_cnpj' => ['required', 'cpf_cnpj', 'formato_cpf', 'unique:users']);
            $name = array('cpf_cnpj' => 'CPF');
        } else if ($data['tipo'] == "PJ") {
            $validacao_cpf_cnpj = array('cpf_cnpj' => ['required', 'cpf_cnpj', 'formato_cnpj', 'unique:users']);
            $name = array('cpf_cnpj' => 'CNPJ');
        }

        $validator = Validator::make($data, array_merge($validacao_geral, $validacao_cpf_cnpj));
        $validator->setAttributeNames(array_merge($attributeNames, $name));

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        try {

            if ($data['sexo'] == "Outro"){
                $sexo = $data['genero'];
            }else {
                $sexo = $data['sexo'];
            }

                $user =  new User();
                $user->nome = $data['nome'];
                $user->tipo = $data['tipo'];
                $user->sexo = $sexo;
                $user->nascimento = $data['nascimento'];
                $user->telefone = $data['telefone'];
                $user->cpf_cnpj = $data['cpf_cnpj'];
                $user->logradouro = $data['logradouro'];
                $user->numero = $data['numero'];
                $user->bairro = $data['bairro'];
                $user->cep = $data['cep'];
                $user->complemento = $data['complemento'];
                $user->fk_estado = $data['estado'];
                $user->fk_cidade = $data['cidade'];
                $user->status = 'Ativo';

                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);

                DB::transaction(function () use ($user) {
                    $user->save();
                    $user->assignRole('cidadao');
                });

                try{


                    foreach($data['filenames'] as $file)
                    {
                        $name = time().'.'.$file->extension();
                        $file->move(public_path().'/files/', $name);
                        $files_upload[] = $name;
                    }


                    $file= new File();
                    $file->filenames=json_encode($files_upload);
                    $file->fk_user = $user->id;
                    $file->save();


                    // try{
                    //     Mail::to($user->email)->send(new SendMailUser($user));
                    // }catch(\Exception $erro){
                    //     return response()->json(array('erro'.$erro => "ERRO_EMAIL"));
                    // }

             } catch (\Exception  $erro) {
                 return response()->json(array('as' => $erro));
             }

             return $user;
             app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        } catch (Exception  $erro) {
            return response()->json(array('erros' => $erro));
        }
    }
}

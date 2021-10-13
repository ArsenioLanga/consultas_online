<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Unidade;

use App\Models\Usuario;

use Illuminate\Support\Facades\Mail;

use App\Models\Medico;

use App\Models\Especialidade;

use App\Models\Consulta;

use App\Classes\Random;

use App\Mail\email_sent;

use App\Classes\Enc;

use App\Classes\Loger;

use App\Http\Requests\loginRequest;

use App\Http\Requests\consultaRequest;

use App\Http\Requests\guardaRequest;

use Illuminate\Support\Facades\Hash;

use  Illuminate\Support\Facades\Storage;

use App\Mail\email_confirm_message;

class Main extends Controller
{
    //  private $R;
    private $enc;
    private $logger;

    public function __construct(){

        $this->enc = new Enc(); 
        $this->logger = new Loger();
    }
    public function teste(){
        echo 'Testar';
    }
    public function marcar_consulta(){
        
        // todas especialidades da base de dados
        $unidades = Unidade::all();
        $especialidades = Especialidade::all();
        $medicos = Medico::all();
    
        return view('marcar_consulta',[
            'dados'=>$unidades,
            'especialidades'=>$especialidades,
            'medicos'=>$medicos
        ]);


        // return view('marcar_consulta')->with('especialidades', $especialidades)->with('dados', $unidades)->with('medicos', $medicos);
    }

    public function crud_usuarios(){
        
       
        $usuarios = Usuario::all();
    
        return view('list_usuario',[
            'usuarios'=>$usuarios
        ]);
    }

    public function crud_unidades(){
        
       
        $unidades = Unidade::all();
    
        return view('list_unid',[
            'unidades'=>$unidades
        ]);
    }

    public function crud_especialidades(){
        
       
        $especialidades = Especialidade::all();
    
        return view('list_especialidade',[
            'especialidades'=>$especialidades
        ]);
    }

    public function crud_medicos(){

        $medicos = Medico::all();
    
        return view('list_medico',[
            'medicos'=>$medicos
        ]);
    }

    public function crud_consultas(){
    
        $consultas = Consulta::all();
    
        return view('list_consulta',[
            'consultas'=>$consultas
        ]);
    }

    public function findUnidadeName(Request $request){
      
        $data=Especialidade::select('especialidade', 'id')
        ->where('unidade_id',$request->id)
        ->take(100)
        ->get();
        return response()->json($data);

    }
    public function findmedicoName(Request $request){

        $data=Medico::select('nome', 'id')
        ->where('especialidade_id',$request->id)
        ->take(100)
        ->get();

      
        
       
        // //----------------------------------------------------
        // $data=Consulta::leftjoin('medicos', 'consultas.medico', '=', 'medicos.nome')  
        //         ->select('medicos.nome', 'medicos.id', 'data', 'consultas.hora')
        //         ->where('medicos.especialidade_id',$request->id)
        //         // ->where(count())
        //          ->take(100)
        //          ->get();
        //----------------------------------------
    


       
                


        return response()->json($data);
    }
    public function useradd(){
        return view('useradd');
    }
    public function index(){

        if($this->checkSession()){
            
            //Verificar tipo de utlizador
            $user = (Session('usuario')['usuario']);
            $usuario = Usuario::where('usuario',$user)->first();
            
            
             $categoria = ($usuario['categoria']); 
    

            if($categoria =="paciente"){
                // echo "paciente";
                return redirect()->route('marcar_consulta');
            }elseif($categoria =='medico') {
                // echo "medico";
                return redirect()->route('medico', session('usuario')['usuario']);
            }else {
                // echo "gestor";
                return redirect()->route('gestor');
            }

        }else{
           return redirect()->route('login');
        }

    }
    public function logout(){

        // //registar log de logout
          $this->logger->log('info', 'Fez o LogOut');

        session()->forget('usuario');
        return redirect()->route('index');

    }
    public function checkSession(){
        //verificar formulario de login
        return session()->has('usuario');
    }
    public function login(){
        //verifica se ja exite sessao

        if($this->checkSession()){
            return redirect()->route('index');
        }

        //apresentar formulario de login
        $erro = session('erro');
        $data = [];
        if(!empty($erro)){
            $data = [
                'erro' => $erro
            ]; 
        }
        return view('login', $data);
    }
    public function login_submit(loginRequest $request){

            //verifica se houve submisao de formulario
                if(!$request->isMethod('post')){
                    return redirect()->route('index');
                }

           //verifica se ja existe sessao
            if($this->checkSession()){
                return redirect()->route('index');
            }

            

            //validacao
              $request->validated();
            //verificar dados de login
            $usuario = trim($request->input('text_usuario'));
            $senha = trim($request->input('text_senha'));

            $usuario = Usuario::where('usuario',$usuario)->first();

            //verifica se o usuario existe
                if(!$usuario){
                    //adicionar log de usuario invalido
                    $this->logger->log('error', trim($request->input('text_usuario')) . ' - Usuario Invalido');

                   session()->flash('Erro!', ['Usuario invalido']);
                    return redirect()->route('login');
                }

            //verificar se a senha esta correcta
                if(!hash::check($senha, $usuario->senha)){
                     //adicionar log de senha invalida
                    $this->logger->log('error', trim($request->input('text_usuario')) . ' - Senha Invalido');
                    session()->flash('Erro!', ['Senha invalido']);
                    return redirect()->route('login');
                }

            //login valido

            session()->put('usuario', $usuario);


            //registar log de login
                $this->logger->log('info', 'Fez o seu login');

            return redirect()->route('index');

           
    }
    public function confirmacao_consulta(){
        return view('confirmacao_consulta');
    } 
    public function confirmacao_remarcar_consulta(){
        return view('confirmacao_remarcar_consulta');
    }
    public function consulta_submit(consultaRequest $request){

        //verifica se ja existe sessao
        if(!$this->checkSession()){
            return redirect()->route('index');
        }

        //verifica se houve submisao de formulario
            if(!$request->isMethod('post')){
                return redirect()->route('marcar_consulta');
            }

        //validacao
        
        //   $request->validated();
        //verificar dados de login
            
                // pegar os dados envidos pelo formulario
                $nome = trim($request->input('nome'));
                $idade = trim($request->input('idade'));
                $morada = trim($request->input('morada'));
                $sexo = trim($request->input('sexo'));
                $data = trim($request->input('data'));
                $hora = trim($request->input('hora'));
                $unidade = trim($request->input('unidade'));
                $especialidade = trim($request->input('especialidade'));
                $medico = trim($request->input('medico'));
                $email = session('usuario')['usuario'];
                
                // VALIDAR CONSULTA
                // $verificar = Consulta::where([
                //                             'data'=>$data,
                //                             'hora'=>$hora,
                //                             'medico'=>$medico
                //                         ])
                //                 ->first();

                                

                // if(count($verificar) != 0){
                    if(Consulta::where(
                                         [
                                            'data'=>$data,
                                            'hora'=>$hora,
                                            'medico'=>$medico
                                        ])
                                ->count() > 0){

                    $unidades = Unidade::all();
                    $especialidades = Especialidade::all();
                    $medicos = Medico::all();
    
                    return view('validar_consulta',[
                        'dados'=>$unidades,
                        'especialidades'=>$especialidades,
                        'medicos'=>$medicos
                    ]);

                }
                else {
      
                
                    // guardar consulta na base de dados
                    $consultas = new Consulta;
                    $consultas->nome = $nome;
                    $consultas->idade = $idade;
                    $consultas->morada = $morada;
                    $consultas->email = $email;
                    $consultas->data = $data;
                    $consultas->hora = $hora;
                    $consultas->estado = "marcada";
                    $consultas->unidade = $unidade;
                    $consultas->especialidade = $especialidade;
                    $consultas->medico = $medico;
                    $consultas->save();
                    $email_to = session('usuario')['usuario'];

                    
                    //send email cponfirmation
                    // Mail::to($email_to)->send(new email_read_message($purl_code));
                    Mail::to($email_to)->send(new email_sent($nome, $idade, $morada, $data, $hora, $medico));

                    return redirect()->route('confirmacao_consulta'); 
                }

    }  
    public function remarcar_submit(consultaRequest $request){

        //verifica se ja existe sessao
        if(!$this->checkSession()){
            return redirect()->route('index');
        }

        //verifica se houve submisao de formulario
            if(!$request->isMethod('post')){
                return redirect()->route('marcar_consulta');
            }

        //validacao
        //   $request->validated();
        //verificar dados de login
            
                $data = trim($request->input('data'));
                $hora = trim($request->input('hora'));
                $unidade = trim($request->input('unidade'));
                $especialidade = trim($request->input('especialidade'));
                $medico = trim($request->input('medico'));
                $id = trim($request->input('id'));
                // $email = session('usuario')['usuario'];
                // echo $id.'<br>';
                // echo $data;
                // die();
                
                // guardar consulta na base de dados      
                // $consultas = new Consulta;
                $consultas = Consulta::find($id);
                $consultas->data = $data;
                $consultas->hora = $hora;
                $consultas->estado = "remarcada";
                $consultas->unidade = $unidade;
                $consultas->especialidade = $especialidade;
                $consultas->medico = $medico;
                $consultas->save();

        //enviar email com a confirmacao 
        // Mail::to($request->$email)->send(new email_confirm_message($purl_code));

        // Mail::to($request->session('usuario')['usuario'])->send(new email_confirm_message());

              return redirect()->route('confirmacao_remarcar_consulta');  

    } 
     public function historico($email){
        if(!$this->checkSession()){
            return redirect()->route('index');
        }
        $historico=Consulta::select('id', 'nome', 'data','estado', 'hora', 'unidade', 'especialidade', 'medico' )
        ->where('email',$email)
        ->take(100)
        ->get();
        return view('historico')->with('historico', $historico);
    }
     public function consulta_edit($id){
         
        $unidades = Unidade::all();
        $especialidades = Especialidade::all();
        $remarcar=Consulta::select('id', 'nome', 'idade', 'morada', 'data', 'hora', 'unidade', 'especialidade', 'medico' )
        ->where('id',$id)
        ->take(100)
        ->get();
        return view('remacar')->with('marca', $remarcar)->with('dado', $unidades)->with('especialidade', $especialidades);;



    }
     public function cancelar_edit($id){

       
        if(!$this->checkSession()){
            return redirect()->route('index');
        }
      
                $remarcar = Consulta::find($id);
                $remarcar->estado = "cancelada";
                $remarcar->save();
           
               // redirect::to('index');
               return redirect()->route('historico', session('usuario')['usuario']);
              

    }
    public function remarcar_edit($id){

       
        if(!$this->checkSession()){
            return redirect()->route('index');
        }
      
                $consultas = Consulta::find($id);
                $data = trim($request->input('data'));
                $hora = trim($request->input('hora'));
                $unidade = trim($request->input('unidade'));
                $especialidade = trim($request->input('especialidade'));
                $medico = trim($request->input('medico'));
                // $email = session('usuario')['usuario'];
                
                
                // guardar consulta na base de dados      
                // $consultas = new Consulta;
                $consultas->data = $data;
                $consultas->hora = $hora;
                $consultas->estado = "marcada";
                $consultas->unidade = $unidade;
                $consultas->especialidade = $especialidade;
                $consultas->medico = $medico;
                $consultas->save();

           
               // redirect::to('index');
               return redirect()->route('index');

    }
    public function medico($email){
        $medi="";
        if(!$this->checkSession()){
            return redirect()->route('index');
        }
        $medico=Medico::select('nome' )
        ->where([
            'email'=>$email
            ])
        ->take(100)
        ->get();
            foreach($medico as $med){
                $medi = $med->nome;
            }


        $consulta=Consulta::select('id', 'nome', 'data','estado', 'hora' )
        ->where([
                    'medico'=>$medi,
                    'observacao'=>"pendente"
                ])
        ->take(100)
        ->get();
        return view('medico')->with('consulta', $consulta);
    }
    public function medico_atendidas($email){
        
        $medi="";
        $abservacao="atendida";
        if(!$this->checkSession()){
            return redirect()->route('index');
        }
        $medico=Medico::select('nome')
        ->where('email',$email)
        ->take(100)
        ->get();
            foreach($medico as $med){
                $medi = $med->nome;
            }
            
        $consulta=Consulta::select('id', 'nome','morada', 'idade', 'data','estado', 'hora', 'created_at', 'updated_at' )
        ->where([
                    'medico'=>$medi,
                     'observacao'=>"atendida"
                ])
        ->take(100)
        ->get();
       
        return view('medico1')->with('consulta', $consulta);
        // die('okIL');
    }
    public function medico_canceladas($email){
        $medi="";
        $abservacao="cancelada";
        if(!$this->checkSession()){
            return redirect()->route('index');
        }
        $medico=Medico::select('nome' )
        ->where('email',$email)
        ->take(100)
        ->get();
            foreach($medico as $med){
                $medi = $med->nome;
            }


        $consulta=Consulta::select('id', 'nome', 'morada', 'idade', 'created_at', 'updated_at', 'data','estado', 'hora' )
        ->where([
                    'medico'=>$medi, 
                    'estado'=>"cancelada"
                ])
        ->take(100)
        ->get();
        return view('medico2')->with('consulta', $consulta);
    }
    public function gestor(){
        return view('gestor');
    }
    public function criar_conta_submit(loginRequest $request){

        //verifica se houve submisao de formulario
            if(!$request->isMethod('post')){
                return redirect()->route('index');
            }

       //verifica se ja existe sessao
        if($this->checkSession()){
            return redirect()->route('index');
        }

        

        //validacao
        //    $request->validated();
        //verificar dados de login
        $usuario = trim($request->input('text_usuario'));
        $senha1 = trim($request->input('text_senha1'));
        $categoria = "paciente";


        $usuario = Usuario::where('usuario',$usuario)->first();

        //verifica se o usuario existe
            if(!$usuario){
                //adicionar log de usuario invalido
                $this->logger->log('error', trim($request->input('text_usuario')) . ' - Usuario Invalido');

               session()->flash('Erro!', ['Usuario invalido']);
                return redirect()->route('useradd');
            }

            
        //login valido


        return redirect()->route('login');

       
    } 
    public function marcar_atendidas($id){
        if(!$this->checkSession()){
            return redirect()->route('index');
        }

                $atendida = Consulta::find($id);
                $atendida->observacao = "atendida";
                $atendida->save();
           
               // redirect::to('index');
               return redirect()->route('medico', session('usuario')['usuario']);

    }

 }

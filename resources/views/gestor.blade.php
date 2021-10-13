@extends('layouts/layout_medico')

@section('conteudo')

   <!-- <div class="container-fluido"> -->
       <!-- /Dashbord ADMIN -->
            <div class="admin-wrapper">

                <!-- Conteudo a esquerda -->
                <div class="left-sidebar">
                    <ul>
                        
                        <li><a href="{{route('crud_consultas')}}">Consultas</a></li>
                        <li><a href="{{route('crud_medicos')}}">Medicos</a></li>
                        <li><a href="{{route('crud_especialidades')}}">Especialidades</a></li>
                        <li><a href="{{route('crud_unidades')}}">Unidades</a></li>
                        <li><a href="{{route('crud_usuarios')}}">Usuarios</a></li>
                    </ul>
                </div>

                <!-- Conteudo a direita -->
               <div class="admin-content">
                    <div class="content">
                        <div class="admin-content">
                            <h1>Bem vindo a gestao de consultas online</h1>      
                        </div>
                    </div>
                </div>
            
              <?php $enc = new App\Classes\Enc ?>

         </div>   



@endsection
@extends('layouts/layout_app')

@section('conteudo')



<div class="admin-wrapper">

<!-- Conteudo a esquerda -->
<div class="left-sidebar">
    <ul>
        <li><a href="{{route('crud_consultas')}}">Consultas</a></li>
       <strong><li><a style="text-transform: uppercase;" href="{{route('crud_medicos')}}">Medicos</a></li></strong>
        <li><a href="{{route('crud_especialidades')}}">Especialidades</a></li>
        <li><a href="{{route('crud_unidades')}}">Unidades</a></li>
        <li><a href="{{route('crud_usuarios')}}">Usuarios</a></li>
    </ul>
</div>

<!-- Conteudo a direita -->
<div class="admin-content">
     
    <div class="content">
       <div class="admin-content">
                    <div class="botton-group mt-1">
                        <a href="{{route('marcar_consulta')}}" class="btn btn-primary">Adicionar</a>
                    </div>
                    <div class="content">
                        <h2 class="pag-title">Todos medicos</h2>

                      @if ($medicos->count() == 0)
                            <p>Nao existem consultas marcadas!</p>
                      @else
                        <table>
                            <thead>
                                <th>NOME</th>
                                <th>ESPECIALIDADE</th>
                                <th>EMAIL</th>
                                <th colspan="2">Accao</th>
                            </thead>
                            <tbody>
                                @foreach($medicos as $medico)
                                <tr>
                                    <td>{{$medico->nome}}</td>
                                    <td>{{$medico->especialidade_id}}</td>
                                    <td>{{$medico->email}}</td>
                                    <td><a href="{{route('consulta_edit', $medico->id)}}"  class="btn btn-primary">Editar</a></td>
                                    <td><a href="{{route('cancelar_edit', $medico->id)}}" class="btn btn-danger">Desabilitar</a></td>
                               
                                </tr>
                                @endforeach
                            </tbody>
                       
                        </table>
                        @endif
                    </div>
               </div>
        
     
    </div>
</div>

<?php $enc = new App\Classes\Enc ?>

</div>
       

@endsection
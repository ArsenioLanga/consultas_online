@extends('layouts/layout_app')

@section('conteudo')



<div class="admin-wrapper">

<!-- Conteudo a esquerda -->
<div class="left-sidebar">
    <ul>
        <li><a href="{{route('crud_consultas')}}">Consultas</a></li>
        <li><a href="{{route('crud_medicos')}}">Medicos</a></li>
        <li><a href="{{route('crud_especialidades')}}">Especialidades</a></li>
        <li><a href="{{route('crud_unidades')}}">Unidades</a></li>
        <strong><li><a style="text-transform: uppercase;" href="{{route('crud_usuarios')}}">Usuarios</a></li></strong>
    </ul>
</div>

<!-- Conteudo a direita -->
<div class="admin-content">
     
    <div class="content">
       <div class="admin-content">
                    <div class="botton-group mt-1">
                        <a href="{{route('useradd')}}" class="btn btn-primary">Adicionar</a>
                    </div>
                    <div class="content">
                        <h2 class="pag-title">Todos usuarios</h2>

                      @if ($usuarios->count() == 0)
                            <p>Nao existem usuarios registados!</p>
                      @else
                        <table>
                            <thead>
                                <th>USUARIO</th>
                                <th>CATEGORIA</th>
                                <th colspan="2">Accao</th>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->usuario}}</td>
                                    <td>{{$usuario->categoria}}</td>
                                    <td><a href="{{route('consulta_edit', $usuario->id)}}"  class="btn btn-primary">Remarcar</a></td>
                                    <td><a href="{{route('cancelar_edit', $usuario->id)}}" class="btn btn-danger">Cancelar</a></td>
                               
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
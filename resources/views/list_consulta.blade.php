@extends('layouts/layout_app')

@section('conteudo')



<div class="admin-wrapper">

<!-- Conteudo a esquerda -->
<div class="left-sidebar">
    <ul>
    <strong><li><a style="text-transform: uppercase;" href="{{route('crud_consultas')}}">Consultas</a></li></strong>
        <li><a href="{{route('crud_medicos')}}">Medicos</a></li>
        <li><a href="{{route('crud_especialidades')}}">Especialidades</a></li>
        <li><a href="{{route('crud_unidades')}}">Unidades</a></li>
        <li><a  href="{{route('crud_usuarios')}}">Usuarios</a></li>
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
                        <h2 class="pag-title">Todas consultas</h2>

                      @if ($consultas->count() == 0)
                            <p>Nao existem consultas marcadas!</p>
                      @else
                        <table>
                            <thead>
                                <th>NOME</th>
                                <th>DATA</th>
                                <th>HORA</th>
                                <th>ESTADO</th>
                                <th>MEDICO</th>
                                <th>ESTADO</th>
                                <th>OBSERVACAO</th>
                                <th colspan="2">Accao</th>
                            </thead>
                            <tbody>
                                @foreach($consultas as $consulta)
                                <tr>
                                    <td>{{$consulta->nome}}</td>
                                    <td>{{$consulta->data}}</td>
                                    <td>{{$consulta->hora}}</td>
                                    <td>{{$consulta->estado}}</td>
                                    <td>{{$consulta->medico}}</td>
                                    <td>{{$consulta->estado}}</td>
                                    <td>{{$consulta->observacao}}</td>
                                    <td><a href="{{route('consulta_edit', $consulta->id)}}"  class="btn btn-primary">Remarcar</a></td>
                                    <td><a href="{{route('cancelar_edit', $consulta->id)}}" class="btn btn-danger">Cancelar</a></td>
                               
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
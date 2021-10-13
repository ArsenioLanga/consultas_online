@extends('layouts/layout_app')

@section('conteudo')



<div class="admin-wrapper">

<!-- Conteudo a esquerda -->
<div class="left-sidebar">
    <ul>
        <li><a href="{{route('crud_consultas')}}">Consultas</a></li>
        <li><a href="{{route('crud_medicos')}}">Medicos</a></li>
        <li><a href="{{route('crud_especialidades')}}">Especialidades</a></li>
        <strong><li><a style="text-transform: uppercase;" href="{{route('crud_unidades')}}">Unidades</a></li></strong>
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
                        <h2 class="pag-title">Todas unidades</h2>

                      @if ($unidades->count() == 0)
                            <p>Nao existem especialidades mregistadas!</p>
                      @else
                        <table>
                            <thead>
                                <th>UNIDADE</th>
                                <th colspan="2">Accao</th>
                            </thead>
                            <tbody>
                                @foreach($unidades as $unidade)
                                <tr>
                                    <td>{{$unidade->unidade}}</td>
                                    <td><a href="{{route('consulta_edit', $unidade->id)}}"  class="btn btn-primary">Editar</a></td>
                                    <td><a href="{{route('cancelar_edit', $unidade->id)}}" class="btn btn-danger">Desabilitar</a></td>
                               
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
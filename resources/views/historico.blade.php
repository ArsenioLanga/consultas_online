@extends('layouts/layout_app')

@section('conteudo')



<div class="admin-wrapper">

<!-- Conteudo a esquerda -->
<div class="left-sidebar">
    <ul>
        <li><a href="{{route('marcar_consulta')}}">Marcar Consulta</a></li>
        <strong><li><a style="text-transform: uppercase;" href="{{route('historico', session('usuario')['usuario'])}}">Minhas Consultas</a></li></strong>
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
                        <h2 class="pag-title">Minhas consultas</h2>

                      @if ($historico->count() == 0)
                            <p>Nao existem consultas marcadas!</p>
                      @else
                        <table>
                            <thead>
                                <th>NOME</th>
                                <th>DATA</th>
                                <th>HORA</th>
                                <th>ESTADO</th>
                                <th>MEDICO</th>
                                <th colspan="2">Accao</th>
                            </thead>
                            <tbody>
                                @foreach($historico as $historia)
                                <tr>
                                    <td>{{$historia->nome}}</td>
                                    <td>{{$historia->data}}</td>
                                    <td>{{$historia->hora}}</td>
                                    <td>{{$historia->estado}}</td>
                                    <td>{{$historia->medico}}</td>
                                    <td><a href="{{route('consulta_edit', $historia->id)}}"  class="btn btn-primary">Remarcar</a></td>
                                    <td><a href="{{route('cancelar_edit', $historia->id)}}" class="btn btn-danger">Cancelar</a></td>
                               
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
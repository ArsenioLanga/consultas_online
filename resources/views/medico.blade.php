@extends('layouts/layout_medico')

@section('conteudo')

   <!-- <div class="container-fluido"> -->
       <!-- /Dashbord ADMIN -->
            <div class="admin-wrapper">

                <!-- Conteudo a esquerda -->
                <div class="left-sidebar">
                    <ul>
                    
                        <strong><li><a style="text-transform: uppercase;" href="{{route('medico', session('usuario')['usuario'])}}">Pendentes</a></li></strong>
                        <li><a href="{{route('medico-canceladas', session('usuario')['usuario'])}}">Canceladas</a></li>
                        <li><a href="{{route('medico-atendidas', session('usuario')['usuario'])}}">Atendidas</a></li>
                    </ul>
                </div>

                <!-- Conteudo a direita -->
               <div class="admin-content">
     
                    <div class="content">
                    <div class="admin-content">
                                    
                                    <div class="content">
                                        <h2 class="pag-title">Minhas consultas pendentes</h2>

                                    @if ($consulta->count() == 0)
                                            <p>Nao existem consultas marcadas!</p>
                                    @else
                                        <table>
                                            <thead>
                                                <th>NOME</th>
                                                <th>DATA</th>
                                                <th>HORA</th>
                                                <th colspan="2">Accao</th>
                                            </thead>
                                            <tbody>
                                                @foreach($consulta as $historia)
                                                <tr>
                                                    <td>{{$historia->nome}}</td>
                                                    <td>{{$historia->data}}</td>
                                                    <td>{{$historia->hora}}</td>
                                                    <td><a href="{{route('marcar_atendidas', $historia->id)}}"  class="btn btn-primary">Marcar como atendida</a></td>
                                                    <!-- <td><a href="{{route('cancelar_edit', $historia->id)}}" class="btn btn-danger">Cancelar</a></td> -->
                                            
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
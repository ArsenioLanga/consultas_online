@extends('layouts/layout_medico')

@section('conteudo')

   <!-- <div class="container-fluido"> -->
       <!-- /Dashbord ADMIN -->
            <div class="admin-wrapper">

                <!-- Conteudo a esquerda -->
                <div class="left-sidebar">
                    <ul>
                    
                        <li><a href="{{route('medico', session('usuario')['usuario'])}}">Pendentes</a></li>
                        <strong><li><a style="text-transform: uppercase;" href="{{route('medico-canceladas', session('usuario')['usuario'])}}">Canceladas</a></li></strong>
                        <li><a href="{{route('medico-atendidas', session('usuario')['usuario'])}}">Atendidas</a></li>
                    </ul>
                </div>

                <!-- Conteudo a direita -->
               <div class="admin-content">
     
                    <div class="content">
                    <div class="admin-content">
                                    
                                    <div class="content">
                                        <h2 class="pag-title">Consultas Canceladas</h2>

                                    @if ($consulta->count() == 0)
                                            <p>Nao existem consultas marcadas!</p>
                                    @else
                                        <table>
                                            <thead>
                                                <th>NOME</th>
                                                <th>MORADA</th>
                                                <th>IDADE</th>
                                                <th>DATA E HORA DA MARCACAO</th>
                                                <th colspan="4">DATA E HORA DO CANCELAMENTO</th>
                                              
                                            </thead>
                                            <tbody>
                                                @foreach($consulta as $historia)
                                                <tr>
                                                    <td>{{$historia->nome}}</td>
                                                    <td>{{$historia->morada}}</td>
                                                    <td>{{$historia->idade}}</td>
                                                    <td>{{$historia->created_at}}</td>
                                                    <td>{{$historia->updated_at}}</td>
                                                    
                                            
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
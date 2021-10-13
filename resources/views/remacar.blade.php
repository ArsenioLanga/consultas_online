@extends('layouts/layout_app')

@section('conteudo')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/7.0.0/d3.min.js" integrity="sha512-0x7/VCkKLLt4wnkFqI8Cgv6no+AaS1TDgmHLOoU3hy/WVtYta2J6gnOIHhYYDJlDxPqEqAYLPS4gzVex4mGJLw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
   
<div class="admin-wrapper">

<!-- Conteudo a esquerda -->
<div class="left-sidebar">
    <ul>
        <li><a href="{{route('marcar_consulta')}}">Marcar Consulta</a></li>
        <li><a href="{{route('historico', session('usuario')['usuario'])}}">Minhas Consultas</a></li>
    </ul>
</div>

<!-- Conteudo a direita -->
<div class="admin-content">
    <div class="content">
       <h2 class="pag-title">Remarcação de Consultas Online</h2>
      
        <form action="{{route('remarcar_submit')}}" method="post">
        @csrf
        @foreach($marca as $marcar)
            <div class="tab">
                <h5>Informacao do Paciente:</h5>
                <input type="text" value="{{$marcar->nome}}"  disabled="true" placeholder="Nome do Paciente" oninput="this.className = ''" name="nome">
                <input type="number"  value="{{$marcar->idade}}" disabled="true"  placeholder="Idade do Paciente" oninput="this.className = ''" name="idade">
                <input type="text"  value="{{$marcar->morada}}" disabled="true"  placeholder="Morada do Paciente" oninput="this.className = ''" name="morada">
                <input type="hidden"  value ="{{$marcar->id}}" name="id">
            </div>
            <hr>
            <div>
               <h5>Data e Hora da consulta:</h5>
               <p>Data:&nbsp;<input type="date"  value="{{$marcar->data}}" oninput="this.className = ''" name="data">&nbsp; &nbsp;
                Horario:  &nbsp; Manha(07h-12h)<input type="radio"  value="Manha" oninput="this.className = ''" name="hora">&nbsp;
                Tarde(12h-18h)<input type="radio"  value="Tarde" placeholder="" oninput="this.className = ''" name="hora">&nbsp;
                Noite(18h-22h)<input type="radio"  value="Noite" placeholder="." oninput="this.className = ''" name="hora"> </p>      
            </div>
            <hr style="">
            <div>
                <h5>Informacao da Unidade:</h5>
                <!-- &nbsp; &nbsp;  Unidade: &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;   Especialidade: &nbsp;  Medicos Diponiveis <br> -->
                <pre>        Unidade:                    Especialidade:             Medicos Diponiveis </pre>
                
                <select name="unidade" id="unidade" class="unidade" >
                    <!-- <option value="0" selected="true">{{$marcar->unidade}}</option> -->
                    <option value="0" disabled="true" selected="true">Selecione a unidade</option>
                    @foreach($dado as $dado)
                        <option value="{{$dado->id}}" >{{$dado->unidade}}</option>
                    @endforeach
                </select>

                &nbsp; &nbsp;
                <select name="especialidade" id="especialidade" class="especialidade" >
                     <option value="0" disabled="true"  selected="true">Selecione a especialidade</option>
                   
                </select>
            
                &nbsp;&nbsp;&nbsp;&nbsp;

                <select placeholder="Medico" oninput="this.className = ''" name="medico" id="medico" class="medico">
                    <option value="0"  disabled="true" selected="true">Selecione o medico</option>
                    
                </select>
            </div>
            <div class="botton-group text-right">
                 <input type="submit" class="btn btn-primary" value="Enviar">
            </div> 
        @endforeach
                
        </form>
     
    </div>
</div>

<?php $enc = new App\Classes\Enc ?>

</div>




    <script>
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    </script>
    <script>
        $(document).ready(function(){
            
            $(document).on('change','.unidade',function(){
                // console.log("Funciona");
                var id_unidade=$(this).val();
                //  console.log(id_unidade);
                var div=$(this).parent();

                var op="";
                $.ajax({
                    type:'get',
                    // url:'{!!URL::to('findUnidadeName')!!}',
                    url:'findUnidadeName',
                    data:{'id':id_unidade},
                    success:function(data){
                        //  console.log('success');
                        //   console.log(data);
                        op+='<option value="0" disabled="true" selected="true">Selecione a Especialidade</option>';
                            for(var i=0;i<data.length;i++){
                                op+='<option value="'+data[i].id+'">'+data[i].especialidade+'</option>';
                            }

                            div.find('.especialidade').html(" ");
                            div.find('.especialidade').append(op);
                    },
                    error:function(){
                         console.log('falha ao entrar');
                    }

                });
            });

            '<meta name="csrf-token" content="{{ csrf_token() }}">';

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $(document).on('change','.especialidade',function(){
                // console.log("Funciona");
                
                var id_especialidade=$(this).val();
                // console.log(id_unidade);
                var div=$(this).parent();
                var ops="";
                $.ajax({
                    type:'post',
                    url:'{!!URL::to('findmedicoName')!!}',
                    // url:'findUnidadeName',
                    data:{'id':id_especialidade},
                    success:function(data){
                        console.log('success');

                        console.log(data);
                        ops+='<option value="0" disabled="true" selected="true">Selecione o Medico</option>';
                            for(var i=0;i<data.length;i++){
                                ops+='<option value="'+data[i].nome+'">'+data[i].nome+'</option>';
                            }
                            div.find('.medico').html(" ");
                            div.find('.medico').append(ops);
                    },
                    error:function(){
                         console.log('falha ao entrar');
                    }

                });
            });
          
        });  
    </script>



    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/7.0.0/d3.min.js" integrity="sha512-0x7/VCkKLLt4wnkFqI8Cgv6no+AaS1TDgmHLOoU3hy/WVtYta2J6gnOIHhYYDJlDxPqEqAYLPS4gzVex4mGJLw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>

@endsection
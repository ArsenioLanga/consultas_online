@extends('layouts/layout_app')

@section('conteudo')

   <!-- <div class="container-fluido"> -->
       <!-- /Dashbord ADMIN -->
            <div class="admin-wrapper">

                <!-- Conteudo a esquerda -->
                <div class="left-sidebar">
                    <ul>
                        <li><a href="">Marcar Consulta</a></li>
                        <li><a href="">Historico</a></li>
                    </ul>
                </div>

                <!-- Conteudo a direita -->
                <div class="admin-content">
                     <!-- <div class="botton-group">
                        <a href="" class="btn btn-primary">Adicionar</a>
                         <a href="#" class="btn btn-primary">Gerir</a>
                    </div>  -->
                    <div class="content">
                       <h2 class="pag-title">Marcação de Consultas Online</h2>
                      
                        <form action="" method="post">

                        <!-- <input type="text" class="a" name="" id="titulo1">    
                        <input type="button" value=""  > -->
                        <!-- <input type="button" value=""  > -->
                            <select name="a" id="a" class="a" >
                                <option value="">ssaas</option>
                                <option  value="">jkjkds</option>
                                <option    value="">nmnm</option>
                            </select>
                        </form>
                     
                    </div>
               </div>
            
              <?php $enc = new App\Classes\Enc ?>

         </div>   
   


@endsection
 <script type="text/javascript">  

// console.log('fora do redy');
//        $(document).ready(function(){
//         console.log('working');
//             $(document).on('change','.a',function(){
//                     console.log('working');
//             });
//        });
console.log('fora do redy');
       $("document").ready(function(){
        console.log('working');
            $(document).on('change','.a',function(){
                    console.log('working');
            });
       })
</script> 

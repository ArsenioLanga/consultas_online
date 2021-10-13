@extends('layouts/layout_login')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-4 offset-sm-4">
            <!-- form -->
            <form action="{{route('criar_conta_submit')}}" id="regForm" method="post">
                @csrf
                <h4>Criar Conta</h4>
                <hr>
                <div class="form-group">
                    <label for="">email</label>
                    <input type="email" name="text_usuario" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" name="text_senha1" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Confirmar Senha</label>
                    <input type="password" name="text_senha2" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" name="" class="btn btn-success" value="Entrar">
                </div>

                <div class="form-group">
                    <p>Ja tens conta? <a href="{{route('index')}}">Click Aqui!</a></p>
                </div>
            </form>
             <!-- /form -->
             @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $erro)
                            <li>{{$erro}}</li>
                        @endforeach
                    </ul>
                </div>
             @endif
        </div>
    </div>
</div>
@endsection
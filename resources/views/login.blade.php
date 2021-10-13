@extends('layouts/layout_login')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-4 offset-sm-4">
            <!-- form -->
            <form action="{{route('login_submit')}}" id="regForm" method="post">
                @csrf
                <h4>LOGIN</h4>
                <hr>
                <div class="form-group">
                    <label for="">Usuario</label>
                    <input type="email" name="text_usuario" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" name="text_senha" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" name="" class="btn btn-success" value="Entrar">
                </div>

                <div class="form-group">
                    <p>Ainda não tens conta? <a href="{{route('useradd')}}">Click Aqui!</a></p>
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
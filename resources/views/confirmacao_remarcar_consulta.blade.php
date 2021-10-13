@extends('layouts/layout_login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h2>Consulta remarcada com sucesso!</h2>
            <h5>Foi enviado um email de confirmacao para o enderenco <strong>{{session('usuario')['usuario']}}</strong></h5>
            <p>Verifique a caixa do email ou SPAM</p>
            <div class="my-5">
                <a href="{{route('historico', session('usuario')['usuario'])}}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>


@endsection
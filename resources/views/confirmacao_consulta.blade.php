@extends('layouts/layout_login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h2>Consulta marcada com sucesso!</h2>
            <h5>Foi enviado um email de confirmação para o enderenço <strong>{{session('usuario')['usuario']}}</strong></h5>
            <p>Verifique a tua caixa de mensagens ou no SPAM</p>
            <div class="my-5">
                <a href="{{route('historico', session('usuario')['usuario'])}}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>


@endsection
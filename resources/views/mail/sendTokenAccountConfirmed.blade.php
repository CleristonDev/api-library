@extends('mail.base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Segue o token para confirma sua conta</h3>
                <p>Hi {{ $institutionName }},</p>
                <p>Seu token é: {{ $institutionToken }}</p>
            </div>
        </div>
    </div>
@endsection

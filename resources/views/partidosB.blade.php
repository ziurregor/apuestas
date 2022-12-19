@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Pagina Principal') }}
                    Partidos
                </div>
                
                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Inicio correctamente su session!') }} --}}
                    <listapartidos-component>
                    </listapartidos-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
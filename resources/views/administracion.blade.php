@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Administracion') }}</div>

                <div class="card-body">
                    <a href="/users" class="card-link">Usuarios</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

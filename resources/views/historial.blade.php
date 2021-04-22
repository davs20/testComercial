@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Historial</div>
                <div class="card-body">
                   <div class="row">
                       <div class="col">
                            <div class="list-group">
                                @foreach ($historial as  $h)
                                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{$h->accion}}</h5>
                                        <small>{{$h->created_at}}</small>
                                      </div>
                                    
                                </a>
                                @endforeach
                                
                            </div>
                        </div>

                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

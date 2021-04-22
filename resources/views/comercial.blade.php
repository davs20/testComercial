@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Comercial') }}</div>

                <div class="card-body">
                    <div class="">
                        <form action="/comercial-reporte"  class="row justify-content-md-end  " method="post">
                            @csrf
                            <div class="col-md-2">
                                <label for="">Buscar</label>
                                <input type="search"  class="form-control" id="search" name="search" placeholder="Buscar">
                
                            </div>
                            <div class="col-md-3">
                                <label for="">Promociones</label>
                                <select class="form-control" name="promocion[]"  multiple id="promocion" aria-label="seleccione uno">
                                    <option selected value="0">seleccione Uno</option>
                                   @foreach ($promociones as $promocion)
                                         <option value="{{$promocion->id}}">{{$promocion->nombre}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="">Campañas de marketing</label>
                                <select class="form-control" name="campanas[]" id="campanas" multiple aria-label="seleccione uno">
                                    <option selected value="0">seleccione Uno</option>
                                   @foreach ($campanas as $campana)
                                         <option value="{{$campana->id}}">{{$campana->nombre}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="">Fecha</label>
                                <input type="date"  class="form-control" id="fecha_ingreso" name="fecha_ingreso" placeholder="Fecha">
                            </div>
                            
                            <div class="col-md-3 mt-4">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="submit" class="btn btn-primary">Consultar</button>
                                    <button type="reset" class="btn btn-primary">Limpiar</button>
                                    <button type="button" onclick="exportar(this);" class="btn btn-primary">Exportar</button>
                                  </div>
                            </div>
                        </form>
                        
                    </div>

                    <div class="row">
                        
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Fecha de ingreso</th>
                                <th scope="col">Promocion</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as  $user)
                                <tr>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->telefono}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        @if ($user->promocion)
                                            <span class="badge bg-primary text-light">{{$user->promocion->nombre}}</span>
                                        @else
                                            No tiene promociones
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")
<script>
    function exportar () {
        fetch('/reporte-export', {
            method:'POST',
            body: JSON.stringify({
                search: $("#search").val(),
                fecha_ingreso: $("#fecha_ingreso").val(),
                promocion: $("#promocion").val(),
                campanas: $("#campanas").val()
            }),
            dataType: 'json',
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).then(response => response.blob())
        .then(blob => {
            var url = window.URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = "data.xlsx";
            document.body.appendChild(a);
            a.click();    
            a.remove();       
        });
    }
</script>
@endsection

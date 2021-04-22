@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Crear Usuarios') }}</div>

                <div class="card-body">
                    <form action="/users" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="name" required id="">
                        </div>
                        <div class="form-group">
                            <label for="">Nombre de usuario</label>
                            <input type="text" class="form-control" name="nombre_usuario" required id="">
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" class="form-control" name="password" required id="">
                        </div>
                        <div class="form-group">
                            <label for="">Correo</label>
                            <input type="email" class="form-control" name="email" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="text" class="form-control" name="telefono" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Rol</label>
                            <select required class="form-select form-control" name="rol_id" aria-label="Default select example">
                                <option selected value="0">Seleccione una opcion</option>
                                @foreach ($roles as $item)
                                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                                @endforeach
                                
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="">Campañas</label>
                            <select class="form-select form-control" name="campanas[]"  multiple aria-label="multiple select example">
                                <option selected >Seleccione multiple opciones</option>
                                @foreach ($campanas as $item)
                                    <option value="{{$item->id}}"  >{{$item->nombre}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="">Promocion</label>
                            <select class="form-select form-control" name="promocion_tipo"  aria-label="multiple select example">
                                <option selected >Seleccione una opciones</option>
                                @foreach ($promociones as $item)
                                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

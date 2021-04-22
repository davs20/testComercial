@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    <form action="/users/{{$user->id}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}" required id="">
                        </div>
                        <div class="form-group">
                            <label for="">Nombre de usuario</label>
                            <input type="text" value="{{$user->nombre_usuario}}" class="form-control" name="nombre_usuario" required id="">
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" class="form-control" value="" name="password" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Correo</label>
                            <input type="email" class="form-control" value="{{$user->email}}" name="email" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="text" class="form-control" value="{{$user->telefono}}" name="telefono" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Rol</label>
                            <select required class="form-select form-control"  name="rol_id" aria-label="Default select example">
                                <option value="0">Seleccione un rol</option>
                                @foreach ($roles as $item)
                                        <option value="{{$item->id}}" {{($item->id == $user->rol_id) ? "selected" : "" }} >{{$item->nombre}}</option>
                                @endforeach
                                
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="">Campañas</label>
                            <select class="form-select form-control" name="campanas[]"  multiple aria-label="multiple select example">
                                <option  >Seleccione multiple opciones</option>
                                @foreach ($campanas as $item)
                                    <option value="{{$item->id}}" {{($item->id == in_array($item->id, $promocion_users)) ? "selected" : "" }} >{{$item->nombre}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="">Promocion</label>
                            <select class="form-select form-control" name="promocion_tipo"  aria-label="multiple select example">
                                <option >Seleccione una opciones</option>
                                @foreach ($promociones as $item)
                                    <option value="{{$item->id}}" {{($item->id == ($user->promocion ? $user->promocion->id : null)) ? "selected" : "" }} >{{$item->nombre}}</option>
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

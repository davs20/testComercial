@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>

                <div class="card-body">
                    <div class="container">
                        <div class="row mb-3 justify-content-center px-8">
                            <div class="col col">
                                <a href="/users/create" role="button" class="btn btn-success">Agregar</a>
                            </div>
                        </div>
                    </div>
                   
                   <div class="row">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Nombre de usuario</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Promocion</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as  $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->nombre_usuario}}</td>
                                <td>{{$user->rol->nombre}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->telefono}}</td>
                
                                <td>
                                    @if ($user->promocion_tipo)
                                        <span class="badge bg-primary text-light">{{$user->promocion->nombre}}</span>
                                    @else
                                        No tiene promocion
                                    @endif
                                </td>
                                
                                <td>
                                    <a role="button" id="{{$user->id}}" onclick="deleteUser(this);" href="#" class="btn  btn-danger btn-sm">
                                        <span class="material-icons">
                                            delete
                                            </span>
                                        </a>
                                     
                                        <a   role="button" href="/users/{{$user->id}}/edit" class="btn  btn-success btn-sm">
                                            <span class="material-icons"> mode_edit</span>
                                        </a>
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

@section('scripts')
<script>
  function deleteUser (event) {
    let accion = confirm("Desea eliminar este usuario ?");
       if (accion) {
           fetch('/users/' + event.id, {
               method:"DELETE",
               headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
               
           }).then(() => {
               window.location.reload();
           })
       }
    
       
    }
</script>
@endsection


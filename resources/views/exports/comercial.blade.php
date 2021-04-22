<table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Nombre de usuario</th>
        <th scope="col">Rol</th>
        <th scope="col">Correo</th>
        <th scope="col">Telefono</th>
        <th scope="col">Fecha de ingreso</th>
        <th scope="col">Promocion</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as  $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->nombre_usuario}}</td>
            <td>{{$user->rol->nombre}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->telefono}}</td>
            <td>{{$user->created_at}}</td>
            <td>
                {{$user->promocion->nombre}}
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
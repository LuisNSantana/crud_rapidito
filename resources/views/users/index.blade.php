<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        

    </head>
    <body>
        <div class="container">
            <!-- clase que hace referencia a fila -->
            <div class="row">
                <!-- clase que hace referencia a las columnas "col" -->
                <div  class="col-sm-8 mx-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <!-- clase de laravel para mostrar un error 'errors' -->
                            @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                    - {{ $error }} <br />
                                @endforeach
                            </div>
                        @endif
                        <form action="{{route('users.store')}}" method="POST">
                            <div class="form-row" style="display: flex;">
                                <div class="col-sm-3">
                                    <!-- Se utiliza el helper de laravel llamado old para tomar un valor anterior -->
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{old('name')}}">
                                </div>
                                <div class="col-sm-4">
                                    <input type="email" name="email" class="form-control" placeholder="Correo Electronico" value="{{old('email')}}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña" value="{{old('password')}}">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary"> Enviar</button>
                                </div>
                            </div>
                        </form>
                        </div>
                        
                        
                    </div>
                    </div>

                    <table class="table">
                        <!-- codigo de fila "thead es el encabezado" -->
                        <thead>
                            <!-- tr es fila -->
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>EMAIL</th>
                                 <!-- esto es una celda en espacio en blanco -->
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                         <!-- este es el contenido -->
                         <tbody>
                             @foreach ($users as $user)
                             <tr>
                                 <!-- entre llaves, es la forma que se seteamos y trabajamos los datos en laravel -->
                                 <td>{{$user->id}}</td>
                                 <td>{{$user->name}}</td>
                                 <td>{{$user->email}}</td>
                                 <td> <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    @method('DELETE')
                                    <!-- con esto le enviamos un token a laravel confirmando que el form que se envia es de nuestro proyecto y no externo -->
                                    @csrf
                                    <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm(`¿Desea eliminar el usuario?`)"></td>
                             </tr>
                                 
                             @endforeach
                         </tbody>
                    </table>
                    
                </div>  
            </div>    
        </div>  
    </body>
</html>

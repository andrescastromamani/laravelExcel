<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TIS</title>
</head>
<body>
    <div class="flex-center position-ref full-height">
     
        <div class="container mt-5">
            <h3>Importar Usuarios</h3>
     
            @if ( $errors->any() )
     
                <div class="alert alert-danger">
                    @foreach( $errors->all() as $error )<li>{{ $error }}</li>@endforeach
                </div>
            @endif
     
            @if(isset($numRows))
                <div class="alert alert-sucess">
                    Se importaron {{$numRows}} registros.
                </div>
            @endif
     
            <form action="{{route('usuarios.import')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-3">
                        <div class="custom-file">
                            <input type="file" name="usuarios" class="custom-file-input" id="usuarios">
                            <label class="custom-file-label" for="usuarios">Seleccionar archivo</label>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Importar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
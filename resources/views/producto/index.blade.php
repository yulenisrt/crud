@extends('adminlte::page')

@section('title', 'Dashboard Productos CRUD API')

@section('content_header')
    <h1>Dashboard Productos CRUD API</h1>
@stop

@section('content')
    <!-- href llama al metodo create del controlador articulos -->
<a href="productos/create" class="btn btn-primary">CREAR</a>
<table id="productos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Precio</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Categoria</th>
            <th scope="col">Imagen</th>
            <th scope="col">Rating</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productosArray as $producto)
        <tr>
            <td>{{ $producto['id'] }}</td>
            <td>{{ $producto['title'] }}</td>
            <td>{{ $producto['price'] }}</td>
            <td>{{ Illuminate\Support\Str::limit($producto['description'], 100, '') }}</td>
            <td>{{ $producto['category'] }}</td> 
            <td><img src="{{ $producto['image'] }}" alt="{{ $producto['title'] }}" width="100" height="100"></td>
            <td>{{ $producto['rating']['rate'] }} , {{ $producto['rating']['count'] }}</td>

            <td>
                <form action="{{route('productos.destroy',$producto['id'])}}" method="POST">
                    <a href="/productos/{{$producto['id']}}/edit" class="btn btn-info">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>         

        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"> 
@stop

@section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#productos').DataTable();
            });
        </script>
@stop
@extends('layouts.app')
@section('title', 'Prueba')

@section('content')
<div class="container-fluid p-0">
    <!-- Container Slogan -->
    <div class="col-12 bg-primario rounded-top mb-3">
        <div class="col-12 py-4">
            <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Control de Pagos</h1>
        </div>
    </div>
    <!-- Container Slogan -->

    <!-- Contenido -->
    <div class="row w-100 h-100 m-0 p-0">

        <div class="col-12">
            @include('layouts.partials.alerts')
        </div>

        <!-- desktop version -->
        <div class="row">
            <div class="col-12">
                <table class="table table-primaria d-none d-lg-table text-center align-center">
                    <thead class="table-head fw-bold">
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <th>Cuatrimestre</th>
                        <th>Concepto</th>
                        <th>Fecha de Pago</th>
                        <th>Monto</th>
                        <th>Estatus</th>
                        <th>Opciones</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody id="">
                        @forelse($items as $item) <!--items es la consulta que esta llegando-->
                        <tr class="d-none d-lg-table-row col-12">
                            <td class="col-2">{{ $item->matricula }}</td>
                            <td class="col-2">{{ $item->nombre }}</td>
                            <td class="col-2">{{ $item->cuatri }}</td>
                            <td class="col-1">{{ $item->concep }}</td>
                            <td class="col-2">{{ $item->fechap }}</td>
                            <td class="col-0">{{ $item->monto }}</td>
                            <td class="col-2">
                                <span
                                    @class([
                                        'badge bg-success' =>  $item->aceptado,
                                        'badge bg-danger'  => !$item->aceptado
                                    ])
                                >
                                    {{( $item->aceptado ) ? 'Aceptado' : 'Rechazado' }}
                                </span>
                            </td>
                            <td class="align-center col-1">
                              {{--  start botón de editar --}}
                                <div class="row justify-content-evenly w-100">
                                    <div class="col text-center px-0">
                                        <a href="{{ route('adminpagos.edit', $item) }}" class="btn btn-sm btn-primario text-white w-20" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                            </svg>
                                        </a>
                                    </div>
                                    {{--  end botón de editar --}}
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- desktop version End -->

        @foreach($items as $item)
        <!-- Mobile Version -->
        <div class="card shadow-lg my-3 py-3 mx-auto d-lg-none">
            <div class="card-title text-center fw-bold">{{ $item->matricula }}</div>
            <div class="card-body text-center">
                <p>{{$item->nombre}}</p>
                <p>{{$item->carre}}</p>
                @if($item->activo)
                <p class="badge bg-success">Activo</p>
                @else
                <p class="badge bg-danger">Inactivo</p>
                @endif
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col text-center">
                        <a href="{{ route('adminpagos.edit', $item) }}" class="btn btn-sm btn-primario text-white">Editar</a>
                    </div>
                    <div class="col text-center">
                        <form action="{{ route('adminpagos.toggle.status', $item) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="activo" @if($item->activo) value="0" @else value="1" @endif>
                            <input type="submit" @if($item->activo) value="Desactivar" @else value="Activar" @endif
                            @class([
                            'btn-secundario text-white btn btn-sm' => $item->activo,
                            'btn-success btn btn-sm' => !$item->activo ])
                            onclick="return confirm('¿Seguro que Deseas Desactivar?')">
                        </form>
                    </div>
                    @if(!$item->activo)
                    <div class="col text-center">
                        <form action="{{ route('adminpagos.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="btn btn-sm btn-secundario text-white" onclick="return confirm('¿Seguro que Deseas Eliminar?')">
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Mobile Version End -->
        @endforeach
    </div>
    <!-- Contenido End -->

    <!-- Links -->
    <div class="row my-3 w-100 h-100 p-0">
        <div class="col-12 col-md-3">
            <p class="text-secondary text-center fst-italic">Mostrando {{ $items->count() }} resultados de {{ $items->total() }}</p>
        </div>
        <div class="col-12 col-md-9">
            {{ $items->links() }}
        </div>
    </div>
    <!-- Links End -->
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(() => {
        $('#select-number-items').change(() => {
            $('#form-number-items').submit();
        });
    });
</script>
@endsection

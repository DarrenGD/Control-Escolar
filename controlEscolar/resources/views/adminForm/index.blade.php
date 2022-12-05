@extends('layouts.app')
@section('title', 'Prueba')

@section('content')
<div class="container-fluid p-0">
    <!-- Container Slogan -->
    <div class="col-12 bg-primario rounded-top mb-3">
        <div class="col-12 py-4">
            <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Reporte de Encuestas Contestadas</h1>
            <p class="text-white text-center fs-6 fw-light">Información de alumnos de nuevo ingreso</p>
        </div>
    </div>
    <!-- Container Slogan -->

    <!-- Contenido -->
    <div class="row w-100 h-100 m-0 p-0">

        <!-- Header Section -->
        <form action="{{ route('adminForm.index') }}" method="POST" class="row w-100 p-0 mx-auto align-items-center" id="form-number-items">
            <div class="col-12 col-md-4 text-center my-2">
                @csrf
                @method('GET')
                <select name="paginate" id="select-number-items">
                    <option value="10" @if($items->count() == '10') selected @endif >10</option>
                    <option value="50" @if($items->count() == '50') selected @endif >50</option>
                    <option value="100" @if($items->count() == '100') selected @endif >100</option>
                    <option value="250" @if($items->count() == '250') selected @endif >250</option>
                </select>
            </div>
            <div class="col-12 col-md-4 text-center my-2 d-flex">
                <input autocomplete="off" type="text" name="q" placeholder="Buscar..." class="form-control me-2">
                <input type="submit" value="Buscar" class="btn btn-primario text-white">
            </div>
        </form>
        <!-- Header Section -->

        <div class="col-12">
            @include('layouts.partials.alerts')
        </div>

        <!-- desktop version -->
        <div class="row">
            <div class="col-12">
                <table class="table table-primaria d-none d-lg-table text-center align-center">
                    <thead class="table-head fw-bold">
                        <th>matricula</th>
                        <th>nombre</th>
                        <th>sexo</th>
                        <th>correo</th>
                        <th>carrera</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody id="">
                        @forelse($items as $item) <!--items es la consulta que esta llegando-->
                        <tr class="d-none d-lg-table-row col-12">
                            <td class="col-2">{{ $item->matricula }}</td>
                            <td class="col-2">{{ $item->nombre }}</td>
                            <td class="col-1">{{ $item->sexo }}</td>
                            <td class="col-2">{{ $item->correo }}</td>
                            <td class="col-3">{{ $item->carre}}</td>
                            <td class="align-center col-2">
                                {{--  start botón de editar --}}
                                <div class="row justify-content-evenly w-100">
                                    <div class="col text-center px-0">
                                        <a href="{{ route('adminForm.edit', $item) }}" class="btn btn-sm btn-primario text-white w-20" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                            </svg>
                                        </a>
                                    </div>
                                {{--  end botón de editar --}}
                                </div>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- desktop version End -->
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

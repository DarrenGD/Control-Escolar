@extends('layouts.app')
@section('title', 'Consulta Alumnos')

@section('content')
    <div class="container-fluid p-0">
        <!-- Container Slogan -->
        <div class="col-12 bg-primario rounded-top mb-3">
            <div class="col-12 py-4">
                <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Consulta Alumnos</h1>
                <h1 class="text-white fw-bold text-uppercase text-center fs-6 fw-light">

                        Ciclo Escolar: {{ $datos->ciclo }} &nbsp;
                        Carrera: {{ $datos->carrera }}. &nbsp;
                        Grupo: {{ $datos->grupo }}

                </h1>
            </div>
        </div>
        <!-- Container Slogan -->

        <!-- Contenido -->
        <div class="row w-100 h-100 m-0 p-0">

            <!-- Header Section -->
            <form action="{{ route('detalle_grupos', ['id' => $idg]) }}" method="POST"
                class="row w-100 p-0 mx-auto align-items-center" id="form-number-items">
                <div class="col-12 col-md-4 text-center my-2">
                    @csrf
                    @method('GET')

                </div>
                <div class="col-11 col-md-4 text-center my-2 d-flex">
                    <input autocomplete="off" type="text" name="q" placeholder="Buscar..."
                        class="form-control me-2">
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
                            <th>Matricula</th>
                            <th>Nombre</th>
                            <th>Pago</th>
                            <th>Perfil</th>
                        </thead>
                        <tbody id="">
                            @forelse($usuarios as $usuario)
                                <tr class="d-none d-lg-table-row">
                                    <td class="col-3">
                                        {{ $usuario->matricula }}
                                    </td>
                                    <td class="col-3">
                                        {{ $usuario->nombrecompleto }}
                                    </td>
                                    <td class="col-3">
                                        {{ $usuario->pago }}
                                    </td>
                                    <td class="col-3">
                                        {{ $usuario->perfil }}
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-8">
            </div>
            <div class="col-4">
                <a href="{{ route('detalle_carreras', ['id' => $datos->idca, 'idce' => $datos->idce]) }}"
                    class="btn btn-primario text-white btn-sm d-block mx-auto w-50">Regresar</a>
            </div>
            <!-- desktop version End -->

            @forelse($usuarios as $usuario)
                <!-- Mobile Version -->
                <div class="card shadow-lg my-3 py-3 mx-auto d-lg-none">
                    <div class="card-title text-center fw-bold">Matricula: </div>
                    <div class="card-body text-center">
                        <p>Información Personal: </p>
                    </div>
                    <div class="card-footer">
                        <div class="row">

                        </div>
                    </div>
                </div>
                <!-- Mobile Version End -->
            @empty
            @endforelse

        </div>
        <!-- Contenido End -->

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

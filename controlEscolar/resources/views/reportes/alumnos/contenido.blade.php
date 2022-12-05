<div class="row">
    <div class="col-12">
        <table class="table table-primaria d-none d-lg-table text-center align-center">
            <thead class="table-head fw-bold">
                <th>Carreras</th>
                <th>Alumnos</th>
                <th>Completados</th>
                <th>Porcentaje</th>
                <th>Pendientes</th>
                <th>Opciones</th>
                <th>&nbsp;</th>
            </thead>
            <tbody id="">
                @foreach ($listas as $lista)
                <tr class="d-none d-lg-table-row col-12">
                    <td class="align-center col-4">{{ $lista->nombre }}</td>
                    <td class="align-center col-2">{{ $lista->cuantos }}</td>
                    <td class="align-center col-2">{{ $lista->completos }}</td>
                    <td class="align-center col-1">{{ $lista->porcentaje }}</td>
                    <td class="align-center col-1">{{ $lista->restan }}</td>

                    <td class="align-center col-4">
                        <a href="{{ route('detalle_carreras', ['id' => $lista->idca, 'idce' => $idce]) }}"
                            class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Detalle</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@extends('layouts.app')
@section('title', 'Áreas')

@section('content')
<!-- General Container -->
<div class="container-fluid p-0">
    <!-- Form Container -->
    <div class="container-fluid">
        <div class="row justify-content-center">

            <!-- Container Slogan -->
            <div class="col-12 bg-primario rounded-top mb-3">
                <div class="col-12 py-4">
                    <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Modificar Pago</h1>
                    <p class="text-white text-center fs-6 fw-light"></p>
                </div>
            </div>
            <!-- Container Slogan -->

            <!-- Form -->
            <form action="{{ route('adminpagos.update', $consulta) }}" class="form" method="POST" enctype ="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Hide Section Button -->
                <div class="row justify-content-center">
                    <button id="btn-general-information" class="col-12 col-lg-10 border-0 text-white btn btn-primary mt-3 mb-1">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-8 text-start">
                                <span class="w-100">Información General</span>
                            </div>
                            <div class="col-2 text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                        </div>
                    </button>
                </div>
                <!-- Hide Section Button End -->

                <!-- Personal Information Section -->
                <br>
                <section id="general-information" class="col-12 col-lg-12" >
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">
                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('matricula'), 'form-control is-invalid' => $errors->first('matricula')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{ $consulta->matricula }}"
                                    name="matricula" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    readonly='readonly'>
                                <label for="input-text">Matricula del Estudiante</label>

                                @if($errors->first('matricula'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('matricula') }}</i>
                                </div>
                                @endif
                            </div>

                            <div class="form-floating my-2">
                            <input
                                @class(['form-control'=> !$errors->first('nombre'), 'form-control is-invalid' => $errors->first('nombre')])
                                autocomplete="off"
                                type="text"
                                value="{{$consulta->nombre}}"
                                name="nombre" {{-- <-- Nombre del Campo --}}
                                placeholder="input-text"
                                id="input-text"
                                readonly='readonly'>
                                <label for="input-text">Nombre del estudiante</label>

                                @if($errors->first('nombre'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('nombre') }}</i>
                                </div>
                                @endif
                            </div>
                            <!-- Input Text End -->

                            <!-- Input Select -->
                            <div class="form-floating my-2">
                                <select name="idc" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'idc' ) }}" placeholder="Seleccione un Cuatrimestre" readonly='readonly'>
                                    <option value="{{$consulta->idc}}"selected>{{$consulta->cuatri}}</option>
                                    @foreach($cuatrimestres as $cuat)
                                    <option value="{{$cuat->idc}}">{{$cuat->nombre}}</option>
                                    @endforeach
                                </select>
                                <label for="input-text">Seleccione un Cuatrimestre</label>

                                @if($errors->first('idc'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('idc') }}</i>
                                </div>
                                @endif
                            </div>
                            <!-- Input Select End -->

                            <!-- Input Select -->
                            <div class="form-floating my-2">
                                <select name="idce" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'idce' ) }}" placeholder="Seleccione Ciclo Escolar" readonly='readonly'>
                                    <option value="{{$consulta->idce}}"selected>{{$consulta->cies}}</option>
                                    @foreach($cicloescolar as $ce)
                                    <option value="{{$ce->idce}}">{{$ce->nombre}}</option>
                                    @endforeach
                                </select>
                                <label for="input-text">Seleccione Ciclo Escolar</label>

                                @if($errors->first('idce'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('idce') }}</i>
                                </div>
                                @endif
                            </div>
                            <!-- Input Select End -->

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('correo'), 'form-control is-invalid' => $errors->first('correo')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->correo}}"
                                    name="correo" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    readonly='readonly'>
                                <label for="input-text">Correo Electrónico Personal</label>

                                @if($errors->first('correo'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('correo') }}</i>
                                </div>
                                @endif

                            </div>
                            <div class="form-floating my-2">
                                <input maxlength="10"
                                    @class(['form-control'=> !$errors->first('celular'), 'form-control is-invalid' => $errors->first('celular')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->celular}}"
                                    name="celular" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    readonly='readonly'>
                                <label for="input-text">Teléfono Movil</label>

                                @if($errors->first('celular'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('celular') }}</i>
                                </div>
                                @endif
                            </div>
                            <!-- Input Text End -->

                            <!-- Input Select -->
                            <div class="form-floating my-2">
                                <select name="idcp" {{-- <-- Nombre del Campo --}} id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'idcp' ) }}" placeholder="Concepto de Pago" readonly='readonly'>
                                    <option value="{{$consulta->idcp}}"selected>{{$consulta->concep}}</option>
                                    @foreach($conceptos as $conc)
                                    <option value="{{$conc->idcp}}">{{$conc->nombre}}</option>
                                    @endforeach
                                </select>
                                <label for="input-text">Seleccione un Concepto</label>

                                @if($errors->first('idcp'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('idcp') }}</i>
                                </div>
                                @endif
                            </div>
                            <!-- Input Select End -->

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input maxlength="20"
                                    @class(['form-control'=> !$errors->first('referenciap'), 'form-control is-invalid' => $errors->first('referenciap')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->referenciap}}"
                                    name="referenciap" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    readonly='readonly'>
                                <label for="input-text">Referencia de Pago</label>

                                @if($errors->first('referenciap'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('referenciap') }}</i>
                                </div>
                                @endif
                            </div>
                            <!-- Input Text End -->

                            <!-- star foto -->
                            <div class="form-group">
                                    @if($errors->first('foto'))
                                        <i class='text-danger'> {{ $errors->first('foto') }} </i>
                                    @endif
                                    <input type="file" name='foto' class="form-control" accept=".png, .jpg, .jpeg" disabled>
                            </div>

                            <div class="card form-floating my-2" style="width: 15rem;">
                                    <a href="{{asset('archivos/' . $consulta->foto)}}" target="_blank"><img src="{{asset('archivos/' . $consulta->foto)}}" class="card-img-top"></a>
                                        <div class="card-body">
                                            <p class="card-text">Ver foto</p>
                                        </div>
                            </div>
                            <!-- end foto -->

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('fechap'), 'form-control is-invalid' => $errors->first('fechap')])
                                    autocomplete="off"
                                    type="date"
                                    value="{{$consulta->fechap}}"
                                    name="fechap" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    readonly='readonly'>
                                <label for="input-text">Fecha de Pago</label>

                                @if($errors->first('fechap'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('fechap') }}</i>
                                </div>
                                @endif
                            </div>
                            <!-- Input Text End -->

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('monto'), 'form-control is-invalid' => $errors->first('monto')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->monto}}"
                                    name="monto" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    readonly='readonly'>
                                <label for="input-text">Monto</label>

                                @if($errors->first('monto'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('monto') }}</i>
                                </div>
                                @endif
                            </div>
                            <!-- Input Text End -->

                            <!-- Input Radios -->
                            <div class="form-check my-2">
                                <div class="row items-center justify-content-center">
                                    <h3 class="text-start  fs-6">Activo</h3>

                                    <!-- Input Radio -->
                                    <div class="col-6 d-md-flex justify-content-center">
                                        <div>
                                            <input class="form-check-input mx-auto" name="aceptado"{{-- <-- Nombre del Campo --}} type="radio" id="opcion-1" value="1" required @if($consulta->aceptado) checked @endif>
                                            <label class="form-check-label ms-1" for="opcion-1"> Si </label>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->

                                    <!-- Input Radio -->
                                    <div class="col-6 d-md-flex justify-content-center">
                                        <div>
                                            <input class="form-check-input mx-auto" name="aceptado"{{-- <-- Nombre del Campo --}} type="radio" id="opcion-2" value="0" required @if(!$consulta->aceptado) checked @endif> <!-- ! es una negacion -->
                                            <label class="form-check-label ms-1" for="opcion-2"> No </label>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->

                                </div>
                            </div>
                            <!-- Input Radios End -->

                            {{-- Input TextArea --}}
                            <div class="form-floating my-2">
                                <textarea
                                    @class(['form-control'=> !$errors->first('observaciones'), 'form-control is-invalid' => $errors->first('observaciones')])
                                    name="observaciones"{{-- <-- Nombre del Campo --}}
                                    id="description-textarea"
                                    style="height: 10rem"
                                    value="{{ old('observaciones') }}"
                                    required>
                                </textarea>
                                <label for="description-textarea">Observaciones</label>
                                @if($errors->first('observaciones'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('observaciones') }}</i>
                                </div>
                                @endif
                            </div>
                            {{-- Input TextArea End --}}


                        </div>
                    </div>
                </section>
                <!-- Personal Information Section End -->
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-3">
                        <button type="submit" class="btn btn-md d-block w-100 text-white btn-primario">Guardar</button>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-5">
                    <a title="Regresar" href="{{ route('adminpagos.index') }}" class="text-end fs-6 text-secundario"><img src="{{ asset('img/regresa.jpg')}}" width="30" height="30"></a>
                </div>
            </form>
            <!-- Form End -->
        </div>
    </div>
    <!-- Form Container End -->
</div>
<!-- General container End -->
@endsection

@section('scripts')
<script>
    $('#btn-general-information').click((e) => {
        e.preventDefault();
        $('#general-information').toggle(500);
    });
</script>
@endsection

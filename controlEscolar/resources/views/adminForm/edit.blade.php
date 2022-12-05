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
                    <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Datos del alumno</h1>
                    <p class="text-white text-center fs-6 fw-light">Estudiante: {{ $consulta->nombre }}</p>
                </div>
            </div>
            <!-- Container Slogan -->

            <!-- Form -->
            <form action="{{ route('adminForm.update',$consulta) }}" class="form" method="POST">
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
                        
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#tab1">Datos personales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tab2">Historial academico</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tab3">Estado Familiar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tab4">Domicilio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tab5">Procedencia</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tab6">Perfil Medico</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tab7">Estado Laboral</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tab8">Tutor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tab9">Publicidad</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade show active" id="tab1"> <!--TAB 1-->
                                    <div class="form-floating my-2"> <!--NOMBRE DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('nombre'), 'form-control is-invalid' => $errors->first('nombre')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->nombre}}"
                                            name="nombre" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="nombre"
                                            readonly>
                                            <label for="input-text">Nombre del estudiante</label>
                                            @if($errors->first('nombre'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('nombre') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN NOMBRE DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--SEXO DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('sexo'), 'form-control is-invalid' => $errors->first('sexo')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->sexo}}"
                                            name="sexo" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="input-text"
                                            readonly>
                                            <label for="input-text">Sexo del estudiante</label>
                                            @if($errors->first('sexo'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('sexo') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN SEXO DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--MATRICULA DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('matricula'), 'form-control is-invalid' => $errors->first('matricula')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->matricula}}"
                                            name="matricula" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="input-text"
                                            readonly>
                                            <label for="input-text">Matricula del estudiante</label>
                                            @if($errors->first('matricula'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('matricula') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN MATRICULA DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--EDAD DEL ALUMNO-->
                                        <input maxlength="2"
                                            @class(['form-control'=> !$errors->first('edad'), 'form-control is-invalid' => $errors->first('edad')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->edad}}"
                                            name="edad" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="edad"
                                            readonly>
                                            <label for="input-text">Edad del estudiante</label>
                                            @if($errors->first('edad'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('edad') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN EDAD DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--CURP DEL ALUMNO-->
                                        <input maxlength="18"
                                            @class(['form-control'=> !$errors->first('curp'), 'form-control is-invalid' => $errors->first('curp')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->curp}}"
                                            name="curp" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="curp"
                                            readonly>
                                            <label for="input-text">Curp del estudiante</label>
                                            @if($errors->first('curp'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('curp') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN CURP DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--RFC DEL ALUMNO-->
                                        <input maxlength="13"
                                            @class(['form-control'=> !$errors->first('rfc'), 'form-control is-invalid' => $errors->first('rfc')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->rfc}}"
                                            name="rfc" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="rfc"
                                            readonly>
                                            <label for="input-text">RFC del estudiante</label>
                                            @if($errors->first('rfc'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('rfc') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN RFC DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--CORREO DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('correo'), 'form-control is-invalid' => $errors->first('correo')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->correo}}"
                                            name="correo" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="correo"
                                            readonly>
                                            <label for="input-text">Correo del estudiante</label>
                                            @if($errors->first('Correo'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('Correo') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN CORREO DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--NACIMIENTO DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('nacimiento'), 'form-control is-invalid' => $errors->first('nacimiento')])
                                            autocomplete="off"
                                            type="date"
                                            value="{{$consulta->nacimiento}}"
                                            name="nacimiento" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="nacimiento"
                                            readonly>
                                            <label for="input-text">Nacimiento del estudiante</label>
                                            @if($errors->first('nacimiento'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('nacimiento') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN NACIMIENTO DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--TEL_CELULAR DEL ALUMNO-->
                                        <input maxlength="10"
                                            @class(['form-control'=> !$errors->first('tel_celular'), 'form-control is-invalid' => $errors->first('tel_celular')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->tel_celular}}"
                                            name="tel_celular" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="tel_celular"
                                            readonly>
                                            <label for="input-text">Telefono celular del estudiante</label>
                                            @if($errors->first('tel_celular'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('tel_celular') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN TEL_CELULAR DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--TEL_DOMICILIO DEL ALUMNO-->
                                        <input maxlength="10"
                                            @class(['form-control'=> !$errors->first('tel_domicilio'), 'form-control is-invalid' => $errors->first('tel_domicilio')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->tel_domicilio}}"
                                            name="tel_domicilio" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="tel_domicilio"
                                            readonly>
                                            <label for="input-text">Telefono domiciliario del estudiante</label>
                                            @if($errors->first('tel_domicilio'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('tel_domicilio') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN TEL_DOMICILIO DEL ALUMNO-->
                                </div> <!--FIN TAB 1-->

                                <div class="tab-pane fade" id="tab2"> <!--TAB 2-->
                                    <div class="form-floating my-2"> <!--INSTITUCION DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('institucion'), 'form-control is-invalid' => $errors->first('institucion')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->institucion}}"
                                            name="institucion" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="institucion"
                                            readonly>
                                            <label for="input-text">Institucion proveniente del estudiante</label>
                                            @if($errors->first('institucion'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('institucion') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN INSTITUCION DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--AREA DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('area'), 'form-control is-invalid' => $errors->first('area')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->area}}"
                                            name="area" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="area"
                                            readonly>
                                            <label for="input-text">Area tecnológica del estudiante</label>
                                            @if($errors->first('area'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('area') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN AREA DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--PROMEDIO DEL ALUMNO-->
                                        <input maxlength="2"
                                            @class(['form-control'=> !$errors->first('pro_general'), 'form-control is-invalid' => $errors->first('pro_general')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->pro_general}}"
                                            name="pro_general" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="pro_general"
                                            readonly>
                                            <label for="input-text">Promedio general del estudiante</label>
                                            @if($errors->first('pro_general'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('pro_general') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN PROMEDIO DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!-- INGRESO DEL ALUMNO -->
                                        <select name="año_ingreso" {{-- <-- Nombre del Campo --}} id="role_select1" class="form-select form-control" autocomplete="off" placeholder="Seleccione el año" readonly>
                                            <option value="{{$consulta->año_ingreso}}">{{$consulta->año_ingreso}}</option>
                                            @foreach(range(date('Y')-30, date('Y')) as $y)
                                                <option value='{{$y}}'>{{$y}}</option>
                                            @endforeach
                                        </select>
                                        <label for="input-text">Seleccione el año</label>
                                    </div> <!-- FIN INGRESO ALUMNO -->

                                    <div class="form-floating my-2"> <!-- EGRESO DEL ALUMNO -->
                                        <select name="año_egreso" {{-- <-- Nombre del Campo --}} id="role_select2" class="form-select form-control" autocomplete="off" placeholder="Seleccione el año" readonly>
                                            <option value="{{$consulta->año_egreso}}">{{$consulta->año_egreso}}</option>
                                            @foreach(range(date('Y')-30, date('Y')) as $y)
                                                <option value='{{$y}}'>{{$y}}</option>
                                            @endforeach
                                        </select>
                                        <label for="input-text">Seleccione el año</label>
                                    </div> <!-- FIN EGRESO ALUMNO -->

                                    <div class="form-floating my-2"> <!-- TEXTO DEL ALUMNO -->
                                        <textarea
                                            @class(['form-control'=> !$errors->first('beca'), 'form-control is-invalid' => $errors->first('beca')])
                                            name="beca"{{-- <-- Nombre del Campo --}}
                                            id="beca"
                                            style="height: 10rem"
                                            value="{{$consulta->beca}}"
                                            readonly>
                                            {{$consulta->beca}}
                                        </textarea>
                                        <label for="description-textarea">Descripción</label>
                                        @if($errors->first('beca'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('beca') }}</i>
                                        </div>
                                        @endif
                                    </div> <!-- FIN TEXTO DEL ALUMNO -->
                                </div> <!--FIN TAB 2-->

                                <div class="tab-pane fade" id="tab3"> <!--TAB 3-->
                                    <div class="form-floating my-2"> <!-- ESTADO CIVIL DEL ALUMNO -->
                                        <select name="estado_civil" {{-- <-- Nombre del Campo --}} id="role_select3" class="form-select form-control" autocomplete="off" placeholder="Estado civil" readonly>
                                            <option value="{{$consulta->estado_civil}}">{{$consulta->estado_civil}}</option>
                                            <option value='Solter@'>Solter@</option>
                                            <option value='Casad@'>Casad@</option>
                                            <option value='Viud@'>Viud@</option>
                                            <option value='Divorciad@'>Divorciad@</option>
                                        </select>
                                        <label for="input-text">Selecciona tu estado civil</label>
                                    </div> <!-- FIN ESTADO CIVIL ALUMNO -->

                                    <div class="form-floating my-2"> <!-- HIJOS DEL ALUMNO -->
                                        <select name="hijos" {{-- <-- Nombre del Campo --}} id="role_select4" class="form-select form-control" autocomplete="off" placeholder="Número de hijos" readonly>
                                            <option value="{{$consulta->hijos}}">{{$consulta->hijos}}</option>
                                            @foreach(range(1, 10) as $y)
                                                <option value='{{$y}}'>{{$y}}</option>
                                            @endforeach
                                            <option value='Ninguno'>Ninguno</option>
                                        </select>
                                        <label for="input-text">Selecciona el número de hijos</label>
                                    </div> <!-- FIN HIJOS ALUMNO -->

                                    <div class="form-floating my-2"> <!-- VIVE DEL ALUMNO -->
                                        <select name="vive_con" {{-- <-- Nombre del Campo --}} id="role_select5" class="form-select form-control" autocomplete="off" placeholder="¿Con quien vives?" readonly>
                                            <option value="{{$consulta->vive_con}}">{{$consulta->vive_con}}</option>
                                            <option value='Padre y Madre'>Padre y Madre</option>
                                            <option value='Solo'>Solo</option>
                                            <option value='Un familiar'>Un familiar</option>
                                        </select>
                                        <label for="input-text">Selecciona con quien vives actualmente</label>
                                    </div> <!-- FIN VIVE ALUMNO -->
                                </div> <!--FIN TAB 3-->

                                <div class="tab-pane fade" id="tab4"> <!--TAB 4-->
                                    <div class="form-floating my-2"> <!--CALLE DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('calle'), 'form-control is-invalid' => $errors->first('calle')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->calle}}"
                                            name="calle" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="calle"
                                            readonly>
                                            <label for="input-text">Calle del estudiante</label>
                                            @if($errors->first('calle'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('calle') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN CALLE DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--NUM_EXTERIOR DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('num_exterior'), 'form-control is-invalid' => $errors->first('num_exterior')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->num_exterior}}"
                                            name="num_exterior" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="num_exterior"
                                            readonly>
                                            <label for="input-text">Número exterior del estudiante</label>
                                            @if($errors->first('num_exterior'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('num_exterior') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN NUM_EXTERIOR DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--NUM_INTERIOR DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('num_interior'), 'form-control is-invalid' => $errors->first('num_interior')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->num_interior}}"
                                            name="num_interior" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="num_interior"
                                            readonly>
                                            <label for="input-text">Número interior del estudiante</label>
                                            @if($errors->first('num_interior'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('num_interior') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN NUM_INTERIOR DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--COLONIA DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('colonia'), 'form-control is-invalid' => $errors->first('colonia')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->colonia}}"
                                            name="colonia" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="colonia"
                                            readonly>
                                            <label for="input-text">Colonia del estudiante</label>
                                            @if($errors->first('colonia'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('colonia') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN COLONIA DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--CODIGO POSTAL DEL ALUMNO-->
                                        <input maxlength="5"
                                            @class(['form-control'=> !$errors->first('codigo_postal'), 'form-control is-invalid' => $errors->first('codigo_postal')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->codigo_postal}}"
                                            name="codigo_postal" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="codigo_postal"
                                            readonly>
                                            <label for="input-text">Código postal del estudiante</label>
                                            @if($errors->first('codigo_postal'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('codigo_postal') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN CODIGO POSTAL DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--ESTADO DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('estado'), 'form-control is-invalid' => $errors->first('estado')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->estado}}"
                                            name="estado" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="estado"
                                            readonly>
                                            <label for="input-text">Estado del estudiante</label>
                                            @if($errors->first('estado'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('estado') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN ESTADO DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--MUNICIPIO DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('municipio'), 'form-control is-invalid' => $errors->first('municipio')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->municipio}}"
                                            name="municipio" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="municipio"
                                            readonly>
                                            <label for="input-text">Municipio del estudiante</label>
                                            @if($errors->first('municipio'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('municipio') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN MUNICIPIO DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--LOCALIDAD DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('localidad'), 'form-control is-invalid' => $errors->first('localidad')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->localidad}}"
                                            name="localidad" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="localidad"
                                            readonly>
                                            <label for="input-text">Localidad del estudiante</label>
                                            @if($errors->first('localidad'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('localidad') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN LOCALIDAD DEL ALUMNO-->
                                </div> <!--FIN TAB 4-->

                                <div class="tab-pane fade" id="tab5"> <!--TAB 5-->
                                    <div class="form-floating my-2"> <!--PAIS DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('pais_naci'), 'form-control is-invalid' => $errors->first('pais_naci')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->pais_naci}}"
                                            name="pais_naci" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="pais_naci"
                                            readonly>
                                            <label for="input-text">Pais de nacimiento del estudiante</label>
                                            @if($errors->first('pais_naci'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('pais_naci') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN PAIS DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--ESTADO DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('estado_naci'), 'form-control is-invalid' => $errors->first('estado_naci')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->estado_naci}}"
                                            name="estado_naci" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="estado_naci"
                                            readonly>
                                            <label for="input-text">Estado de nacimiento del estudiante</label>
                                            @if($errors->first('estado_naci'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('estado_naci') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN ESTADO DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--MUNICIPIO DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('municipio_naci'), 'form-control is-invalid' => $errors->first('municipio_naci')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->municipio_naci}}"
                                            name="municipio_naci" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="municipio_naci"
                                            readonly>
                                            <label for="input-text">Municipio de nacimiento del estudiante</label>
                                            @if($errors->first('municipio_naci'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('municipio_naci') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN MUNICIPIO DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--GRUPO ETNICO DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('grupo_etnico'), 'form-control is-invalid' => $errors->first('grupo_etnico')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->grupo_etnico}}"
                                            name="grupo_etnico" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="grupo_etnico"
                                            readonly>
                                            <label for="input-text">Grupo etnico del estudiante</label>
                                            @if($errors->first('grupo_etnico'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('grupo_etnico') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN GRUPO ETNICO DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!--LENGUA DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('lengua'), 'form-control is-invalid' => $errors->first('lengua')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->lengua}}"
                                            name="lengua" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="lengua"
                                            readonly>
                                            <label for="input-text">Lengua del estudiante</label>
                                            @if($errors->first('lengua'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('lengua') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN LENGUA DEL ALUMNO-->
                                </div> <!--FIN TAB 5-->

                                <div class="tab-pane fade" id="tab6"> <!--TAB 6-->
                                    <div class="form-floating my-2"> <!-- SANGRE DEL ALUMNO -->
                                        <select name="sangre" {{-- <-- Nombre del Campo --}} id="role_select6" class="form-select form-control" autocomplete="off" placeholder="Tipo de sangre" readonly>
                                            <option value="{{$consulta->sangre}}">{{$consulta->sangre}}</option>
                                            <option value='A+'>A+</option>
                                            <option value='A-'>A-</option>
                                            <option value='B+'>B+</option>
                                            <option value='B-'>B-</option>
                                            <option value='AB+'>AB+</option>
                                            <option value='AB'>AB-</option>
                                            <option value='O+'>O+</option>
                                            <option value='O-'>O-</option>
                                        </select>
                                        <label for="input-text">Selecciona tu tipo de sangre</label>
                                    </div> <!-- FIN SANGRE ALUMNO -->

                                    <div class="form-floating my-2"> <!--SEGURO SOCIAL DEL ALUMNO-->
                                        <input maxlength="9"
                                            @class(['form-control'=> !$errors->first('seguro_social'), 'form-control is-invalid' => $errors->first('seguro_social')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->seguro_social}}"
                                            name="seguro_social" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="seguro_social"
                                            readonly>
                                            <label for="input-text">Número de seguro social del estudiante</label>
                                            @if($errors->first('seguro_social'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('seguro_social') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN SEGURO SOCIAL DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!-- NUMERO CLINICA DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('num_clinica'), 'form-control is-invalid' => $errors->first('num_clinica')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->num_clinica}}"
                                            name="num_clinica" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="num_clinica"
                                            readonly>
                                            <label for="input-text">Número de la clinica del estudiante</label>
                                            @if($errors->first('num_clinica'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('num_clinica') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN NUMERO CLINICA DEL ALUMNO-->

                                    <BR>

                                    <h3 class="text-start  fs-6">¿Tienes enfermedades? Menciona cuales, de lo contrario escribe NINGUNO</h3>
                                    <div class="form-floating my-2"> <!-- ENFERMEDADES DEL ALUMNO -->
                                        <textarea
                                            @class(['form-control'=> !$errors->first('enfermedades'), 'form-control is-invalid' => $errors->first('enfermedades')])
                                            name="enfermedades"{{-- <-- Nombre del Campo --}}
                                            id="enfermedades"
                                            style="height: 4rem"
                                            value="{{$consulta->enfermedades}}"
                                            readonly>
                                            {{$consulta->enfermedades}}
                                        </textarea>
                                        <label for="description-textarea">Descripción</label>
                                        @if($errors->first('enfermedades'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('enfermedades') }}</i>
                                        </div>
                                        @endif
                                    </div> <!-- FIN ENFERMEDADES DEL ALUMNO -->

                                    <h3 class="text-start  fs-6">¿Tienes discapacidades? Menciona cuales, de lo contrario escribe NINGUNO</h3>
                                    <div class="form-floating my-2"> <!-- DISCAPACIDADES DEL ALUMNO -->
                                        <textarea
                                            @class(['form-control'=> !$errors->first('discapacidades'), 'form-control is-invalid' => $errors->first('discapacidades')])
                                            name="discapacidades"{{-- <-- Nombre del Campo --}}
                                            id="discapacidades"
                                            style="height: 4rem"
                                            value="{{$consulta->discapacidades}}"
                                            readonly>
                                            {{$consulta->discapacidades}}
                                        </textarea>
                                        <label for="description-textarea">Descripción</label>
                                        @if($errors->first('discapacidades'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('discapacidades') }}</i>
                                        </div>
                                        @endif
                                    </div> <!-- FIN DISCAPACIDADES DEL ALUMNO -->

                                    <h3 class="text-start  fs-6">¿Tienes alergias? Menciona cuales, de lo contrario escribe NINGUNO</h3>
                                    <div class="form-floating my-2"> <!-- ALERGIAS DEL ALUMNO -->
                                        <textarea
                                            @class(['form-control'=> !$errors->first('alergias'), 'form-control is-invalid' => $errors->first('alergias')])
                                            name="alergias"{{-- <-- Nombre del Campo --}}
                                            id="alergias"
                                            style="height: 4rem"
                                            value="{{$consulta->alergias}}"
                                            readonly>
                                            {{$consulta->alergias}}
                                        </textarea>
                                        <label for="description-textarea">Descripción</label>
                                        @if($errors->first('alergias'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('alergias') }}</i>
                                        </div>
                                        @endif
                                    </div> <!-- FIN ALERGIAS DEL ALUMNO -->

                                    <h3 class="text-start  fs-6">¿Te encuentras afiliado con una clinica? Menciona cual, de lo contrario escribe NINGUNO</h3>
                                    <div class="form-floating my-2"> <!-- AFILIADO DEL ALUMNO -->
                                        <textarea
                                            @class(['form-control'=> !$errors->first('afiliado_clinica'), 'form-control is-invalid' => $errors->first('afiliado_clinica')])
                                            name="afiliado_clinica"{{-- <-- Nombre del Campo --}}
                                            id="afiliado_clinica"
                                            style="height: 4rem"
                                            value="{{$consulta->afiliado_clinica}}"
                                            readonly>
                                            {{$consulta->afiliado_clinica}}
                                        </textarea>
                                        <label for="description-textarea">Descripción</label>
                                        @if($errors->first('afiliado_clinica'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('afiliado_clinica') }}</i>
                                        </div>
                                        @endif
                                    </div> <!-- FIN AFILIADO DEL ALUMNO -->

                                    <h3 class="text-start  fs-6">¿Que institución le da servicios medicos?</h3>
                                    <div class="form-floating my-2"> <!-- SERVICIO MEDICO DEL ALUMNO -->
                                        <select name="servicio_medico" {{-- <-- Nombre del Campo --}} id="role_select7" class="form-select form-control" autocomplete="off" placeholder="Servicio medico" readonly>
                                            <option value="{{$consulta->servicio_medico}}">{{$consulta->servicio_medico}}</option>
                                            <option value='SEGURO SOCIAL'>SEGURO SOCIAL</option>
                                            <option value='S.S.S.T.E'>S.S.S.T.E</option>
                                            <option value='SECRETARIA DE MARINA'>SECRETARIA DE MARINA</option>
                                            <option value='SECRETARIA DE LA DEFENSA NACIONAL'>SECRETARIA DE LA DEFENSA NACIONAL</option>
                                        </select>
                                        <label for="input-text">Selecciona tu servicio medico</label>
                                    </div> <!-- FIN SERVICIO MEDICO DEL ALUMNO -->
                                </div> <!--FIN TAB 6-->

                                <div class="tab-pane fade" id="tab7"> <!--TAB 7-->
                                    <div class="form-floating my-2"> <!-- MODO TRABAJO DEL ALUMNO -->
                                        <select name="modo_trabajo" {{-- <-- Nombre del Campo --}} id="role_select8" class="form-select form-control" autocomplete="off" placeholder="Modalidad de trabajo" readonly>
                                            <option value="{{$consulta->modo_trabajo}}">{{$consulta->modo_trabajo}}</option>
                                            <option value='Trabajo en una empresa'>Trabajo en una empresa</option>
                                            <option value='Trabajo independiente'>Trabajo independiente</option>
                                            <option value='No trabajo'>No trabajo</option>
                                        </select>
                                        <label for="input-text">Selecciona tu modalidad de trabajo</label>
                                    </div> <!-- FIN MODO TRABAJO ALUMNO -->

                                    <div class="form-floating my-2"> <!-- NOMBRE EMPRESA DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('nombre_empresa'), 'form-control is-invalid' => $errors->first('nombre_empresa')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->nombre_empresa}}"
                                            name="nombre_empresa" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="nombre_empresa"
                                            readonly>
                                            <label for="input-text">Nombre de la empresa donde trabaja el estudiante</label>
                                            @if($errors->first('nombre_empresa'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('nombre_empresa') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN NOMBRE EMPRESA DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!-- CONTACTO EMPRESA DEL ALUMNO-->
                                        <input maxlength="10"
                                            @class(['form-control'=> !$errors->first('contacto_empresa'), 'form-control is-invalid' => $errors->first('contacto_empresa')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->contacto_empresa}}"
                                            name="contacto_empresa" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="contacto_empresa"
                                            readonly>
                                            <label for="input-text">Contacto de la empresa donde trabaja el estudiante</label>
                                            @if($errors->first('contacto_empresa'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('contacto_empresa') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN CONTACTO EMPRESA DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!-- CORREO EMPRESA DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('correo_empresa'), 'form-control is-invalid' => $errors->first('correo_empresa')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->correo_empresa}}"
                                            name="correo_empresa" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="correo_empresa"
                                            readonly>
                                            <label for="input-text">Correo de la empresa donde trabaja el estudiante</label>
                                            @if($errors->first('correo_empresa'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('correo_empresa') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN CORREO EMPRESA DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!-- DIRECCION EMPRESA DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('direccion'), 'form-control is-invalid' => $errors->first('direccion')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->direccion}}"
                                            name="direccion" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="direccion"
                                            readonly>
                                            <label for="input-text">Dirección de la empresa donde trabaja el estudiante</label>
                                            @if($errors->first('direccion'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('direccion') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN DIRECCION EMPRESA DEL ALUMNO-->

                                    <h3 class="text-start  fs-6">¿Tienes un horario? Describelo usando día de la semana y horario de entrada y salida</h3>
                                    <div class="form-floating my-2"> <!-- HORARIO DEL ALUMNO -->
                                        <textarea
                                            @class(['form-control'=> !$errors->first('horario'), 'form-control is-invalid' => $errors->first('horario')])
                                            name="horario"{{-- <-- Nombre del Campo --}}
                                            id="horario"
                                            style="height: 6rem"
                                            value="{{$consulta->horario}}"
                                            readonly>
                                            {{$consulta->horario}}
                                        </textarea>
                                        <label for="description-textarea">Ejemplo: Lunes a Domingo de 3Pm a 9Pm</label>
                                        @if($errors->first('horario'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('horario') }}</i>
                                        </div>
                                        @endif
                                    </div> <!-- FIN HORARIO DEL ALUMNO -->
                                </div> <!--FIN TAB 7-->

                                <div class="tab-pane fade" id="tab8"> <!--FIN TAB 8-->
                                    <div class="form-floating my-2"> <!-- NOMBRE TUTOR DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('nombre_tutor'), 'form-control is-invalid' => $errors->first('nombre_tutor')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->nombre_tutor}}"
                                            name="nombre_tutor" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="nombre_tutor"
                                            readonly>
                                            <label for="input-text">Nombre del tutor del estudiante</label>
                                            @if($errors->first('nombre_tutor'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('nombre_tutor') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN NOMBRE TUTOR DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!-- CALLE TUTOR DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('calle_tutor'), 'form-control is-invalid' => $errors->first('calle_tutor')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->calle_tutor}}"
                                            name="calle_tutor" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="calle_tutor"
                                            readonly>
                                            <label for="input-text">Calle del tutor del estudiante</label>
                                            @if($errors->first('calle_tutor'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('calle_tutor') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN CALLE TUTOR DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!-- N_EXTERIOR TUTOR DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('n_exterior_tutor'), 'form-control is-invalid' => $errors->first('n_exterior_tutor')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->n_exterior_tutor}}"
                                            name="n_exterior_tutor" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="n_exterior_tutor"
                                            readonly>
                                            <label for="input-text">Número exterior del tutor del estudiante</label>
                                            @if($errors->first('n_exterior_tutor'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('n_exterior_tutor') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN N_EXTERIOR TUTOR DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!-- N_INTERIOR TUTOR DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('n_interior_tutor'), 'form-control is-invalid' => $errors->first('n_interior_tutor')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->n_interior_tutor}}"
                                            name="n_interior_tutor" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="n_interior_tutor"
                                            readonly>
                                            <label for="input-text">Número interior del tutor del estudiante</label>
                                            @if($errors->first('n_interior_tutor'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('n_interior_tutor') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN N_INTERIOR TUTOR DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!-- COLONIA TUTOR DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('colonia_tutor'), 'form-control is-invalid' => $errors->first('colonia_tutor')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->colonia_tutor}}"
                                            name="colonia_tutor" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="colonia_tutor"
                                            readonly>
                                            <label for="input-text">Colonia del tutor del estudiante</label>
                                            @if($errors->first('colonia_tutor'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('colonia_tutor') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN COLONIA TUTOR DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!-- C_POSTAL TUTOR DEL ALUMNO-->
                                        <input maxlength="5"
                                            @class(['form-control'=> !$errors->first('c_postal_tutor'), 'form-control is-invalid' => $errors->first('c_postal_tutor')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->c_postal_tutor}}"
                                            name="c_postal_tutor" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="c_postal_tutor"
                                            readonly>
                                            <label for="input-text">Código postal del tutor del estudiante</label>
                                            @if($errors->first('c_postal_tutor'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('c_postal_tutor') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN C_POSTAL TUTOR DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!-- ESTADO TUTOR DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('estado_tutor'), 'form-control is-invalid' => $errors->first('estado_tutor')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->estado_tutor}}"
                                            name="estado_tutor" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="estado_tutor"
                                            readonly>
                                            <label for="input-text">Estado del tutor del estudiante</label>
                                            @if($errors->first('estado_tutor'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('estado_tutor') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN ESTADO TUTOR DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!-- MUNICIPIO TUTOR DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('municipio_tutor'), 'form-control is-invalid' => $errors->first('municipio_tutor')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->municipio_tutor}}"
                                            name="municipio_tutor" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="municipio_tutor"
                                            readonly>
                                            <label for="input-text">Municipio del tutor del estudiante</label>
                                            @if($errors->first('municipio_tutor'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('municipio_tutor') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN MUNICIPIO TUTOR DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!-- LOCALIDAD TUTOR DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('localidad_tutor'), 'form-control is-invalid' => $errors->first('localidad_tutor')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->localidad_tutor}}"
                                            name="localidad_tutor" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="localidad_tutor"
                                            readonly>
                                            <label for="input-text">Localidad del tutor del estudiante</label>
                                            @if($errors->first('localidad_tutor'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('localidad_tutor') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN LOCALIDAD TUTOR DEL ALUMNO-->
                                </div> <!--FIN TAB 8-->

                                <div class="tab-pane fade" id="tab9"> <!--FIN TAB 9-->
                                    <div class="form-floating my-2"> <!-- MEDIO DEL ALUMNO -->
                                        <select name="medio" {{-- <-- Nombre del Campo --}} id="role_select9" class="form-select form-control" autocomplete="off" placeholder="Medio de informacion" readonly>
                                            <option value="{{$consulta->medio}}">{{$consulta->medio}}</option>
                                            <option value='Propaganda'>Propaganda</option>
                                            <option value='Por una visita a mi institución'>Por una visita a mi institución</option>
                                            <option value='Redes sociales'>Redes sociales</option>
                                            <option value='Recomendación'>Recomendación</option>
                                            <option value='Un familiar o amigo estudio ahí'>Un familiar o amigo estudio ahí</option>
                                        </select>
                                        <label for="input-text">¿Por qué medio te enteraste de la universidad?</label>
                                    </div> <!-- FIN MEDIO ALUMNO -->

                                    <div class="form-floating my-2"> <!-- OPCION1 DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('op_1'), 'form-control is-invalid' => $errors->first('op_1')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->op_1}}"
                                            name="op_1" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="op_1"
                                            readonly>
                                            <label for="input-text">Primera opción del estudiante</label>
                                            @if($errors->first('op_1'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('op_1') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN OPCION1 DEL ALUMNO-->

                                    <div class="form-floating my-2"> <!-- OPCION2 DEL ALUMNO-->
                                        <input
                                            @class(['form-control'=> !$errors->first('op_2'), 'form-control is-invalid' => $errors->first('op_2')])
                                            autocomplete="off"
                                            type="text"
                                            value="{{$consulta->op_2}}"
                                            name="op_2" {{-- <-- Nombre del Campo --}}
                                            placeholder="input-text"
                                            id="op_2"
                                            readonly>
                                            <label for="input-text">Segunda opción del estudiante</label>
                                            @if($errors->first('op_2'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('op_2') }}</i>
                                        </div>
                                        @endif
                                    </div> <!--FIN OPCION2 DEL ALUMNO-->
                                </div> <!--FIN TAB 9-->
                            </div> <!--FIN TAB CONTENT-->
                        </div>
                    </div>
                </section>
                <!-- Personal Information Section End -->
                <div class="d-flex justify-content-end mt-5">
                    <a title="Regresar" href="{{ route('adminForm.index') }}" class="text-end fs-6 text-secundario"><img src="{{ asset('img/regresa.jpg')}}" width="30" height="30"></a>
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
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estudiantes;
use App\Models\Carreras;
use App\Models\Admin;
use App\Models\Formulario;
use Illuminate\Support\Facades\Auth;

class AdminFormController extends Controller
{
    public function index(Request $request)
    {
        $items = formulario::select('formulario.idf', 'formulario.nombre','formulario.correo', 'formulario.sexo','formulario.matricula','formulario.idg','carreras.nombre as carre')
        ->join('grupos','grupos.idg','=','formulario.idg')
        ->join('carreras','carreras.idca','=','grupos.idg')
        ->where('formulario.nombre', 'LIKE', "%$request->q%")
        ->paginate( ($request->paginate) ? $request->paginate : 10 );
        return view('adminForm.index', compact('items'));
        //return $items;
    }

    public function edit(Formulario $formulario)
    {
        //return ($formulario);
        $consulta = formulario::select('formulario.idf','formulario.nombre','formulario.sexo','formulario.matricula','formulario.edad', 'formulario.curp','formulario.rfc',
        'formulario.correo','formulario.nacimiento','formulario.tel_celular','formulario.tel_domicilio','formulario.institucion',
        'formulario.area','formulario.pro_general','formulario.año_ingreso','formulario.año_egreso','formulario.beca','formulario.estado_civil',
        'formulario.hijos','formulario.vive_con','formulario.calle','formulario.num_exterior','formulario.num_interior','formulario.colonia',
        'formulario.codigo_postal','formulario.estado','formulario.municipio','formulario.localidad','formulario.pais_naci',
        'formulario.estado_naci','formulario.municipio_naci','formulario.grupo_etnico','formulario.lengua','formulario.sangre',
        'formulario.enfermedades','formulario.discapacidades','formulario.alergias','formulario.seguro_social','formulario.num_clinica',
        'formulario.afiliado_clinica','formulario.servicio_medico','formulario.modo_trabajo','formulario.nombre_empresa',
        'formulario.contacto_empresa','formulario.correo_empresa','formulario.horario','formulario.direccion','formulario.nombre_tutor',
        'formulario.calle_tutor','formulario.n_exterior_tutor','formulario.n_interior_tutor','formulario.colonia_tutor','formulario.c_postal_tutor',
        'formulario.estado_tutor','formulario.municipio_tutor','formulario.localidad_tutor','formulario.medio','formulario.op_1','formulario.op_2')
                      ->where('formulario.idf', '=', $formulario->idf)->get();
        //return $consulta;
        return view('adminForm.edit')
        ->with('consulta',$consulta[0]);
    }

    public function destroy(Formulario $item)
    {
      $item->forceDelete();
      return redirect()->route('adminForm.index')->with('message',"Registro eliminado exitosamente");
    }

    public function update(Request $request, Formulario $formulario)
    {
        //return $request;
        $this->validate($request,[
            'status'=>'required',
               ]);
            
            $formulario = Formulario::find($formulario->idf);
            $formulario->status = $request->status;

            $formulario->save();
            
            return redirect()->route('adminForm.index')
            ->with('message','Confirmación del status del formulario del alumno actualizado');
    }
}

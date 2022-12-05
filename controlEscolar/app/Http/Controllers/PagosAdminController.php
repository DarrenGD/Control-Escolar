<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagos;
use App\Models\Conceptos;
use App\Models\Cuatrimestres;
use App\Models\CicloEscolar;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class PagosAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Pagos::select('pagos.idp', 'pagos.matricula', 'pagos.nombre', 'cuatrimestres.nombre as cuatri',
                                'conceptos.nombre as concep','pagos.aceptado', 'pagos.fechap', 'pagos.monto',
                                'pagos.correo', 'pagos.celular', 'pagos.referenciap')
            ->join('cuatrimestres', 'cuatrimestres.idc', '=', 'pagos.idc')
            ->join('conceptos', 'conceptos.idcp', '=', 'pagos.idcp')
            /*->join('estudiantes', 'estudiantes.ide', '=', 'pagos.ide')*/
            ->where('conceptos.nombre', 'LIKE', "%$request->q%")
            ->paginate( ($request->paginate) ? $request->paginate : 10 );
            return view('adminpagos.index', compact('items'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagos $pagos)
    {
        //return($pagos);
        $consulta = Pagos::select('pagos.idp', 'pagos.matricula', 'pagos.nombre', 'cuatrimestres.nombre as cuatri',
                                'conceptos.nombre as concep', 'pagos.fechap', 'pagos.monto', 'pagos.foto', 'ciclo_escolars.nombre as cies',
                                'pagos.correo', 'pagos.celular', 'pagos.referenciap', 'pagos.aceptado', 'pagos.observaciones')
            ->join('conceptos', 'conceptos.idcp', '=', 'pagos.idcp')
            ->join('cuatrimestres', 'cuatrimestres.idc', '=', 'pagos.idc')
            ->join('ciclo_escolars', 'ciclo_escolars.idce', '=', 'pagos.idce')
            ->where('pagos.idp', '=', $pagos->idp)->get();
            $cuatrimestres = Cuatrimestres::all();
            $conceptos = Conceptos::all();
            $cicloescolar = CicloEscolar::all();
            return view('adminpagos.edit')
            ->with('consulta',$consulta[0])
            ->with('conceptos',$conceptos)
            ->with('cuatrimestres',$cuatrimestres)
            ->with('cicloescolar',$cicloescolar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagos $pagos)
    {

       //return  $request;
        $this->validate($request,[
            'aceptado'=>'required',
            'observaciones'
        ]);

        $pagos = Pagos::find($pagos->idp);
        $pagos->aceptado = $request->aceptado;
        $pagos->observaciones = $request->observaciones;
        $pagos->save();

        return redirect()->route('adminpagos.index')
        ->with('message', 'Pago verificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

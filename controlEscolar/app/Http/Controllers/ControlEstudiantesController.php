<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlEstudiantesController extends Controller
{
    /**********************************start consulta**********************************/
    public function consulta()
    {
        //Consulta de todos los ciclos escolares
        $ciclos = DB::select('SELECT * FROM ciclo_escolars ORDER BY nombre ASC');

        return view('reportes.alumnos.consulta')
            ->with(['ciclos' => $ciclos]);
    }
    /**********************************end consulta**********************************/

    /*********************************start contenido**********************************/
    public function contenido(Request $request)
    {
        //Consulta todos los ciclos escolares
        $ciclos = DB::select('SELECT * FROM ciclo_escolars ORDER BY nombre ASC');

        //idce del ciclo escolar seleccionado
        $idce = $request->get('idce');

        //Consulta el nombre del ciclo escolar seleccionado
        $ce_select = DB::select("SELECT ce.nombre AS nombre
        FROM ciclo_escolars AS ce
        WHERE ce.idce = $idce");

        //Lista los carreras, número de alumnos, número de grupos, del ciclo escolar sellccinado
        $listas = DB::select("SELECT t1.idca,t1.nombre as nombre,t1.idce,t1.cuantos,t1.completos,
        CONCAT(ROUND(t1.completos *100 /t1.cuantos,1),' %') AS porcentaje,
        t1.cuantos -t1.completos AS restan
        FROM
        (SELECT c.idca,c.nombre,g.idce,COUNT(*) AS cuantos,cuantosaceptados(c.idca,g.idce) AS completos
        FROM alumnos_carreras AS ac
        INNER JOIN grupos AS g ON g.idg  = ac.idg
        INNER JOIN carreras AS c ON c.idca = g.idca
        WHERE g.idce = $idce
        GROUP BY c.idca,c.nombre,g.idce) AS t1");

        return view("reportes.alumnos.contenido")
            ->with(['$ciclos' => $ciclos])
            ->with(['idce' => $idce])
            ->with(['$ce_select' => $ce_select])
            ->with(['listas' => $listas]);
    }
    /*********************************end contenido**********************************/

    /*********************************start detalle carreras**********************************/
    public function detalle_carreras($id, $idce)
    {
        //idce del ciclo escolar seleccionado
        $idce = $idce;

        //idca de la carrera seleccionada
        $idca = $id;

        //Consulta el nombre del ciclo escolar y el nombre de la carrera seleccionada
        $datos = DB::select("SELECT distinct
        ca.nombre AS carrera, ce.nombre AS ciclo  FROM  grupos AS g
        inner join carreras AS ca ON ca.idca = g.idca
        inner join ciclo_escolars AS ce ON ce.idce = g.idce
        where g.idca = $idca && g.idce = $idce");

        //Lista los grupos, número de alumnos que tiene cada grupo
        $listas = DB::select("SELECT t1.idg,t1.nombre as nombre,t1.cuantos,t1.completado,t1.cuantos-t1.completado AS faltan
        FROM
        (SELECT g.idg,g.nombre,COUNT(*) AS cuantos,cuantospagaronxgrupo(g.idg) AS completado
        FROM alumnos_carreras AS ac
        INNER JOIN grupos AS g ON g.idg  = ac.idg
        WHERE g.idca = $idca AND g.idce = $idce
        GROUP BY g.idg,g.nombre) AS t1")
        ;

        return view("reportes.alumnos.carrera")
            ->with(['idce' => $idce])
            ->with(['idca' => $idca])
            ->with(['datos' => $datos[0]])
            ->with(['listas' => $listas]);
    }
    /*********************************end detalle carreras**********************************/

    /*********************************start detalle_grupo**********************************/
    public function detalle_grupos($id, Request $request)
    {
        //idg del grupo seleccionado
        $idg = $id;

        //Consulta el nombre del ciclo escolar, nombre de la carrera y nombre del grupo seleccionados
        $datos = DB::select("SELECT distinct
        ce.nombre AS ciclo, ca.nombre AS carrera, g.nombre AS grupo,
        ce.idce AS idce, ca.idca AS idca
        FROM  grupos AS g
        inner join carreras AS ca ON ca.idca = g.idca
        inner join ciclo_escolars AS ce ON ce.idce = g.idce
        where g.idg = $idg
        ");

       //Consulta la información de los usuarios que pertenezcan al grupo
        $usuarios = DB::select("SELECT u.matricula, 
        CONCAT(u.nombre,' ',u.apellido_paterno,' ',u.apellido_materno) AS nombrecompleto,
        IF(p.aceptado=1,'aceptado',IF(p.aceptado= 0,'pendiente aceptacion','falta que suba')) AS pago,
        IF(f.rfc != '','COMPLETO','PENDIENTE') AS perfil
        FROM alumnos_carreras AS ac
        INNER JOIN usuarios AS u ON u.idu = ac.idu
        LEFT JOIN pagos AS p ON p.idu = u.idu
        LEFT JOIN formulario AS f ON f.idu = u.idu
        WHERE ac.idg = 1");

        return view("reportes.alumnos.grupos")
            ->with(['idg' => $idg])
            ->with(['datos' => $datos[0]])
            ->with(['usuarios' => $usuarios]);
    }
    /*********************************end detalle_grupo**********************************/

    /*********************************start regresar*********************************/
    public function regresar($idce)
    {
        //Consulta todos los ciclos escolares
        $ciclos = DB::select('SELECT * FROM ciclo_escolars ORDER BY nombre ASC');

        //idce del ciclo escolar seleccionado
        $idce = $idce;

        //Consulta el nombre del ciclo escolar seleccionado
        $ce_select = DB::select("SELECT ce.nombre AS nombre
        FROM ciclo_escolars AS ce
        WHERE ce.idce = $idce");

        //Lista los carreras, número de alumnos, número de grupos, del ciclo escolar sellccinado
        $listas = DB::select("SELECT t1.idca,t1.nombre as nombre,t1.idce,t1.cuantos,t1.completos,
        CONCAT(ROUND(t1.completos *100 /t1.cuantos,1),' %') AS porcentaje,
        t1.cuantos -t1.completos AS restan
        FROM
        (SELECT c.idca,c.nombre,g.idce,COUNT(*) AS cuantos,cuantosaceptados(c.idca,g.idce) AS completos
        FROM alumnos_carreras AS ac
        INNER JOIN grupos AS g ON g.idg  = ac.idg
        INNER JOIN carreras AS c ON c.idca = g.idca
        WHERE g.idce = $idce
        GROUP BY c.idca,c.nombre,g.idce) AS t1");

        return view("reportes.alumnos.consulta")
            ->with(['ciclos' => $ciclos])
            ->with(['idce' => $idce])
            ->with(['ce_select' => $ce_select])
            ->with(['listas' => $listas]);
    }
    /**********************************end regresar*******************************************/
}

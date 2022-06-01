<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use Illuminate\Support\Facades\DB;

class ControllerEvent extends Controller {
    
    // Función para cuando aun no te has logueado, no se pueda acceder a las demás páginas.
    public function __construct(){
        $this->middleware('auth');
    }

    public function form(){
        return view("/evento/form");
    }

    public function create(Request $request){

        $this->validate($request, [
        'nombre'     =>  'required',
        'matricula'  =>  'required',
        'marca'      =>  'required',
        'modelo'     =>  'required',
        'fecha'     =>   'required',
        'hora'       =>  'required'
       ]);
  
        Event::insert([
          'nombre'       => $request->input("nombre"),
          'matricula'    => $request->input("matricula"),
          'marca'        => $request->input("marca"),
          'modelo'       => $request->input("modelo"),
          'fecha'        => $request->input("fecha"),
          'hora'         => $request->input('hora')
        ]);
  
        return back()->with('success', 'Enviado exitosamente!');
  
      }
  
      public function details($id){
  
        $event = Event::find($id);
        
        return view("evento/evento",["event" => $event]);
  
      }
      
    //   public function update($nombre, $matricula, $marca, $modelo, $fecha, $hora) {
    //     DB::update("UPDATE evento 
    //                 SET nombre = '$nombre', matricula = '$matricula', marca = '$marca', modelo = '$modelo', fecha = '$fecha', hora = '$hora';");

    //     return redirect('/Evento/index'); 
    // }

      public function destroy($nombre, $matricula, $marca, $modelo, $fecha, $hora) {
        DB::delete("DELETE 
                      FROM evento 
                      WHERE nombre = '$nombre' 
                      AND matricula = '$matricula' 
                      AND marca = '$marca'
                      AND modelo = '$modelo'
                      AND fecha = '$fecha'
                      AND hora = '$hora'" );

        return redirect('/Evento/form');
      }

      public function index(){

        $month = date("Y-m");
        //
        $data = $this->calendar_month($month);
        $mes = $data['month'];
        // obtener mes en espanol
        $mespanish = $this->spanish_month($mes);
        $mes = $data['month'];
 
        return view("evento/calendario",[
          'data' => $data,
          'mes' => $mes,
          'mespanish' => $mespanish
        ]);
 
    }

    public function index_month($month){

        $data = $this->calendar_month($month);
        $mes = $data['month'];
        // obtener mes en espanol
        $mespanish = $this->spanish_month($mes);
        $mes = $data['month'];
  
        return view("evento/calendario",[
          'data' => $data,
          'mes' => $mes,
          'mespanish' => $mespanish
        ]);
  
      }

      public static function calendar_month($month){
        //$mes = date("Y-m");
        $mes = $month;
        //sacar el ultimo de dia del mes
        $daylast =  date("Y-m-d", strtotime("last day of ".$mes));
        //sacar el dia de dia del mes
        $fecha      =  date("Y-m-d", strtotime("first day of ".$mes));
        $daysmonth  =  date("d", strtotime($fecha));
        $montmonth  =  date("m", strtotime($fecha));
        $yearmonth  =  date("Y", strtotime($fecha));
        // sacar el lunes de la primera semana
        $nuevaFecha = mktime(0,0,0,$montmonth,$daysmonth,$yearmonth);
        $diaDeLaSemana = date("w", $nuevaFecha);
        $nuevaFecha = $nuevaFecha - ($diaDeLaSemana*24*3600); //Restar los segundos totales de los dias transcurridos de la semana
        $dateini = date ("Y-m-d",$nuevaFecha);
        //$dateini = date("Y-m-d",strtotime($dateini."+ 1 day"));
        // numero de primer semana del mes
        $semana1 = date("W",strtotime($fecha));
        // numero de ultima semana del mes
        $semana2 = date("W",strtotime($daylast));
        // semana todal del mes
        // en caso si es diciembre
        if (date("m", strtotime($mes))==12) {
            $semana = 5;
        }
        else {
          $semana = ($semana2-$semana1)+1;
        }
        // semana todal del mes
        $datafecha = $dateini;
        $calendario = array();
        $iweek = 0;
        while ($iweek < $semana):
            $iweek++;
            //echo "Semana $iweek <br>";
            //
            $weekdata = [];
            for ($iday=0; $iday < 7 ; $iday++){
              // code...
              $datafecha = date("Y-m-d",strtotime($datafecha."+ 1 day"));
              $datanew['mes'] = date("M", strtotime($datafecha));
              $datanew['dia'] = date("d", strtotime($datafecha));
              $datanew['fecha'] = $datafecha;
              //AGREGAR CONSULTAS EVENTO
              $datanew['evento'] = Event::where("fecha",$datafecha)->get();
  
              array_push($weekdata,$datanew);
            }
            $dataweek['semana'] = $iweek;
            $dataweek['datos'] = $weekdata;
            //$datafecha['horario'] = $datahorario;
            array_push($calendario,$dataweek);
        endwhile;
        $nextmonth = date("Y-M",strtotime($mes."+ 1 month"));
        $lastmonth = date("Y-M",strtotime($mes."- 1 month"));
        $month = date("M",strtotime($mes));
        $yearmonth = date("Y",strtotime($mes));
        //$month = date("M",strtotime("2019-03"));
        $data = array(
          'next' => $nextmonth,
          'month'=> $month,
          'year' => $yearmonth,
          'last' => $lastmonth,
          'calendar' => $calendario,
        );
        return $data;
      }
  
      public static function spanish_month($month){
  
          $mes = $month;
          if ($month=="Jan") {
            $mes = "Enero";
          }
          elseif ($month=="Feb")  {
            $mes = "Febrero";
          }
          elseif ($month=="Mar")  {
            $mes = "Marzo";
          }
          elseif ($month=="Apr") {
            $mes = "Abril";
          }
          elseif ($month=="May") {
            $mes = "Mayo";
          }
          elseif ($month=="Jun") {
            $mes = "Junio";
          }
          elseif ($month=="Jul") {
            $mes = "Julio";
          }
          elseif ($month=="Aug") {
            $mes = "Agosto";
          }
          elseif ($month=="Sep") {
            $mes = "Septiembre";
          }
          elseif ($month=="Oct") {
            $mes = "Octubre";
          }
          elseif ($month=="Nov") {
            $mes = "Noviembre";
          }
          elseif ($month=="Dec") {
            $mes = "Diciembre";
          }
          else {
            $mes = $month;
          }
          return $mes;
      }
}

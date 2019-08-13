<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\RecordatorioPago;
use App\Servicio;
use DateTime;
use DateInterval;

class CobroServicio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'servicio:cobro';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica que servicios deben se cobrados, manda un correo a los que ya deban de cobrarse';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $servicios=Servicio::get();
        date_default_timezone_set('America/Mexico_City');
        $hoy=new DateTime(date('Y-m-d'));
        foreach ($servicios as $servicio) {
            $start=new DateTime($servicio->fecha_inicial);
            switch ($servicio->periodicidad) {
                case 'dia':
                    do
                    {
                        $start->add(new DateInterval('P1D'));
                    }while($hoy>=$start);                        
                    $diferencia=$hoy->diff($start);     
                    break;

                case 'semana':                          
                    do
                    {
                        $start->add(new DateInterval('P7D'));
                    }while($hoy>=$start);                        
                    $diferencia=$hoy->diff($start);                     
                    break;

                case 'mes':                             
                    $oldDay = $start->format("d");
                    $i=0;                       
                    do
                    {                                       
                        $start=new DateTime($servicio->fecha_inicial);
                        $i++;
                        $start->add(new DateInterval('P'.$i.'M'));
                        $newDay = $start->format("d");
                        if($oldDay != $newDay && $newDay) {         
                            $start->sub(new DateInterval("P" . $newDay . "D"));
                        }
                    }while($hoy>=$start);
                    $diferencia=$hoy->diff($start);
                    break;

                case '3 meses':
                    $oldDay = $start->format("d");
                    $i=0;                       
                    do
                    {                                       
                        $start=new DateTime($servicio->fecha_inicial);
                        $i++;
                        $start->add(new DateInterval('P'.($i*3).'M'));
                        $newDay = $start->format("d");
                        if($oldDay != $newDay && $newDay) {         
                            $start->sub(new DateInterval("P" . $newDay . "D"));
                        }
                    }while($hoy>=$start);
                    $diferencia=$hoy->diff($start);
                    break;

                case '6 meses':
                    $oldDay = $start->format("d");
                    $i=0;                       
                    do
                    {                                       
                        $start=new DateTime($servicio->fecha_inicial);
                        $i++;
                        $start->add(new DateInterval('P'.($i*6).'M'));
                        $newDay = $start->format("d");
                        if($oldDay != $newDay && $newDay) {         
                            $start->sub(new DateInterval("P" . $newDay . "D"));
                        }
                    }while($hoy>=$start);
                    $diferencia=$hoy->diff($start);
                    break;

                case 'anual':
                    $oldDay = $start->format("d");
                    $i=0;                       
                    do
                    {                                       
                        $start=new DateTime($servicio->fecha_inicial);
                        $i++;
                        $start->add(new DateInterval('P'.$i.'Y'));
                        $newDay = $start->format("d");
                        if($oldDay != $newDay && $newDay) {         
                            $start->sub(new DateInterval("P" . $newDay . "D"));
                        }
                    }while($hoy>=$start);
                    $diferencia=$hoy->diff($start);
                    break;
            }
            if($diferencia->days==2)
            {
                // $fecha_cobro=new DateTime($diferencia->format('%d/%m/%Y'));
                // $fecha_cobro->add(new DateInterval('P2D'));
                Mail::to($servicio->cliente->correo)->send(new RecordatorioPago($servicio,$start,1));
                 Mail::to('administracion@sistemasnonex.com')->send(new RecordatorioPago($servicio,$start,0));
            }
        }
    }    
}

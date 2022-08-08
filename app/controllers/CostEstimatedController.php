<?php

$base_url = (empty($_SERVER['HTTPS']) or strtolower($_SERVER['HTTPS']) === 'off') ? 'http' : 'https';
$base_url .= '://' . $_SERVER['HTTP_HOST'];
define('RUTA_APP', dirname(dirname(__FILE__)));





/*  */


class CostEstimated
{
   

    /* 
    Lo valores de costo inicial y proyectado provendrán de un array en PHP por lo que la función de la curva deberá aceptar estos 5 pares (año,costo) de entrada pertenecientes a las coordenadas (x,y) de la gráfica.
    En base al coste inicial y al coste estimado crear una funcion que calcule la ganancia teniendo como punto de partida el año inicial y el año final,  La función debe considerar escenarios descendentes donde la proyección sea menor al valor inicial de costo. la respuesta debe ser usada para graficar año a año el punto de ganancia 

    puntos a graficar x: years y y: ganancia
    


    ejemplo de la response :"data": {
        "cost_initial": 1000,
        "cost_estimated": 30000,
        "year_initial": 2020,
        "year_final": 2025,
        "growth_rate": 0.1,
        "gain_rate": [
            {
                "year": 2020,
                "gain": cost_initial * (growth_rate / 100)
            }
        ]
    */

    function calculateProfit($initial_cost, $estimated_cost,$initial_year){

      
        
        $profit = round((($estimated_cost - $initial_cost) / $estimated_cost ) * 100,2);
        $profit_per_year = round(($profit / 5) / 100,2);
        

        /* Calcular cada año el cost_year e ir acumulando el valor residual hasta el ultimo ciclo */
        $cost_year = [];
        $gain_rate = [];
        $year = $initial_year;
        $cost_year[] = $initial_cost;
      
        while ($year < $initial_year + 5) {
            
            $cost_year[] = $cost_year[count($cost_year) - 1] + $cost_year[count($cost_year) - 1] * $profit_per_year;
            
            $year_cost = round($cost_year[count($cost_year) - 1]);
            
            $gain_rate[] = [
                'year' => $year,
                'gain' =>  $year_cost
            ];
            $year++;

        }
       

       
        $array = array("OK" => true, "status" => 200, "data" => ["cost_initial" => $initial_cost, "cost_estimated" => $estimated_cost, "year_initial" => $initial_year, "year_final" => ($initial_year + 5), "profit" => $profit ,  "profit_per_year" => $profit_per_year, "cost_year" => $gain_rate]);
        return $array;

    }

    

    
}

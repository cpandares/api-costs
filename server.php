<?php

require_once './app/controllers/CostEstimatedController.php';


$CostEstimadted = new CostEstimated();




header('content-type: application/json');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');


switch (strtoupper($_SERVER['REQUEST_METHOD'])) {
    case 'GET':
       
        $initial_cost = 5000;
        $cost_estimated = 10000;
        $year_initial = 2022;
      
        $response = $CostEstimadted->calculateProfit($initial_cost, $cost_estimated, $year_initial);
        echo json_encode($response);

        break;

   

    default:
        # code...
        break;
}

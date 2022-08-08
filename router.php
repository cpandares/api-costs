<?php

$matches=[];
 if(preg_match('/\/([^\/]+)\/?/',$_SERVER["REQUEST_URI"],$matches))
{
   
    $_GET['resource_type']=$matches[1];        
    error_log(print_r($matches,1));
    require 'server.php';
}else
{
    error_log('No matches');
    http_response_code(404);
}
/* var_dump($matches); */
?>
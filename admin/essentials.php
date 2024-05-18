<?php

function redirect($url)
{
    echo
    "<script> window.location.herf='$url';
    </script>";
}

// function alert($type, $msg)
// {
//     $bs_class = ($type == "Success") ? "alert-success" : "alert-danger";
//     echo <<<alert
//     <div class="alert $bs_class alert-warning alert-dismissible fade show " role="alert">
//          <strong class="me-3">$msg</strong> 
//         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//     </div>
    
// alert;
// }

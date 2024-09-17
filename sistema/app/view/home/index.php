<?php
if ($bruker->type == "paciente"){
    include("paciente.php");
}
else if ($bruker->type == "prescritor"){
    include("prescritor.php");
}
else if ($bruker->type == "administrador"){
    include("administrador.php");
}
?>
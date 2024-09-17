<?php
if ($bruker->type == "paciente"){
    include("index_paciente.php");
}
else if ($bruker->type == "prescritor"){
    include("index_prescritor.php");
}
else if ($bruker->type == "administrador"){
    include("index_administrador.php");
}
?>
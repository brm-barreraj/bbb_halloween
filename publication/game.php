<?php
require("db/requires.php");
$General = new General;
$departamentos = $General->getTotalDatos('BbbhDepartamento',null);
$smarty->assign("departamentos",$departamentos);
$smarty->display("game.html");
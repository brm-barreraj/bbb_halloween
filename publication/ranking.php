<?php
require("db/requires.php");
$General = new General;
$ranking = $General->getTotalDatos('BbbhParticipanteXJuego',null);
$smarty->assign("ranking",$ranking);
$smarty->display("ranking.html");
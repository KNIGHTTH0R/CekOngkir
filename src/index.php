<?php

require("JNE.php");

$jne = new JNE();
if(!empty($_GET['mode'])){
	if($_GET['mode'] == 'from'){
		echo $jne->getListCityFrom($_GET['term']);
	} else if($_GET['mode'] == 'dest'){
		echo $jne->getListCityDest($_GET['term']);
	} else if($_GET['mode'] == 'cari'){
		$jne->setCityFrom($_GET['origin'], $_GET['originlabel']);
		$jne->setCityDest($_GET['dest'], $_GET['destlabel']);
		$jne->setWeight($_GET['weight']);
		echo $jne->doRequest();
	}
}
?>
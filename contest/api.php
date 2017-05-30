<?php

if ($_GET['mode'] == "read")
	ReadMyDB();
	
if ($_GET['mode'] == "setName" && !empty($_GET['value']) && !empty($_GET['id']))
	SetName($_GET['value'], $_GET['id'], $_GET["description"]);
	
if ($_GET['mode'] == "setWin" && !empty($_GET['id']))
	SetWin($_GET['id']);
	
if ($_GET['mode'] == "reset")
	SetReset($_GET['id']);

function ReadMyDB()
{

	$lines = file('db.txt');
	
	$data = array();
	$i = 0;
	$iGroup = $i + 1;
	foreach ($lines as $line_num => $line)
	{
		$tab = explode(";", $line);
		$data[$i]["id"] = $i;
		$data[$i]["title"] = $tab[0] == NULL ? "Team ".$iGroup : $tab[0] ;
		$data[$i]["status"] = $tab[1];
		$data[$i]["nom"] = $tab[2] == NULL ? "Team ".$iGroup : strtoupper($tab[2]) ;
		$data[$i]["description"] = $tab[3] == NULL ? "" : $tab[3] ;
		$i++;
		$iGroup = $i + 1;
	}
	
	$retour = json_encode($data);
	die($retour);
}

function SetName($txt, $id, $description)
{
	$id--;
	$lines = file('db.txt');
	
	$data = array();
	$i = 0;
	foreach ($lines as $line_num => $line)
	{
		$tab = explode(";", $line);
		if ($i == $id)
			$data[$i] = trim($tab[0].";lost;".$txt.";".$description, "\r\n")."\r\n";
		else
			$data[$i] = $line;
		$i++;
	}
	
	$contenu = implode($data);
	if (file_put_contents ('db.txt', $contenu) != FALSE)
	{
		echo "[OK] Text Updated";
		$id++;
		Logs($id, "Text updated: ".$txt.",".$description);
		if ($_GET['token'] == "EU78J907H") SetWin($id);
		else if (!empty($_GET['token']) &&  $_GET['token'] != "B0L0$$") SetError($id);
		die(0);
	}
	//die($contenu);
}

function SetWin($id)
{
	$id--;
	$lines = file('db.txt');
	
	$data = array();
	$i = 0;
	foreach ($lines as $line_num => $line)
	{
		$tab = explode(";", $line);
	
		if ($i == $id)
			$data[$i] = trim($tab[0].";win;".$tab[2].";".$tab[3], "\r\n")."\r\n";
		else
			$data[$i] = $line;
		$i++;
	}
	
	$contenu = implode($data);
	if (file_put_contents ('db.txt', $contenu) != FALSE)
	{
		$id++;
		echo "[OK] Win Updated";
		Logs($id, "Contest Winner!");
		die(0);
	}
	//die($contenu);
}


function SetError($id)
{
	$id--;
	$lines = file('db.txt');
	
	$data = array();
	$i = 0;
	foreach ($lines as $line_num => $line)
	{
		$tab = explode(";", $line);
	
		if ($i == $id)
			$data[$i] = trim($tab[0].";error;".$tab[2].";".$tab[3], "\r\n")."\r\n";
		else
			$data[$i] = $line;
		$i++;
	}
	
	$contenu = implode($data);
	if (file_put_contents ('db.txt', $contenu) != FALSE)
	{
		$id++;
		echo "[OK] Error Updated";
		Logs($id, "Token Error");
		die(0);
	}
	//die($contenu);
}

function SetReset()
{
	$data = ";lost
;lost
;lost
;lost
;lost
;lost
;lost
;lost
;lost
;lost";
	if (file_put_contents ('db.txt', $data) != FALSE)
	{
		echo "[OK] Reset done";
		Logs(0, "==========================");
		Logs(0, "CHALLENGE RESTARTED");
		Logs(0, "==========================");
		die(0);
	}
	//die($contenu);
}

function Logs($id, $texte)
{
$file = 'logs.txt';

$phrase = "> [".date("m-d-Y H:i:s")."]  [Team ".$id."] [".$texte."]\n";  

file_put_contents($file, $phrase, FILE_APPEND | LOCK_EX);	
}

?>
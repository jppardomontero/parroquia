<?php
	
	require_once "controladores/CtrlPrincipal.php";
	require_once "controladores/CtrlUsuario.php";
	require_once "controladores/CtrlPersona.php";
	require_once "controladores/CtrlEucaristia.php";
	require_once "controladores/CtrlFamilia.php";
	require_once "controladores/CtrlNiveles.php";
	require_once "controladores/CtrlMatriculas.php";
	require_once "controladores/CtrlBautizo.php";
	require_once "controladores/CtrlParroquia.php";

	
	
	require_once "modelos/MdlUsuario.php";
	require_once "modelos/MdlPersona.php";
	require_once "modelos/MdlEucaristia.php";
	require_once "modelos/MdlFamilia.php";
	require_once "modelos/MdlNiveles.php";
	require_once "modelos/MdlMatriculas.php";
	require_once "modelos/MdlBautizo.php";
	require_once "modelos/MdlParroquia.php";


	$Obj_Principal = new Principal();
	$Obj_Principal -> CtrlPrincipal();
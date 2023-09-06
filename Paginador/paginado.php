<?php
require 'bbdd.php';

class postData
{

	private ?int $scrollPagina;

	public function getRowData() 
	{
		return json_decode(file_get_contents('php://input'));
	}

	public function getScrollPagina() 
	{
		return $this->scrollPagina;
	}

	public function setScrollPagina()
	{
		$rowData = $this->getRowData();
		$this->scrollPagina = $rowData->scrollPagina;
		return $this;
	}

}

class paginator
{
	const CANTIDAD_REGISTROS = 20;

	private ?string $action = ""; //la ? es para permitir que sea nulo
	private int $page = 1;
	private postData $postData;
	private string $response = "";

	public function __construct() 
	{

	}

	public function getAction()
	{
		return $this->action;
	}

	public function setAction()
	{	
		if (isset($_POST['atras']) ^ isset($_POST['alante'])) {
			$this->action = 'post_action';
		}

		return $this;
	}

	public function getPage()
	{
		return $this->page;
	}

	public function setPage()
	{
		if (!empty($_GET['pagina'])) {
			$this->page = intval($_GET['pagina']);
		}

		if (isset($_POST['atras'])) {
			$pagina = intval($_POST['pagina']);
			$this->page = $pagina-1;
		}elseif (isset($_POST['alante'])) {
			$pagina = intval($_POST['pagina']);
			$this->page = $pagina+1;		
		}

		return $this;
	}

	public function getPostData()
	{
		return $this->postData;
	}

	public function setPostData($postData)
	{
		$this->postData = $postData;
		return $this;
	}

	public function getResponse()
	{
		return $this->response;
	}

	public function setResponse($response)
	{
		$this->response = $response;
		return $this;
	}
}

$paginator = new paginator();
$postData = new postData();

$postData->setScrollPagina();
$paginator->setPostData($postData);
$paginator->setAction();
$paginator->setPage();

if (isset($_POST['atras']) || isset($_POST['alante']) || isset($_GET['pagina'])) {
// if (!is_null($paginator->getAction()) || $paginator->getPage()) {
	// die('redireccion matada');
	header('Location: listado.php?pagina=' . $paginator->getPage());
}


if ($paginator->getPostData()->getScrollPagina()) {

	$numero = $paginator->getPostData()->getScrollPagina();
	$inicio = $numero * paginator::CANTIDAD_REGISTROS;
	$usuariosOBJ = mostrarLista($inicio, paginator::CANTIDAD_REGISTROS);
	$response = [];
	while ($usuario = $usuariosOBJ->fetch_object()) {
		$response [] = [
			"emp_no" => $usuario->emp_no,
			"birth_date" => $usuario->birth_date,
			"first_name" => $usuario->first_name,
			"last_name" => $usuario->last_name,
			"gender" => $usuario->gender,
			"hire_date" => $usuario->hire_date
		];
	}
	
	echo json_encode($response);
}

//METODO CHAPUZA

die();

$cantidadRegistrosScroll = 20;
if (isset($_POST['atras'])) {
	$pagina = intval($_POST['pagina']);
	$pagina = $pagina-1;
	header('Location: listado.php?pagina='.$pagina);
}elseif (isset($_POST['alante'])) {
	$pagina = intval($_POST['pagina']);
	$pagina = $pagina+1;
	header('Location: listado.php?pagina='.$pagina);
}
if (isset($_GET['pagina'])) {
	$pagina = $_GET['pagina'];
	header('Location: listado.php?pagina='.$pagina);
}

//PARA EL SCROLL
$data = file_get_contents('php://input');
$contador = json_decode($data);
if (!empty($contador->scrollPagina)) {
	$numeroContador = $contador->scrollPagina;
	$inicio = $numeroContador*$cantidadRegistrosScroll;
	$usuariosOBJ = mostrarLista($inicio, $cantidadRegistrosScroll);
	$response = [];
	while ($usuario = $usuariosOBJ->fetch_object()) {
		$response [] = [
			"emp_no" => $usuario->emp_no,
			"birth_date" => $usuario->birth_date,
			"first_name" => $usuario->first_name,
			"last_name" => $usuario->last_name,
			"gender" => $usuario->gender,
			"hire_date" => $usuario->hire_date
		];
	}
	
	echo json_encode($response);
}
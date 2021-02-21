<?php

class Categoria
{
	private $id;
	private $nombre;
	private $db;

	public function __construct()
	{
		$this->db = Database::connect();
	}

	function getId()
	{
		return $this->id;
	}

	function getNombre()
	{
		return $this->nombre;
	}

	function setId($id)
	{
		$this->id = $id;
	}

	function setNombre($nombre)
	{
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	public function getAll()
	{
		$categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
		return $categorias;
	}

	public function getOne()
	{
		$categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()}");
		return $categoria->fetch_object();
	}

	public function save()
	{
		$sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}


	//A�ADIDO RUBEN

	//RENOMBRAR CATEGORIA RUBEN
	function getCodigo()
	{
		return $this->codigo;
	}


	public function renombrar()
	{
		$sql = "UPDATE categorias SET nombre='{$this->getNombre()}' WHERE id={$this->getId()};";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function getTotalCategorias($num)
	{
		$count = 0;
		$categorias = $this->db->query("SELECT sum(productos.stock) as stock 
		FROM categorias inner join productos on productos.categoria_id = categorias.id where categoria_id=$num
		");

		while ($cat = $categorias->fetch_object()) {
			$dato = $cat->stock;
		}

		return $dato;
	}

	public function getAllCat()
	{
		$categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
		$total = $categorias->num_rows;
		return $total;
	}

	public function getAllVendidos($cat)
	{

		$categorias = $this->db->query("SELECT sum(l.unidades) as unidades 
			FROM lineas_pedidos l INNER JOIN productos p on l.producto_id = p.id
			inner join categorias c on p.categoria_id = c.id where c.id=$cat");

		while ($cat = $categorias->fetch_object()) {
			$datos = $cat->unidades;
		}

		return $datos;
	}
}

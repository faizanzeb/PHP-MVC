<?php
namespace Codecourse\Library;

class Model
{
	public $connection;
	protected $table;
	protected $primaryKey;
	
	function __construct($host, $user, $pass, $db)
	{
		$this->connection = mysqli_connect($host, $user, $pass, $db);
	}

	public function all()
	{
		$query = "SELECT * FROM {$this->table}";
		$result = mysqli_query($this->connection, $query);
		$records = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$records[] = $row;
		}
		return $records;
	}

	public function save()
	{
		$query = "INSERT INTO {$this->table}
					(name, email, phone, address, designation)
				  VALUES
				  	('{$this->name}','{$this->email}','{$this->phone}','{$this->address}','{$this->designation}')";
		$result = mysqli_query($this->connection, $query);
		return $result;
	}

	public function update($id)
	{
		$query = "UPDATE {$this->table} SET
					name 		= '{$this->name}',
					email 		= '{$this->email}',
					phone 		= '{$this->phone}',
					address 	= '{$this->address}',
					designation = '{$this->designation}'
				  WHERE {$this->primaryKey} = '{$id}'";
		$result = mysqli_query($this->connection, $query);
		return $result;
	}

	public function findById($id)
	{
		return mysqli_fetch_assoc(mysqli_query($this->connection, "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = '{$id}'"));
	}

	public function delete($id)
	{
		return mysqli_query($this->connection, "DELETE FROM {$this->table} WHERE {$this->primaryKey} = '{$id}'");
	}

	public function __destruct()
	{
		mysqli_close($this->connection);
	}
}
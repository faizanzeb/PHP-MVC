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

	public function save($data)
	{
		$columns = [];
		$values = [];
		foreach ($data as $column => $value) {
			$columns[] = $column;
			$values[] = "'" . $value . "'";
		}
		$cString = implode(',', $columns);
		$vString = implode(',', $values);
		$query = "INSERT INTO {$this->table}
					({$cString})
				  VALUES
				  	({$vString})";
		$result = mysqli_query($this->connection, $query);
		return $result;
	}

	

	public function update($data, $id)
	{

	$columns = array();
	$values = array();
	foreach ($data as $column => $value) {
		$columns[] = $column;
		$values[] = "'" . $value . "'";
	}

		
		
		$query = "UPDATE {$this->table} SET
					{$columns[0]} = {$values[0]},
					{$columns[1]} = {$values[1]},
					{$columns[2]} = {$values[2]},
					{$columns[3]} = {$values[3]},
					{$columns[4]} = {$values[4]}
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
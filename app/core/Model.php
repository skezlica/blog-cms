<?php

class Model {
    protected $db;
    protected $table;
    protected $allowedColumns;
    protected $limit = 10;
    protected $offset = 0;
    protected $order_type = 'desc';
    protected $order_column = 'id';
    public $errors = [];

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findAll() {
        $query = "SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";
        return $this->db->query($query);
    }

    public function where($data, $data_not = []) {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";
        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }
        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }
        $query = rtrim($query, " AND ");
        $query .= " ORDER BY $this->order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";
        $data = array_merge($data, $data_not);
        return $this->db->query($query, $data);
    }
    
    public function first($data, $data_not = []) {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";
        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }
        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }
        $query = rtrim($query, " AND ");
        $query .= " LIMIT $this->limit OFFSET $this->offset";
        $data = array_merge($data, $data_not);
        $result = $this->db->query($query, $data);
        if ($result) {
            return $result[0];
        }
        return false;
    }

    public function insert($data) {
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (".implode(", ",$keys).") VALUES (:".implode(", :",$keys).")";
        $this->db->query($query, $data);
        return false;
    }

    public function update($id, $data, $id_column = "id") {
        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";
        foreach ($keys as $key) {
            $query .= "$key = :$key, ";
        }
        $query = rtrim($query, ", ");
        $query .= " WHERE $id_column = :$id_column ";
        $data[$id_column] = $id;
        $this->db->query($query, $data);
        return false;
    }

    public function delete($id, $id_column = "id") {
        $data[$id_column] = $id;
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column";
        $this->db->query($query, $data);
    }

    public function joinTables($joins, $selectColumns, $orderColumn = null) {
        $selectQuery = "$this->table.*";
        foreach ($selectColumns as $table => $columns) {
            foreach ($columns as $column) {
                $selectQuery .= ", $table.$column";
            }
        }
        $query = "SELECT $selectQuery FROM $this->table";
        foreach ($joins as $table => $on) {
            $query .= " LEFT JOIN $table ON $on";
        }
        $orderSql = ($orderColumn !== null) ? "ORDER BY $orderColumn DESC" : '';
        $query .= " $orderSql";
        return $this->db->query($query);
    }
}

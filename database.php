<?php
    class Database {
        private $host;
        private $username;
        private $password;
        private $database;
        private $connection;

        // Constructor to set the connection credentials
        public function __construct($host, $username, $password, $database) {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }

        // Method to establish a database connection
        public function connect() {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }
        }

        // Method to insert data into the specified table and columns using prepared statement
        public function insert($table, $columns, $values) {
            $columnsStr = implode(', ', $columns);
            $placeholders = rtrim(str_repeat('?,', count($values)), ',');
            $sql = "INSERT INTO $table ($columnsStr) VALUES ($placeholders)";

            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param(str_repeat('s', count($values)), ...$values);
            $result = $stmt->execute();
            $stmt->close();

            return $result;
        }

        // Method to select data from the specified table using prepared statement
        public function select($table) {
            $sql = "SELECT * FROM $table";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

            return $result;
        }

        // Method to update a record in the specified table by ID using prepared statement
        public function update($table, $id, $fields) {
            $fieldValues = array();
            foreach ($fields as $column => $value) {
                $fieldValues[] = "$column = ?";
            }
            $fieldValuesStr = implode(', ', $fieldValues);
            $sql = "UPDATE $table SET $fieldValuesStr WHERE id = ?";

            $values = array_merge(array_values($fields), [$id]);
            $types = str_repeat('s', count($values));
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param($types, ...$values);
            $result = $stmt->execute();
            $stmt->close();

            return $result;
        }

        // Method to delete a record from the specified table by ID using prepared statement
        public function delete($table, $id) {
            $sql = "DELETE FROM $table WHERE id = ?";

            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('i', $id);
            $result = $stmt->execute();
            $stmt->close();

            return $result;
        }

        // Method to close the database connection
        public function close() {
            $this->connection->close();
        }
    }
?>
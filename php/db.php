<?php

class DBService
{
    private $_pdo;
    private $_config = [
        'host' => '127.0.0.1',
        'database' => 'uekat-project',
        'user' => 'root',
        'password' => 'root'
    ];

    private function _getDsn() {
        return 'mysql:host=' . $this->_config['host'] . ';dbname=' . $this->_config['database'] . ';charset=utf8mb4';
    }

    public function __construct() {
        $dsn = $this->_getDsn();
        
        try {
            $this->_pdo = new PDO($dsn, $this->_config['user'], $this->_config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        } 
    }

    public function query($query) {
        $stmt = $this->_pdo->query($query);
        $records = [];

        while ($record = $stmt->fetch()) {
            $records[] = $record;
        }

        return $records;
    }
}
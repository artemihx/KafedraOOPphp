<?php

namespace Services;

use Exception;
use PDO;
use PDOException;

class Db
{
    /** @var \PDO */
    private $pdo;

    private static $instance;
    private function __construct()
    {
        try {
            $this->pdo = new PDO(
                'pgsql:host=' . 'postgres' . ';dbname=' . 'postgres',
                'postgres',
                'postgres'
            );
        } catch (PDOException $e) {
            throw new Exception('Ошибка при подключении к базе данных' . $e->getMessage());
        }
    }

    public function query(string $sql, $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getLastInsertId(): int
    {
        return (int) $this->pdo->lastInsertId();
    }
}

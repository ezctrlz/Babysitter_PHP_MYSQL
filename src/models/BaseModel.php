<?php
require_once ERRORS_DIR . "DBError.php";
class BaseModel {
    protected PDO $pdo;
    protected string $tableName;
    protected string $tableId;
    public function __construct() {
        $this->pdo = DB::getPDO();
    }

    public function getById($id)
    {
        $st = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE {$this->tableId} = ?");
        $st->execute([$id]);
        $item = $st->fetch(PDO::FETCH_ASSOC);
        $st->closeCursor();
        return $item;
    }

    public function create($values, $valuesColumns = '')
    {
        $prepareValues = "VALUES (".implode(", ", array_map(
            function ($value) { return "?"; },
            $values
        )).")";
        $st = $this->pdo->prepare("INSERT INTO {$this->tableName} $valuesColumns $prepareValues");
        $created = $st->execute($values);
        if(!$created) {
            $errorInfo = implode(" - ", $st->errorInfo());
            throw new DBError("$errorInfo", $st->errorCode());
        }
        return $this->getById($this->pdo->lastInsertId());
    }
}
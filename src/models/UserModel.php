<?php
class UserModel extends BaseModel
{
    protected string $tableName = 'user';
    protected string $tableId = 'user_id';

    public function getByUserName($username)
    {
        $st = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE username = ?");
        $st->execute([$username]);
        $item = $st->fetch(PDO::FETCH_ASSOC);
        $st->closeCursor();
        return $item;
    }
}

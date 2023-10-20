<?php
require("persistence/DatabaseConnection.php");
class Articles
{
    private const TABLE_NAME = "news";
    public function getById(int $id)
    {
        $connection = $this->getConnection();
        $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE Id = $id";
        $stmt = $connection->query($sql);
        $article = $stmt->fetch();
        return $article;
    }
    public function getPageArticles(int $pageNumber, int $pageSize)
    {
        $connection = $this->getConnection();
        $startingRow = ($pageNumber - 1) * $pageSize;
        $rowCount = $pageSize;
        $sql = "SELECT id, date, title, announce FROM " . self::TABLE_NAME . " ORDER BY date DESC LIMIT $startingRow, $rowCount;";
        $stmt = $connection->query($sql);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    public function getLatestArticle()
    {
        $connection = $this->getConnection();
        $sql = "SELECT id, date, title, announce, image FROM " . self::TABLE_NAME . " ORDER BY date DESC LIMIT 1;";
        $stmt = $connection->query($sql);
        $article = $stmt->fetch();
        return $article;
    }
    public function getPagesCount($pageSize)
    {
        $connection = $this->getConnection();
        $sql = "SELECT COUNT(*) FROM " . self::TABLE_NAME . ";";
        $stmt = $connection->query($sql);
        $rowsCount = $stmt->fetch();
        return ceil($rowsCount['COUNT(*)'] / $pageSize);
    }
    private function getConnection()
    {
        $databaseConnection = new DatabaseConnection();
        return $databaseConnection->getConnection();
    }
}

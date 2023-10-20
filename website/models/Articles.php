<?php
require("persistence/DatabaseConnection.php");
class Articles
{
    private const TABLE_NAME = "news";
    public function getById(int $id)
    {
        $connection = $this->getConnection();
        $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE Id = $id";
        $result = $connection->query($sql);
        $article = $result->fetch_assoc();
        return $article;
    }
    public function getPageArticles(int $pageNumber, int $pageSize)
    {
        $connection = $this->getConnection();
        $startingRow = ($pageNumber - 1) * $pageSize;
        $rowCount = $pageSize;
        $sql = "SELECT id, date, title, announce FROM " . self::TABLE_NAME . " ORDER BY date DESC LIMIT $startingRow, $rowCount;";
        $result = $connection->query($sql);
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    public function getLatestArticle()
    {
        $connection = $this->getConnection();
        $sql = "SELECT id, date, title, announce, image FROM " . self::TABLE_NAME . " ORDER BY date DESC LIMIT 1;";
        $result = $connection->query($sql);
        $article = $result->fetch_assoc();
        return $article;
    }
    public function getPagesCount($pageSize)
    {
        $connection = $this->getConnection();
        $sql = "SELECT COUNT(*) FROM " . self::TABLE_NAME . ";";
        $result = $connection->query($sql);
        $rowsCount = $result->fetch_assoc();
        return ceil($rowsCount['COUNT(*)'] / $pageSize);
    }
    private function getConnection()
    {
        $databaseConnection = new DatabaseConnection();
        return $databaseConnection->getConnection();
    }
}

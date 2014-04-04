<?php
namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
Doctrine\DBAL\Schema\Schema,
Doctrine\DBAL\Schema\Table,
Doctrine\DBAL\Schema\Column,
Doctrine\DBal\Types\Type;

class Version20140307092403 extends AbstractMigration
{
/**
* @param Schema $schema
*/
public function up(Schema $schema)
{
if (!$schema->hasTable('basket')) {
$sql = <<<SQL
    CREATE TABLE basket (
basketId VARCHAR (255), itemId int, number int
) ENGINE=InnoDB DEFAULT CHARSET=utf8
SQL;
$this->addSql($sql);

}

}

/**
* @param Schema $schema
*/
public function down(Schema $schema)
{
if ($schema->hasTable('basket')) {
$schema->dropTable('basket');
}
}
}
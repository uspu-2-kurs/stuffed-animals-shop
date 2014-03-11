<?php
namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
Doctrine\DBAL\Schema\Schema,
Doctrine\DBAL\Schema\Table,
Doctrine\DBAL\Schema\Column,
Doctrine\DBal\Types\Type;

class Version20140225100501 extends AbstractMigration
{
public function up(Schema $schema)
{
if (!$schema->hasTable('categories')) {
$sql = <<<SQL
    SQL код для создания таблицы
   create table Задание01 (
   itemId int Primary key auto_increment,
   var char(225)
   text
   decimal(10,2)
   );
SQL;
$this->addSql($sql);
}
}
public function down(Schema $schema)
{
if ($schema->hasTable('categories')) {
$schema->dropTable('categories');
}
}
}
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
create table categories (
   categoryId int Primary key auto_increment,
   categoryName varchar(225)
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

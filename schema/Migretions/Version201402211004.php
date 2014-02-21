<?php
namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema,
    Doctrine\DBAL\Schema\Table,
    Doctrine\DBAL\Schema\Column,
    Doctrine\DBal\Types\Type;

class Version20140211155200 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        if (!$schema->hasTable('table_name')) {
            $sql = <<<SQL
CREATE TABLE categories (
Описание полей
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
        if ($schema->hasTable('table_name')) {
            $schema->dropTable('table_name');
        }
    }
}


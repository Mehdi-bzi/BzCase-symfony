<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210309145750 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entityestdeux ADD entityest_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entityestdeux ADD CONSTRAINT FK_E36C170C1857D9 FOREIGN KEY (entityest_id) REFERENCES entityest (id)');
        $this->addSql('CREATE INDEX IDX_E36C170C1857D9 ON entityestdeux (entityest_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entityestdeux DROP FOREIGN KEY FK_E36C170C1857D9');
        $this->addSql('DROP INDEX IDX_E36C170C1857D9 ON entityestdeux');
        $this->addSql('ALTER TABLE entityestdeux DROP entityest_id');
    }
}

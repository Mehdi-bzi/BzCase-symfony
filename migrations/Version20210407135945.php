<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210407135945 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED5814DB6A4E');
        $this->addSql('DROP TABLE mileage');
        $this->addSql('DROP INDEX IDX_77E0ED5814DB6A4E ON ad');
        $this->addSql('ALTER TABLE ad CHANGE mileage_id mileage INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mileage (id INT AUTO_INCREMENT NOT NULL, kilometres INT NOT NULL, is_fit TINYINT(1) DEFAULT NULL, min_km INT DEFAULT NULL, max_km INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ad CHANGE mileage mileage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED5814DB6A4E FOREIGN KEY (mileage_id) REFERENCES mileage (id)');
        $this->addSql('CREATE INDEX IDX_77E0ED5814DB6A4E ON ad (mileage_id)');
    }
}

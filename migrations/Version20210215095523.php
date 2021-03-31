<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210215095523 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ad (id INT AUTO_INCREMENT NOT NULL, garage_id INT NOT NULL, brand_id INT DEFAULT NULL, gasoline_id INT DEFAULT NULL, mileage_id INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, date_circulation DATE NOT NULL, price INT NOT NULL, INDEX IDX_77E0ED58C4FFF555 (garage_id), INDEX IDX_77E0ED5844F5D008 (brand_id), INDEX IDX_77E0ED583CBFBA22 (gasoline_id), INDEX IDX_77E0ED5814DB6A4E (mileage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garage (id INT AUTO_INCREMENT NOT NULL, professional_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, INDEX IDX_9F26610BDB77003 (professional_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gasoline (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mileage (id INT AUTO_INCREMENT NOT NULL, kilometres INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, brand_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_D79572D944F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, ad_id INT DEFAULT NULL, url VARCHAR(255) NOT NULL, is_main TINYINT(1) NOT NULL, INDEX IDX_14B784184F34D596 (ad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professional (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, siret VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED58C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED5844F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED583CBFBA22 FOREIGN KEY (gasoline_id) REFERENCES gasoline (id)');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED5814DB6A4E FOREIGN KEY (mileage_id) REFERENCES mileage (id)');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610BDB77003 FOREIGN KEY (professional_id) REFERENCES professional (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784184F34D596 FOREIGN KEY (ad_id) REFERENCES ad (id)');
        $this->addSql('DROP TABLE annonce');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784184F34D596');
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED5844F5D008');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D944F5D008');
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED58C4FFF555');
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED583CBFBA22');
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED5814DB6A4E');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610BDB77003');
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, price INT NOT NULL, kilometrage INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE ad');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE gasoline');
        $this->addSql('DROP TABLE mileage');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE professional');
    }
}

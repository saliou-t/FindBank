<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210704114116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commune (id INT AUTO_INCREMENT NOT NULL, departement_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, INDEX IDX_E2E2D1EECCF9E01E (departement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, region_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, INDEX IDX_C1765B6398260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quartier (id INT AUTO_INCREMENT NOT NULL, commune_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, INDEX IDX_FEE8962D131A4F72 (commune_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, superficie DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EECCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B6398260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE quartier ADD CONSTRAINT FK_FEE8962D131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
        $this->addSql('ALTER TABLE localites ADD id_quertier_id INT NOT NULL');
        $this->addSql('ALTER TABLE localites ADD CONSTRAINT FK_B4F103A39AE0CB50 FOREIGN KEY (id_quertier_id) REFERENCES quartier (id)');
        $this->addSql('CREATE INDEX IDX_B4F103A39AE0CB50 ON localites (id_quertier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quartier DROP FOREIGN KEY FK_FEE8962D131A4F72');
        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EECCF9E01E');
        $this->addSql('ALTER TABLE localites DROP FOREIGN KEY FK_B4F103A39AE0CB50');
        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B6398260155');
        $this->addSql('DROP TABLE commune');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE quartier');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP INDEX IDX_B4F103A39AE0CB50 ON localites');
        $this->addSql('ALTER TABLE localites DROP id_quertier_id');
    }
}

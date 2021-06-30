<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210630194924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE banques (id INT AUTO_INCREMENT NOT NULL, nom_id INT DEFAULT NULL, localite_id INT DEFAULT NULL, coordonnes_id INT DEFAULT NULL, INDEX IDX_34D04547C8121CE9 (nom_id), INDEX IDX_34D04547924DD2B5 (localite_id), UNIQUE INDEX UNIQ_34D045478770E470 (coordonnes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coordonnees (id INT AUTO_INCREMENT NOT NULL, latitude VARCHAR(100) NOT NULL, longitude VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localites (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(150) NOT NULL, region VARCHAR(150) NOT NULL, departement VARCHAR(150) NOT NULL, commune VARCHAR(150) NOT NULL, quartier VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operateurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(150) NOT NULL, libelle LONGTEXT NOT NULL, nbre_banks INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operators (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(150) NOT NULL, libelle LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE banques ADD CONSTRAINT FK_34D04547C8121CE9 FOREIGN KEY (nom_id) REFERENCES operateurs (id)');
        $this->addSql('ALTER TABLE banques ADD CONSTRAINT FK_34D04547924DD2B5 FOREIGN KEY (localite_id) REFERENCES localites (id)');
        $this->addSql('ALTER TABLE banques ADD CONSTRAINT FK_34D045478770E470 FOREIGN KEY (coordonnes_id) REFERENCES coordonnees (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE banques DROP FOREIGN KEY FK_34D045478770E470');
        $this->addSql('ALTER TABLE banques DROP FOREIGN KEY FK_34D04547924DD2B5');
        $this->addSql('ALTER TABLE banques DROP FOREIGN KEY FK_34D04547C8121CE9');
        $this->addSql('DROP TABLE banques');
        $this->addSql('DROP TABLE coordonnees');
        $this->addSql('DROP TABLE localites');
        $this->addSql('DROP TABLE operateurs');
        $this->addSql('DROP TABLE operators');
    }
}

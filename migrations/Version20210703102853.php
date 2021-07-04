<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210703102853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE banques DROP FOREIGN KEY FK_34D045478770E470');
        $this->addSql('CREATE TABLE votes (id INT AUTO_INCREMENT NOT NULL, id_banque_id INT DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, INDEX IDX_518B7ACFB7D53CFE (id_banque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE votes ADD CONSTRAINT FK_518B7ACFB7D53CFE FOREIGN KEY (id_banque_id) REFERENCES banques (id)');
        $this->addSql('DROP TABLE coordonnees');
        $this->addSql('DROP INDEX UNIQ_34D045478770E470 ON banques');
        $this->addSql('ALTER TABLE banques ADD latitude VARCHAR(100) DEFAULT NULL, ADD longitude VARCHAR(100) DEFAULT NULL, ADD jours_ouverture VARCHAR(15) DEFAULT NULL, ADD heur_ouverture VARCHAR(15) DEFAULT NULL, ADD heur_fermiture VARCHAR(15) DEFAULT NULL, DROP coordonnes_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coordonnees (id INT AUTO_INCREMENT NOT NULL, latitude VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, longitude VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE votes');
        $this->addSql('ALTER TABLE banques ADD coordonnes_id INT DEFAULT NULL, DROP latitude, DROP longitude, DROP jours_ouverture, DROP heur_ouverture, DROP heur_fermiture');
        $this->addSql('ALTER TABLE banques ADD CONSTRAINT FK_34D045478770E470 FOREIGN KEY (coordonnes_id) REFERENCES coordonnees (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_34D045478770E470 ON banques (coordonnes_id)');
    }
}

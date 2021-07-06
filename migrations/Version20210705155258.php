<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210705155258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE localites ADD quartier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE localites ADD CONSTRAINT FK_B4F103A3DF1E57AB FOREIGN KEY (quartier_id) REFERENCES quartier (id)');
        $this->addSql('CREATE INDEX IDX_B4F103A3DF1E57AB ON localites (quartier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE localites DROP FOREIGN KEY FK_B4F103A3DF1E57AB');
        $this->addSql('DROP INDEX IDX_B4F103A3DF1E57AB ON localites');
        $this->addSql('ALTER TABLE localites DROP quartier_id');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210705154827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE localites DROP FOREIGN KEY FK_B4F103A39AE0CB50');
        $this->addSql('DROP INDEX IDX_B4F103A39AE0CB50 ON localites');
        $this->addSql('ALTER TABLE localites DROP id_quertier_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE localites ADD id_quertier_id INT NOT NULL');
        $this->addSql('ALTER TABLE localites ADD CONSTRAINT FK_B4F103A39AE0CB50 FOREIGN KEY (id_quertier_id) REFERENCES quartier (id)');
        $this->addSql('CREATE INDEX IDX_B4F103A39AE0CB50 ON localites (id_quertier_id)');
    }
}

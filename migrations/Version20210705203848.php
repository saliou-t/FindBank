<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210705203848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE banques DROP FOREIGN KEY FK_34D04547C8121CE9');
        $this->addSql('DROP INDEX IDX_34D04547C8121CE9 ON banques');
        $this->addSql('ALTER TABLE banques CHANGE nom_id operateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE banques ADD CONSTRAINT FK_34D045473F192FC FOREIGN KEY (operateur_id) REFERENCES operateurs (id)');
        $this->addSql('CREATE INDEX IDX_34D045473F192FC ON banques (operateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE banques DROP FOREIGN KEY FK_34D045473F192FC');
        $this->addSql('DROP INDEX IDX_34D045473F192FC ON banques');
        $this->addSql('ALTER TABLE banques CHANGE operateur_id nom_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE banques ADD CONSTRAINT FK_34D04547C8121CE9 FOREIGN KEY (nom_id) REFERENCES operateurs (id)');
        $this->addSql('CREATE INDEX IDX_34D04547C8121CE9 ON banques (nom_id)');
    }
}

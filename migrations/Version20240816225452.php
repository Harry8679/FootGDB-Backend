<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240816225452 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE goal ADD match_teams_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE goal ADD CONSTRAINT FK_FCDCEB2EB4C8584 FOREIGN KEY (match_teams_id) REFERENCES match_teams (id)');
        $this->addSql('CREATE INDEX IDX_FCDCEB2EB4C8584 ON goal (match_teams_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE goal DROP FOREIGN KEY FK_FCDCEB2EB4C8584');
        $this->addSql('DROP INDEX IDX_FCDCEB2EB4C8584 ON goal');
        $this->addSql('ALTER TABLE goal DROP match_teams_id');
    }
}

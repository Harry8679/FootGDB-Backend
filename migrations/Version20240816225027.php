<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240816225027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE match_teams ADD home_team_id INT DEFAULT NULL, ADD away_team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE match_teams ADD CONSTRAINT FK_28A85DF99C4C13F6 FOREIGN KEY (home_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE match_teams ADD CONSTRAINT FK_28A85DF945185D02 FOREIGN KEY (away_team_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_28A85DF99C4C13F6 ON match_teams (home_team_id)');
        $this->addSql('CREATE INDEX IDX_28A85DF945185D02 ON match_teams (away_team_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE match_teams DROP FOREIGN KEY FK_28A85DF99C4C13F6');
        $this->addSql('ALTER TABLE match_teams DROP FOREIGN KEY FK_28A85DF945185D02');
        $this->addSql('DROP INDEX IDX_28A85DF99C4C13F6 ON match_teams');
        $this->addSql('DROP INDEX IDX_28A85DF945185D02 ON match_teams');
        $this->addSql('ALTER TABLE match_teams DROP home_team_id, DROP away_team_id');
    }
}

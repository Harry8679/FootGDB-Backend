<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240816231456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team_standing ADD team_id INT DEFAULT NULL, ADD played INT NOT NULL, ADD won INT NOT NULL, ADD drawn INT NOT NULL, ADD lost INT NOT NULL, ADD goals_for INT NOT NULL, ADD goals_against INT NOT NULL, ADD goal_difference INT NOT NULL');
        $this->addSql('ALTER TABLE team_standing ADD CONSTRAINT FK_D9D856A6296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D9D856A6296CD8AE ON team_standing (team_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team_standing DROP FOREIGN KEY FK_D9D856A6296CD8AE');
        $this->addSql('DROP INDEX UNIQ_D9D856A6296CD8AE ON team_standing');
        $this->addSql('ALTER TABLE team_standing DROP team_id, DROP played, DROP won, DROP drawn, DROP lost, DROP goals_for, DROP goals_against, DROP goal_difference');
    }
}

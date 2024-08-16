<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240816232748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE match_day (id INT AUTO_INCREMENT NOT NULL, day_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE match_teams ADD match_day_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE match_teams ADD CONSTRAINT FK_28A85DF9A8ADB827 FOREIGN KEY (match_day_id) REFERENCES match_day (id)');
        $this->addSql('CREATE INDEX IDX_28A85DF9A8ADB827 ON match_teams (match_day_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE match_teams DROP FOREIGN KEY FK_28A85DF9A8ADB827');
        $this->addSql('DROP TABLE match_day');
        $this->addSql('DROP INDEX IDX_28A85DF9A8ADB827 ON match_teams');
        $this->addSql('ALTER TABLE match_teams DROP match_day_id');
    }
}

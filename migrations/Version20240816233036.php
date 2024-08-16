<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240816233036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE match_day ADD season_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE match_day ADD CONSTRAINT FK_E1EE884E4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('CREATE INDEX IDX_E1EE884E4EC001D1 ON match_day (season_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE match_day DROP FOREIGN KEY FK_E1EE884E4EC001D1');
        $this->addSql('DROP INDEX IDX_E1EE884E4EC001D1 ON match_day');
        $this->addSql('ALTER TABLE match_day DROP season_id');
    }
}

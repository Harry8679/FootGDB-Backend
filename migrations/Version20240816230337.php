<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240816230337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assist ADD goal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE assist ADD CONSTRAINT FK_A1EE878E667D1AFE FOREIGN KEY (goal_id) REFERENCES goal (id)');
        $this->addSql('CREATE INDEX IDX_A1EE878E667D1AFE ON assist (goal_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assist DROP FOREIGN KEY FK_A1EE878E667D1AFE');
        $this->addSql('DROP INDEX IDX_A1EE878E667D1AFE ON assist');
        $this->addSql('ALTER TABLE assist DROP goal_id');
    }
}

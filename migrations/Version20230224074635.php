<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230224074635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE saison ADD program_id INT NOT NULL');
        $this->addSql('ALTER TABLE saison ADD CONSTRAINT FK_C0D0D5863EB8070A FOREIGN KEY (program_id) REFERENCES program (id)');
        $this->addSql('CREATE INDEX IDX_C0D0D5863EB8070A ON saison (program_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE saison DROP FOREIGN KEY FK_C0D0D5863EB8070A');
        $this->addSql('DROP INDEX IDX_C0D0D5863EB8070A ON saison');
        $this->addSql('ALTER TABLE saison DROP program_id');
    }
}

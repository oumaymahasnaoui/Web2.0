<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231022110506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author ADD nb_books INT NOT NULL, DROP book, CHANGE username username VARCHAR(150) NOT NULL');
        $this->addSql('ALTER TABLE book CHANGE ref ref INT NOT NULL, CHANGE publication_date publication_date DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author ADD book VARCHAR(255) NOT NULL, DROP nb_books, CHANGE username username VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE book CHANGE ref ref VARCHAR(255) NOT NULL, CHANGE publication_date publication_date VARCHAR(255) NOT NULL');
    }
}

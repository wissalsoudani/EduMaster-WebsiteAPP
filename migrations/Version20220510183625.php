<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220510183625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activites ADD updated_at DATETIME DEFAULT NULL, CHANGE prix_activite prix_activite DOUBLE PRECISION NOT NULL, CHANGE description description TEXT NOT NULL');
        $this->addSql('ALTER TABLE articles ADD idActivites INT DEFAULT NULL, CHANGE contenu contenu TEXT NOT NULL');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD31688A8175E3 FOREIGN KEY (idActivites) REFERENCES activites (id_activites)');
        $this->addSql('CREATE INDEX IDX_BFDD31688A8175E3 ON articles (idActivites)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activites DROP updated_at, CHANGE prix_activite prix_activite VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD31688A8175E3');
        $this->addSql('DROP INDEX IDX_BFDD31688A8175E3 ON articles');
        $this->addSql('ALTER TABLE articles DROP idActivites, CHANGE contenu contenu VARCHAR(255) NOT NULL');
    }
}

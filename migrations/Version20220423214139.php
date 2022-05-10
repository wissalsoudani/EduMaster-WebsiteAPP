<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220423214139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', DROP id_abonnement, DROP niveau, DROP code, DROP etat, CHANGE login login VARCHAR(180) NOT NULL, CHANGE mdp mdp VARCHAR(255) NOT NULL, CHANGE nom nom VARCHAR(180) NOT NULL, CHANGE prenom prenom VARCHAR(180) NOT NULL, CHANGE mail mail VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649AA08CB10 ON user (login)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_8D93D649AA08CB10 ON user');
        $this->addSql('ALTER TABLE user ADD id_abonnement INT DEFAULT NULL, ADD niveau INT NOT NULL, ADD code TEXT DEFAULT NULL, ADD etat VARCHAR(10) DEFAULT \'NULL\', DROP roles, CHANGE login login VARCHAR(50) NOT NULL, CHANGE mdp mdp VARCHAR(50) NOT NULL, CHANGE nom nom VARCHAR(15) NOT NULL, CHANGE prenom prenom VARCHAR(15) NOT NULL, CHANGE mail mail VARCHAR(50) NOT NULL');
    }
}

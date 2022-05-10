<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220510181246 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abonnement (id_abonnement INT AUTO_INCREMENT NOT NULL, login_user VARCHAR(20) NOT NULL, Type TEXT NOT NULL, PRIMARY KEY(id_abonnement)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activites (id_activites INT AUTO_INCREMENT NOT NULL, date_activite VARCHAR(255) NOT NULL, prix_activite DOUBLE PRECISION NOT NULL, type_activite VARCHAR(30) NOT NULL, titre VARCHAR(255) NOT NULL, description TEXT NOT NULL, image VARCHAR(255) NOT NULL, lieu VARCHAR(255) NOT NULL, PRIMARY KEY(id_activites)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id_admin INT AUTO_INCREMENT NOT NULL, id_abonnement INT DEFAULT NULL, login VARCHAR(10) NOT NULL, mdp VARCHAR(50) NOT NULL, nom TEXT DEFAULT NULL, prenom TEXT DEFAULT NULL, niveau TEXT DEFAULT NULL, mail VARCHAR(20) NOT NULL, PRIMARY KEY(id_admin)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles (id_articles INT AUTO_INCREMENT NOT NULL, date_article VARCHAR(255) NOT NULL, nombre_like INT NOT NULL, nombre_commentaire INT NOT NULL, titre VARCHAR(256) NOT NULL, contenu TEXT NOT NULL, PRIMARY KEY(id_articles)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(50) NOT NULL, libelle VARCHAR(50) NOT NULL, responsable VARCHAR(50) NOT NULL, adresse VARCHAR(50) NOT NULL, ville VARCHAR(50) NOT NULL, tel VARCHAR(50) NOT NULL, portable VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, matfisc VARCHAR(50) NOT NULL, cin VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, Numc VARCHAR(50) NOT NULL, client VARCHAR(50) NOT NULL, datecomm DATE NOT NULL, observation VARCHAR(50) NOT NULL, totht VARCHAR(50) NOT NULL, tottva VARCHAR(50) NOT NULL, totttc VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compteur (id INT AUTO_INCREMENT NOT NULL, numcom INT NOT NULL, numl VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id_cours INT AUTO_INCREMENT NOT NULL, nom_cours VARCHAR(30) NOT NULL, contenu_cours VARCHAR(150) NOT NULL, nb_pages INT NOT NULL, nb_chapitres INT NOT NULL, PRIMARY KEY(id_cours)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exercices (id_exercices INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id_exercices)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, client VARCHAR(50) NOT NULL, base0 VARCHAR(50) NOT NULL, base1 VARCHAR(50) NOT NULL, tva1 VARCHAR(50) NOT NULL, base2 VARCHAR(50) NOT NULL, tva2 VARCHAR(50) NOT NULL, base3 VARCHAR(50) NOT NULL, tva3 VARCHAR(50) NOT NULL, totht VARCHAR(50) NOT NULL, totrem VARCHAR(50) NOT NULL, tottva VARCHAR(50) NOT NULL, timbre VARCHAR(50) NOT NULL, tottc VARCHAR(50) NOT NULL, rs VARCHAR(50) NOT NULL, montrs VARCHAR(50) NOT NULL, net VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, Produits VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fornisseur (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(50) NOT NULL, libelle VARCHAR(50) NOT NULL, responsable VARCHAR(50) NOT NULL, adresse VARCHAR(50) NOT NULL, ville VARCHAR(50) NOT NULL, tel VARCHAR(50) NOT NULL, portable VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, matfisc VARCHAR(50) NOT NULL, cin VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE histoire (id_histoire INT AUTO_INCREMENT NOT NULL, age INT NOT NULL, langue VARCHAR(255) NOT NULL, nom_histoire VARCHAR(255) NOT NULL, contenu_histoire VARCHAR(255) NOT NULL, couverture_histoire VARCHAR(255) NOT NULL, catégorie VARCHAR(255) NOT NULL, PRIMARY KEY(id_histoire)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lcommande (id INT AUTO_INCREMENT NOT NULL, Numc VARCHAR(50) NOT NULL, produit VARCHAR(50) NOT NULL, pv VARCHAR(50) NOT NULL, qte VARCHAR(50) NOT NULL, tva VARCHAR(50) NOT NULL, lig VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, client VARCHAR(50) NOT NULL, numl VARCHAR(50) NOT NULL, observation VARCHAR(50) NOT NULL, totht VARCHAR(50) NOT NULL, tottva VARCHAR(50) NOT NULL, totttc VARCHAR(50) NOT NULL, dateliv VARCHAR(50) NOT NULL, INDEX client (client), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE llivraison (id INT AUTO_INCREMENT NOT NULL, numl VARCHAR(50) NOT NULL, produit VARCHAR(50) NOT NULL, pv VARCHAR(50) NOT NULL, qte VARCHAR(50) NOT NULL, tva VARCHAR(50) NOT NULL, lig INT NOT NULL, INDEX produit (produit), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail (id INT AUTO_INCREMENT NOT NULL, subject VARCHAR(50) NOT NULL, mail VARCHAR(50) NOT NULL, object VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, pa DOUBLE PRECISION NOT NULL, pv DOUBLE PRECISION NOT NULL, tva INT NOT NULL, stock INT NOT NULL, image LONGBLOB NOT NULL, famille VARCHAR(50) NOT NULL, INDEX famille (famille), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id_question INT AUTO_INCREMENT NOT NULL, id_quizs INT DEFAULT NULL, question VARCHAR(30) NOT NULL, matiere VARCHAR(30) NOT NULL, R1 VARCHAR(30) NOT NULL, R2 VARCHAR(30) NOT NULL, R3 VARCHAR(30) NOT NULL, solution VARCHAR(30) NOT NULL, difficulte VARCHAR(30) NOT NULL, INDEX id_quizs (id_quizs), PRIMARY KEY(id_question)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quizs (id_quizs INT AUTO_INCREMENT NOT NULL, image VARCHAR(250) NOT NULL, matiere VARCHAR(30) NOT NULL, difficulte VARCHAR(30) NOT NULL, resultat INT NOT NULL, PRIMARY KEY(id_quizs)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reglement (id INT AUTO_INCREMENT NOT NULL, client VARCHAR(50) NOT NULL, facture VARCHAR(50) NOT NULL, modereg VARCHAR(50) NOT NULL, montant VARCHAR(50) NOT NULL, numpiece VARCHAR(50) NOT NULL, echeance VARCHAR(50) NOT NULL, INDEX client (client), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resultat_test_histoire (id_resultat INT AUTO_INCREMENT NOT NULL, id_test INT DEFAULT NULL, id_user INT NOT NULL, score INT NOT NULL, date DATE NOT NULL, ligne_histoire INT DEFAULT -1 NOT NULL, INDEX fk_idtest (id_test), PRIMARY KEY(id_resultat)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_histoire (id_test INT AUTO_INCREMENT NOT NULL, id_histoire INT DEFAULT NULL, question1 VARCHAR(255) NOT NULL, R11 VARCHAR(255) NOT NULL, R12 VARCHAR(255) NOT NULL, R13 VARCHAR(255) NOT NULL, correctionQ1 VARCHAR(255) NOT NULL, question2 VARCHAR(255) NOT NULL, R21 VARCHAR(255) NOT NULL, R22 VARCHAR(255) NOT NULL, R23 VARCHAR(255) NOT NULL, correctionQ2 VARCHAR(255) NOT NULL, question3 VARCHAR(255) NOT NULL, R31 VARCHAR(255) NOT NULL, R32 VARCHAR(255) NOT NULL, R33 VARCHAR(255) NOT NULL, correctionQ3 VARCHAR(255) NOT NULL, INDEX fk_idhistoire (id_histoire), PRIMARY KEY(id_test)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_abo (type VARCHAR(10) NOT NULL, PRIMARY KEY(type)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id_user INT AUTO_INCREMENT NOT NULL, id_abonnement INT DEFAULT NULL, login VARCHAR(50) NOT NULL, mdp VARCHAR(50) NOT NULL, nom VARCHAR(15) NOT NULL, prenom VARCHAR(15) NOT NULL, niveau INT NOT NULL, mail VARCHAR(50) NOT NULL, code TEXT DEFAULT NULL, etat VARCHAR(10) DEFAULT \'NULL\', PRIMARY KEY(id_user)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id_video INT AUTO_INCREMENT NOT NULL, nom_video VARCHAR(30) NOT NULL, date VARCHAR(30) DEFAULT \'NULL\', description VARCHAR(100) NOT NULL, duree_video VARCHAR(11) NOT NULL, PRIMARY KEY(id_video)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EEB2E6EA9 FOREIGN KEY (id_quizs) REFERENCES quizs (id_quizs)');
        $this->addSql('ALTER TABLE resultat_test_histoire ADD CONSTRAINT FK_440152BF535F620E FOREIGN KEY (id_test) REFERENCES test_histoire (id_test)');
        $this->addSql('ALTER TABLE test_histoire ADD CONSTRAINT FK_6817C63EADAF21FD FOREIGN KEY (id_histoire) REFERENCES histoire (id_histoire)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE test_histoire DROP FOREIGN KEY FK_6817C63EADAF21FD');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EEB2E6EA9');
        $this->addSql('ALTER TABLE resultat_test_histoire DROP FOREIGN KEY FK_440152BF535F620E');
        $this->addSql('DROP TABLE abonnement');
        $this->addSql('DROP TABLE activites');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE compteur');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE exercices');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE fornisseur');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE histoire');
        $this->addSql('DROP TABLE lcommande');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE llivraison');
        $this->addSql('DROP TABLE mail');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE quizs');
        $this->addSql('DROP TABLE reglement');
        $this->addSql('DROP TABLE resultat_test_histoire');
        $this->addSql('DROP TABLE test_histoire');
        $this->addSql('DROP TABLE type_abo');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE video');
    }
}

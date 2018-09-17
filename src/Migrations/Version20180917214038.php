<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180917214038 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE cours (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, horaire_cours_id INTEGER NOT NULL, droit_image BOOLEAN NOT NULL, paiement BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_FDCA8C9CFA46F031 ON cours (horaire_cours_id)');
        $this->addSql('CREATE TABLE horaire_cours (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type_cours_id INTEGER NOT NULL, ligne_eau_id INTEGER NOT NULL, date_de_debut DATE NOT NULL, date_de_fin DATE NOT NULL, heure_de_debut TIME NOT NULL, heure_de_fin TIME NOT NULL, nombre_participants INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_98223B47B3305F4C ON horaire_cours (type_cours_id)');
        $this->addSql('CREATE INDEX IDX_98223B47AE92B17D ON horaire_cours (ligne_eau_id)');
        $this->addSql('CREATE TABLE ligne_eau (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE seance (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cours_id INTEGER NOT NULL, presence BOOLEAN NOT NULL, motif_absence VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E7ECF78B0 ON seance (cours_id)');
        $this->addSql('CREATE TABLE statut (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, statut VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE type_cours (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, statut_id INTEGER NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_de_naissance DATE NOT NULL, date_de_certificat_medical DATE NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL)');
        $this->addSql('CREATE INDEX IDX_8D93D649F6203804 ON user (statut_id)');
        $this->addSql('CREATE TABLE user_adresse (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, adresse VARCHAR(255) NOT NULL, complement VARCHAR(255) NOT NULL, code_postal INTEGER NOT NULL, ville VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9B52161CA76ED395 ON user_adresse (user_id)');
        $this->addSql('CREATE TABLE user_mail (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, email VARCHAR(255) NOT NULL, principal BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_2BA7E081A76ED395 ON user_mail (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE horaire_cours');
        $this->addSql('DROP TABLE ligne_eau');
        $this->addSql('DROP TABLE seance');
        $this->addSql('DROP TABLE statut');
        $this->addSql('DROP TABLE type_cours');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_adresse');
        $this->addSql('DROP TABLE user_mail');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200708145459 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE country ADD population_number INT NOT NULL, ADD pib INT NOT NULL, DROP nombre_population, DROP pib_hab, CHANGE nom name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE country_epidemic ADD CONSTRAINT FK_4DB1C071F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_epidemic ADD CONSTRAINT FK_4DB1C0715179B985 FOREIGN KEY (epidemic_id) REFERENCES epidemic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE disease ADD scientific_name VARCHAR(255) NOT NULL, ADD propagation VARCHAR(255) NOT NULL, ADD treatements VARCHAR(255) NOT NULL, ADD symptoms VARCHAR(255) NOT NULL, DROP nom_scientifique, DROP moyen_propagation, DROP traitement, DROP symptomes, CHANGE annee_decouverte year_discovery DATE NOT NULL');
        $this->addSql('ALTER TABLE doctor ADD name VARCHAR(255) NOT NULL, ADD first_name VARCHAR(255) NOT NULL, ADD address VARCHAR(255) NOT NULL, DROP nom, DROP prenom, DROP adresse, CHANGE numero number VARCHAR(11) NOT NULL');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36A9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE epidemic ADD number_recensed_case INT NOT NULL, ADD victim_number INT NOT NULL, DROP nombre_cas_recense, DROP nombre_de_victime, CHANGE annee_epidemie year_epidemic DATE NOT NULL');
        $this->addSql('ALTER TABLE epidemic ADD CONSTRAINT FK_7E7B91CCD03CE8AB FOREIGN KEY (disease_id_id) REFERENCES disease (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE doctor DROP FOREIGN KEY FK_1FC0F36A9D86650F');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE country ADD nombre_population INT NOT NULL, ADD pib_hab INT NOT NULL, DROP population_number, DROP pib, CHANGE name nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE country_epidemic DROP FOREIGN KEY FK_4DB1C071F92F3E70');
        $this->addSql('ALTER TABLE country_epidemic DROP FOREIGN KEY FK_4DB1C0715179B985');
        $this->addSql('ALTER TABLE disease ADD nom_scientifique VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD moyen_propagation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD traitement VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD symptomes VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP scientific_name, DROP propagation, DROP treatements, DROP symptoms, CHANGE year_discovery annee_decouverte DATE NOT NULL');
        $this->addSql('ALTER TABLE doctor ADD nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP name, DROP first_name, DROP address, CHANGE number numero VARCHAR(11) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE epidemic DROP FOREIGN KEY FK_7E7B91CCD03CE8AB');
        $this->addSql('ALTER TABLE epidemic ADD nombre_cas_recense INT NOT NULL, ADD nombre_de_victime INT NOT NULL, DROP number_recensed_case, DROP victim_number, CHANGE year_epidemic annee_epidemie DATE NOT NULL');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200708141047 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, type INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE country_epidemic ADD CONSTRAINT FK_4DB1C071F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_epidemic ADD CONSTRAINT FK_4DB1C0715179B985 FOREIGN KEY (epidemic_id) REFERENCES epidemic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36A9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE epidemic ADD CONSTRAINT FK_7E7B91CCD03CE8AB FOREIGN KEY (disease_id_id) REFERENCES disease (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE doctor DROP FOREIGN KEY FK_1FC0F36A9D86650F');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE country_epidemic DROP FOREIGN KEY FK_4DB1C071F92F3E70');
        $this->addSql('ALTER TABLE country_epidemic DROP FOREIGN KEY FK_4DB1C0715179B985');
        $this->addSql('ALTER TABLE epidemic DROP FOREIGN KEY FK_7E7B91CCD03CE8AB');
    }
}

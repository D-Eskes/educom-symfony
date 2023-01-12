<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230111093643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE artiest CHANGE naam naam VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE genre genre VARCHAR(59) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE omschrijving omschrijving VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE website website VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE afbeelding_url afbeelding_url VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE optreden CHANGE omschrijving omschrijving VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ticket_url ticket_url VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE afbeelding_url afbeelding_url VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE poppodium CHANGE naam naam VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adres adres VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE postcode postcode VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE woonplaats woonplaats VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telefoonnummer telefoonnummer VARCHAR(20) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE website website VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE afbeelding_url afbeelding_url VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

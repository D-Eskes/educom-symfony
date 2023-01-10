<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230110103748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiest ADD afbeelding_url VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE optreden ADD omschrijving VARCHAR(255) NOT NULL, ADD datum DATETIME NOT NULL, ADD prijs INT NOT NULL, ADD ticket_url VARCHAR(255) NOT NULL, ADD afbeelding_url VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE poppodium ADD afbeelding_url VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiest DROP afbeelding_url, CHANGE naam naam VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE genre genre VARCHAR(59) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE omschrijving omschrijving VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE website website VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE optreden DROP omschrijving, DROP datum, DROP prijs, DROP ticket_url, DROP afbeelding_url');
        $this->addSql('ALTER TABLE poppodium DROP afbeelding_url, CHANGE naam naam VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adres adres VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE postcode postcode VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE woonplaats woonplaats VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telefoonnummer telefoonnummer VARCHAR(20) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE website website VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

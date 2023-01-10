<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230110103115 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiest (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(50) NOT NULL, genre VARCHAR(59) NOT NULL, omschrijving VARCHAR(255) NOT NULL, website VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE optreden (id INT AUTO_INCREMENT NOT NULL, poppodium_id INT NOT NULL, artiest_id INT NOT NULL, voorprogramma_id INT DEFAULT NULL, INDEX IDX_6286F65DA2EEBB18 (poppodium_id), INDEX IDX_6286F65DAED85528 (artiest_id), INDEX IDX_6286F65DE017CE10 (voorprogramma_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE optreden ADD CONSTRAINT FK_6286F65DA2EEBB18 FOREIGN KEY (poppodium_id) REFERENCES poppodium (id)');
        $this->addSql('ALTER TABLE optreden ADD CONSTRAINT FK_6286F65DAED85528 FOREIGN KEY (artiest_id) REFERENCES artiest (id)');
        $this->addSql('ALTER TABLE optreden ADD CONSTRAINT FK_6286F65DE017CE10 FOREIGN KEY (voorprogramma_id) REFERENCES artiest (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE optreden DROP FOREIGN KEY FK_6286F65DAED85528');
        $this->addSql('ALTER TABLE optreden DROP FOREIGN KEY FK_6286F65DE017CE10');
        $this->addSql('DROP TABLE artiest');
        $this->addSql('DROP TABLE optreden');
        $this->addSql('ALTER TABLE poppodium CHANGE naam naam VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adres adres VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE postcode postcode VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE woonplaats woonplaats VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telefoonnummer telefoonnummer VARCHAR(20) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE website website VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

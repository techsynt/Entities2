<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201209221156 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients_profile (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, phone NUMERIC(10, 0) DEFAULT NULL, social_whatsapp VARCHAR(255) DEFAULT NULL, phone_vercode VARCHAR(20) DEFAULT NULL, UNIQUE INDEX UNIQ_BF3C0A0019EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clients_profile ADD CONSTRAINT FK_BF3C0A0019EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients_profile DROP FOREIGN KEY FK_BF3C0A0019EB6921');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE clients_profile');
    }
}

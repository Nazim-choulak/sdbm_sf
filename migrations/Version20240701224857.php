<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240701224857 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, marques_id INT NOT NULL, couleurs_id INT NOT NULL, type_biere_id INT DEFAULT NULL, nom VARCHAR(150) NOT NULL, prix_achat DOUBLE PRECISION NOT NULL, volume INT NOT NULL, titrage DOUBLE PRECISION NOT NULL, INDEX IDX_23A0E66C256483C (marques_id), INDEX IDX_23A0E665ED47289 (couleurs_id), INDEX IDX_23A0E666AEE6030 (type_biere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66C256483C FOREIGN KEY (marques_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E665ED47289 FOREIGN KEY (couleurs_id) REFERENCES couleur (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E666AEE6030 FOREIGN KEY (type_biere_id) REFERENCES type_biere (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66C256483C');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E665ED47289');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E666AEE6030');
        $this->addSql('DROP TABLE article');
    }
}

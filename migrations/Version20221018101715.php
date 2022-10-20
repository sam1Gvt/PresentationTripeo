<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221018101715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, rue VARCHAR(255) NOT NULL, cp VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, hote_id INT NOT NULL, adresse_id INT NOT NULL, reservation_id INT DEFAULT NULL, type_bien VARCHAR(255) NOT NULL, nombre_voyageur_max INT NOT NULL, nombre_lit INT NOT NULL, nombre_chambre INT NOT NULL, nombre_salle_bain INT NOT NULL, photo VARCHAR(255) DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, annulation TINYINT(1) NOT NULL, INDEX IDX_F65593E5453D3D6F (hote_id), UNIQUE INDEX UNIQ_F65593E54DE7DC5C (adresse_id), UNIQUE INDEX UNIQ_F65593E5B83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hote (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_EAD6A5C84DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, nombre_etoile INT NOT NULL, commentaire VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, moyen_paiement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, voyageur_id INT NOT NULL, paiement_id INT NOT NULL, arrivee DATETIME NOT NULL, depart DATETIME NOT NULL, nombre_voyageurs INT NOT NULL, INDEX IDX_42C8495562915402 (voyageur_id), UNIQUE INDEX UNIQ_42C849552A4C4478 (paiement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyageur (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, email VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FE3222544DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5453D3D6F FOREIGN KEY (hote_id) REFERENCES hote (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E54DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE hote ADD CONSTRAINT FK_EAD6A5C84DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495562915402 FOREIGN KEY (voyageur_id) REFERENCES voyageur (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849552A4C4478 FOREIGN KEY (paiement_id) REFERENCES paiement (id)');
        $this->addSql('ALTER TABLE voyageur ADD CONSTRAINT FK_FE3222544DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5453D3D6F');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E54DE7DC5C');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5B83297E7');
        $this->addSql('ALTER TABLE hote DROP FOREIGN KEY FK_EAD6A5C84DE7DC5C');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495562915402');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849552A4C4478');
        $this->addSql('ALTER TABLE voyageur DROP FOREIGN KEY FK_FE3222544DE7DC5C');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE hote');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE voyageur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

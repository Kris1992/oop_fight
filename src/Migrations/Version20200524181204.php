<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200524181204 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE hero (id INT AUTO_INCREMENT NOT NULL, right_hand_id INT DEFAULT NULL, left_hand_id INT DEFAULT NULL, head_id INT NOT NULL, body_id INT NOT NULL, foots_id INT NOT NULL, name VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_51CE6E868A06067F (right_hand_id), UNIQUE INDEX UNIQ_51CE6E86FA09B13F (left_hand_id), UNIQUE INDEX UNIQ_51CE6E86F41A619E (head_id), UNIQUE INDEX UNIQ_51CE6E869B621D84 (body_id), UNIQUE INDEX UNIQ_51CE6E861B22A289 (foots_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boots (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, shield_factor INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monster (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, power DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE helmet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, shield_factor INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE armor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, shield_factor INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E868A06067F FOREIGN KEY (right_hand_id) REFERENCES weapon (id)');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E86FA09B13F FOREIGN KEY (left_hand_id) REFERENCES weapon (id)');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E86F41A619E FOREIGN KEY (head_id) REFERENCES helmet (id)');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E869B621D84 FOREIGN KEY (body_id) REFERENCES armor (id)');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E861B22A289 FOREIGN KEY (foots_id) REFERENCES boots (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E861B22A289');
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E868A06067F');
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E86FA09B13F');
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E86F41A619E');
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E869B621D84');
        $this->addSql('DROP TABLE hero');
        $this->addSql('DROP TABLE boots');
        $this->addSql('DROP TABLE monster');
        $this->addSql('DROP TABLE weapon');
        $this->addSql('DROP TABLE helmet');
        $this->addSql('DROP TABLE armor');
    }
}

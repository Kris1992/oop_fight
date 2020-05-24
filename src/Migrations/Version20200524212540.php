<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200524212540 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE monster ADD left_hand_id INT NOT NULL, ADD right_hand_id INT NOT NULL, ADD body_id INT NOT NULL');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4FA09B13F FOREIGN KEY (left_hand_id) REFERENCES weapon (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F48A06067F FOREIGN KEY (right_hand_id) REFERENCES weapon (id)');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F49B621D84 FOREIGN KEY (body_id) REFERENCES armor (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_245EC6F4FA09B13F ON monster (left_hand_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_245EC6F48A06067F ON monster (right_hand_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_245EC6F49B621D84 ON monster (body_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4FA09B13F');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F48A06067F');
        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F49B621D84');
        $this->addSql('DROP INDEX UNIQ_245EC6F4FA09B13F ON monster');
        $this->addSql('DROP INDEX UNIQ_245EC6F48A06067F ON monster');
        $this->addSql('DROP INDEX UNIQ_245EC6F49B621D84 ON monster');
        $this->addSql('ALTER TABLE monster DROP left_hand_id, DROP right_hand_id, DROP body_id');
    }
}

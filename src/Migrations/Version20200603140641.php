<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200603140641 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE abstract_character ADD typeCharacter VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE battle_result ADD first_participant_id INT NOT NULL, ADD second_participant_id INT NOT NULL');
        $this->addSql('ALTER TABLE battle_result ADD CONSTRAINT FK_361C28E2774E0A77 FOREIGN KEY (first_participant_id) REFERENCES abstract_character (id)');
        $this->addSql('ALTER TABLE battle_result ADD CONSTRAINT FK_361C28E286306DEB FOREIGN KEY (second_participant_id) REFERENCES abstract_character (id)');
        $this->addSql('CREATE INDEX IDX_361C28E2774E0A77 ON battle_result (first_participant_id)');
        $this->addSql('CREATE INDEX IDX_361C28E286306DEB ON battle_result (second_participant_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE abstract_character DROP typeCharacter');
        $this->addSql('ALTER TABLE battle_result DROP FOREIGN KEY FK_361C28E2774E0A77');
        $this->addSql('ALTER TABLE battle_result DROP FOREIGN KEY FK_361C28E286306DEB');
        $this->addSql('DROP INDEX IDX_361C28E2774E0A77 ON battle_result');
        $this->addSql('DROP INDEX IDX_361C28E286306DEB ON battle_result');
        $this->addSql('ALTER TABLE battle_result DROP first_participant_id, DROP second_participant_id');
    }
}

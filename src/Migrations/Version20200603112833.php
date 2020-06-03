<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200603112833 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE battle_result ADD winner_id INT NOT NULL, ADD loser_id INT NOT NULL');
        $this->addSql('ALTER TABLE battle_result ADD CONSTRAINT FK_361C28E25DFCD4B8 FOREIGN KEY (winner_id) REFERENCES abstract_character (id)');
        $this->addSql('ALTER TABLE battle_result ADD CONSTRAINT FK_361C28E21BCAA5F6 FOREIGN KEY (loser_id) REFERENCES abstract_character (id)');
        $this->addSql('CREATE INDEX IDX_361C28E25DFCD4B8 ON battle_result (winner_id)');
        $this->addSql('CREATE INDEX IDX_361C28E21BCAA5F6 ON battle_result (loser_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE battle_result DROP FOREIGN KEY FK_361C28E25DFCD4B8');
        $this->addSql('ALTER TABLE battle_result DROP FOREIGN KEY FK_361C28E21BCAA5F6');
        $this->addSql('DROP INDEX IDX_361C28E25DFCD4B8 ON battle_result');
        $this->addSql('DROP INDEX IDX_361C28E21BCAA5F6 ON battle_result');
        $this->addSql('ALTER TABLE battle_result DROP winner_id, DROP loser_id');
    }
}

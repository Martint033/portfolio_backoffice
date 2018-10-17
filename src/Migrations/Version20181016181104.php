<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181016181104 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projects_demo ADD projet_id_id INT NOT NULL, ADD link_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE projects_demo ADD CONSTRAINT FK_E85C6368D4E271E1 FOREIGN KEY (projet_id_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE projects_demo ADD CONSTRAINT FK_E85C6368D0FFC289 FOREIGN KEY (link_id_id) REFERENCES demo_link (id)');
        $this->addSql('CREATE INDEX IDX_E85C6368D4E271E1 ON projects_demo (projet_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E85C6368D0FFC289 ON projects_demo (link_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projects_demo DROP FOREIGN KEY FK_E85C6368D4E271E1');
        $this->addSql('ALTER TABLE projects_demo DROP FOREIGN KEY FK_E85C6368D0FFC289');
        $this->addSql('DROP INDEX IDX_E85C6368D4E271E1 ON projects_demo');
        $this->addSql('DROP INDEX UNIQ_E85C6368D0FFC289 ON projects_demo');
        $this->addSql('ALTER TABLE projects_demo DROP projet_id_id, DROP link_id_id');
    }
}

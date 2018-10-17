<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181017101707 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE projects_code (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, INDEX IDX_490B8C50166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projects_code ADD CONSTRAINT FK_490B8C50166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE code_link ADD projects_code_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE code_link ADD CONSTRAINT FK_47F330A19E506 FOREIGN KEY (projects_code_id) REFERENCES projects_code (id)');
        $this->addSql('CREATE INDEX IDX_47F330A19E506 ON code_link (projects_code_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE code_link DROP FOREIGN KEY FK_47F330A19E506');
        $this->addSql('DROP TABLE projects_code');
        $this->addSql('DROP INDEX IDX_47F330A19E506 ON code_link');
        $this->addSql('ALTER TABLE code_link DROP projects_code_id');
    }
}

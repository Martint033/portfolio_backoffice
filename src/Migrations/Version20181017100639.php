<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181017100639 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE projects_context (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects_context_projects (projects_context_id INT NOT NULL, projects_id INT NOT NULL, INDEX IDX_94CABF72DDBF5035 (projects_context_id), INDEX IDX_94CABF721EDE0F55 (projects_id), PRIMARY KEY(projects_context_id, projects_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects_context_contexte (projects_context_id INT NOT NULL, contexte_id INT NOT NULL, INDEX IDX_90DC7732DDBF5035 (projects_context_id), INDEX IDX_90DC773299B36A86 (contexte_id), PRIMARY KEY(projects_context_id, contexte_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projects_context_projects ADD CONSTRAINT FK_94CABF72DDBF5035 FOREIGN KEY (projects_context_id) REFERENCES projects_context (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_context_projects ADD CONSTRAINT FK_94CABF721EDE0F55 FOREIGN KEY (projects_id) REFERENCES projects (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_context_contexte ADD CONSTRAINT FK_90DC7732DDBF5035 FOREIGN KEY (projects_context_id) REFERENCES projects_context (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_context_contexte ADD CONSTRAINT FK_90DC773299B36A86 FOREIGN KEY (contexte_id) REFERENCES contexte (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projects_context_projects DROP FOREIGN KEY FK_94CABF72DDBF5035');
        $this->addSql('ALTER TABLE projects_context_contexte DROP FOREIGN KEY FK_90DC7732DDBF5035');
        $this->addSql('DROP TABLE projects_context');
        $this->addSql('DROP TABLE projects_context_projects');
        $this->addSql('DROP TABLE projects_context_contexte');
    }
}

<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181018132703 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE projects_contexte (projects_id INT NOT NULL, contexte_id INT NOT NULL, INDEX IDX_3218980D1EDE0F55 (projects_id), INDEX IDX_3218980D99B36A86 (contexte_id), PRIMARY KEY(projects_id, contexte_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projects_contexte ADD CONSTRAINT FK_3218980D1EDE0F55 FOREIGN KEY (projects_id) REFERENCES projects (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_contexte ADD CONSTRAINT FK_3218980D99B36A86 FOREIGN KEY (contexte_id) REFERENCES contexte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE code_link ADD projects_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE code_link ADD CONSTRAINT FK_47F3301EDE0F55 FOREIGN KEY (projects_id) REFERENCES projects (id)');
        $this->addSql('CREATE INDEX IDX_47F3301EDE0F55 ON code_link (projects_id)');
        $this->addSql('ALTER TABLE demo_link ADD projects_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demo_link ADD CONSTRAINT FK_C1E5E4841EDE0F55 FOREIGN KEY (projects_id) REFERENCES projects (id)');
        $this->addSql('CREATE INDEX IDX_C1E5E4841EDE0F55 ON demo_link (projects_id)');
        $this->addSql('ALTER TABLE images ADD projects_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A1EDE0F55 FOREIGN KEY (projects_id) REFERENCES projects (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6A1EDE0F55 ON images (projects_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE projects_contexte');
        $this->addSql('ALTER TABLE code_link DROP FOREIGN KEY FK_47F3301EDE0F55');
        $this->addSql('DROP INDEX IDX_47F3301EDE0F55 ON code_link');
        $this->addSql('ALTER TABLE code_link DROP projects_id');
        $this->addSql('ALTER TABLE demo_link DROP FOREIGN KEY FK_C1E5E4841EDE0F55');
        $this->addSql('DROP INDEX IDX_C1E5E4841EDE0F55 ON demo_link');
        $this->addSql('ALTER TABLE demo_link DROP projects_id');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A1EDE0F55');
        $this->addSql('DROP INDEX IDX_E01FBE6A1EDE0F55 ON images');
        $this->addSql('ALTER TABLE images DROP projects_id');
    }
}

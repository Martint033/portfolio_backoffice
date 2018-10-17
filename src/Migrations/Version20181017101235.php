<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181017101235 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE projects_images (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, INDEX IDX_21EB2295166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projects_images ADD CONSTRAINT FK_21EB2295166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE images ADD projects_images_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6ADF3C2DA FOREIGN KEY (projects_images_id) REFERENCES projects_images (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6ADF3C2DA ON images (projects_images_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6ADF3C2DA');
        $this->addSql('DROP TABLE projects_images');
        $this->addSql('DROP INDEX IDX_E01FBE6ADF3C2DA ON images');
        $this->addSql('ALTER TABLE images DROP projects_images_id');
    }
}
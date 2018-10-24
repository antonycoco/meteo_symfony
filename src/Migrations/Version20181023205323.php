<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181023205323 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE billtain ADD climat_id INT DEFAULT NULL, ADD ville_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE billtain ADD CONSTRAINT FK_794B2E9977E87C9D FOREIGN KEY (climat_id) REFERENCES climat (id)');
        $this->addSql('ALTER TABLE billtain ADD CONSTRAINT FK_794B2E99A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('CREATE INDEX IDX_794B2E9977E87C9D ON billtain (climat_id)');
        $this->addSql('CREATE INDEX IDX_794B2E99A73F0036 ON billtain (ville_id)');
        $this->addSql('ALTER TABLE climat ADD image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE climat ADD CONSTRAINT FK_4ECF49223DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4ECF49223DA5256D ON climat (image_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE billtain DROP FOREIGN KEY FK_794B2E9977E87C9D');
        $this->addSql('ALTER TABLE billtain DROP FOREIGN KEY FK_794B2E99A73F0036');
        $this->addSql('DROP INDEX IDX_794B2E9977E87C9D ON billtain');
        $this->addSql('DROP INDEX IDX_794B2E99A73F0036 ON billtain');
        $this->addSql('ALTER TABLE billtain DROP climat_id, DROP ville_id');
        $this->addSql('ALTER TABLE climat DROP FOREIGN KEY FK_4ECF49223DA5256D');
        $this->addSql('DROP INDEX UNIQ_4ECF49223DA5256D ON climat');
        $this->addSql('ALTER TABLE climat DROP image_id');
    }
}

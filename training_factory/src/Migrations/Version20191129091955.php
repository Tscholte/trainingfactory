<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191129091955 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lesson ADD instructor_id INT DEFAULT NULL, ADD training_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F38C4FC193 FOREIGN KEY (instructor_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3BEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id)');
        $this->addSql('CREATE INDEX IDX_F87474F38C4FC193 ON lesson (instructor_id)');
        $this->addSql('CREATE INDEX IDX_F87474F3BEFD98D1 ON lesson (training_id)');
        $this->addSql('ALTER TABLE person CHANGE hiring_date hiring_date DATE DEFAULT NULL, CHANGE salary salary DOUBLE PRECISION DEFAULT NULL, CHANGE street street VARCHAR(255) DEFAULT NULL, CHANGE postal_code postal_code VARCHAR(255) DEFAULT NULL, CHANGE place place VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE registration ADD member_id INT DEFAULT NULL, ADD lesson_id INT DEFAULT NULL, ADD relation VARCHAR(255) NOT NULL, CHANGE payment payment TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A77597D3FE FOREIGN KEY (member_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A7CDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id)');
        $this->addSql('CREATE INDEX IDX_62A8A7A77597D3FE ON registration (member_id)');
        $this->addSql('CREATE INDEX IDX_62A8A7A7CDF80196 ON registration (lesson_id)');
        $this->addSql('ALTER TABLE training CHANGE cost cost DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F38C4FC193');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3BEFD98D1');
        $this->addSql('DROP INDEX IDX_F87474F38C4FC193 ON lesson');
        $this->addSql('DROP INDEX IDX_F87474F3BEFD98D1 ON lesson');
        $this->addSql('ALTER TABLE lesson DROP instructor_id, DROP training_id');
        $this->addSql('ALTER TABLE person CHANGE hiring_date hiring_date DATE DEFAULT \'NULL\', CHANGE salary salary DOUBLE PRECISION DEFAULT \'NULL\', CHANGE street street VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE postal_code postal_code VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE place place VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A77597D3FE');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A7CDF80196');
        $this->addSql('DROP INDEX IDX_62A8A7A77597D3FE ON registration');
        $this->addSql('DROP INDEX IDX_62A8A7A7CDF80196 ON registration');
        $this->addSql('ALTER TABLE registration DROP member_id, DROP lesson_id, DROP relation, CHANGE payment payment TINYINT(1) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE training CHANGE cost cost DOUBLE PRECISION DEFAULT \'NULL\'');
    }
}

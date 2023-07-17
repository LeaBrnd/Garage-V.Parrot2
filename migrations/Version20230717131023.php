<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230717131023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employeecars (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, fuel VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employeejob (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD employee_id INT NOT NULL');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D8C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
        $this->addSql('CREATE INDEX IDX_773DE69D8C03F15C ON car (employee_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE employeecars');
        $this->addSql('DROP TABLE employeejob');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D8C03F15C');
        $this->addSql('DROP INDEX IDX_773DE69D8C03F15C ON car');
        $this->addSql('ALTER TABLE car DROP employee_id');
    }
}

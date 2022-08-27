<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220825203559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, subject_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_checked TINYINT(1) NOT NULL, INDEX IDX_F87474F323EDC87 (subject_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson_student (lesson_id INT NOT NULL, student_id INT NOT NULL, INDEX IDX_425FFD94CDF80196 (lesson_id), INDEX IDX_425FFD94CB944F1A (student_id), PRIMARY KEY(lesson_id, student_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professor_lesson (professor_id INT NOT NULL, lesson_id INT NOT NULL, INDEX IDX_D29328CA7D2D84D5 (professor_id), INDEX IDX_D29328CACDF80196 (lesson_id), PRIMARY KEY(professor_id, lesson_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, is_present TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F323EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE lesson_student ADD CONSTRAINT FK_425FFD94CDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lesson_student ADD CONSTRAINT FK_425FFD94CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE professor_lesson ADD CONSTRAINT FK_D29328CA7D2D84D5 FOREIGN KEY (professor_id) REFERENCES professor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE professor_lesson ADD CONSTRAINT FK_D29328CACDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F323EDC87');
        $this->addSql('ALTER TABLE lesson_student DROP FOREIGN KEY FK_425FFD94CDF80196');
        $this->addSql('ALTER TABLE lesson_student DROP FOREIGN KEY FK_425FFD94CB944F1A');
        $this->addSql('ALTER TABLE professor_lesson DROP FOREIGN KEY FK_D29328CA7D2D84D5');
        $this->addSql('ALTER TABLE professor_lesson DROP FOREIGN KEY FK_D29328CACDF80196');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE lesson_student');
        $this->addSql('DROP TABLE professor');
        $this->addSql('DROP TABLE professor_lesson');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE subject');
    }
}

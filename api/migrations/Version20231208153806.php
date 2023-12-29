<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231208153806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE availability_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE booking_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE company_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE employee_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE franchise_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE greeting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE override_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE performance_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE picture_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE report_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE review_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE temporary_employee_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE temporary_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE availability (id INT NOT NULL, user_id_id INT NOT NULL, week_day VARCHAR(255) NOT NULL, start_time TIME(0) WITHOUT TIME ZONE NOT NULL, end_time TIME(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3FB7A2BF9D86650F ON availability (user_id_id)');
        $this->addSql('CREATE TABLE booking (id INT NOT NULL, booker_id_id INT NOT NULL, duration VARCHAR(255) NOT NULL, start_datetime TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E00CEDDE2508AA37 ON booking (booker_id_id)');
        $this->addSql('COMMENT ON COLUMN booking.duration IS \'(DC2Type:dateinterval)\'');
        $this->addSql('CREATE TABLE company (id INT NOT NULL, owner_id INT DEFAULT NULL, company_name VARCHAR(255) NOT NULL, status BOOLEAN NOT NULL, kbis VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4FBF094F7E3C61F9 ON company (owner_id)');
        $this->addSql('CREATE TABLE employee (id INT NOT NULL, franchise_id_id INT NOT NULL, user_id_id INT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5D9F75A1EA39FCC8 ON employee (franchise_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5D9F75A19D86650F ON employee (user_id_id)');
        $this->addSql('CREATE TABLE franchise (id INT NOT NULL, company_id_id INT DEFAULT NULL, franchise_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_66F6CE2A38B53C32 ON franchise (company_id_id)');
        $this->addSql('CREATE TABLE greeting (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE override (id INT NOT NULL, user_id_id INT NOT NULL, date DATE NOT NULL, start_time TIME(0) WITHOUT TIME ZONE NOT NULL, end_time TIME(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_820306E59D86650F ON override (user_id_id)');
        $this->addSql('CREATE TABLE performance (id INT NOT NULL, company_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_82D7968138B53C32 ON performance (company_id_id)');
        $this->addSql('CREATE TABLE picture (id INT NOT NULL, owner_id INT DEFAULT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_16DB4F897E3C61F9 ON picture (owner_id)');
        $this->addSql('CREATE TABLE report (id INT NOT NULL, reporter_id INT NOT NULL, reportee_id INT NOT NULL, report_content TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C42F7784E1CFE6F5 ON report (reporter_id)');
        $this->addSql('CREATE INDEX IDX_C42F77842C0189D3 ON report (reportee_id)');
        $this->addSql('CREATE TABLE review (id INT NOT NULL, reviewer_id INT NOT NULL, reviewee_id INT NOT NULL, review_content TEXT NOT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_794381C670574616 ON review (reviewer_id)');
        $this->addSql('CREATE INDEX IDX_794381C6BD992930 ON review (reviewee_id)');
        $this->addSql('CREATE TABLE temporary_employee (id INT NOT NULL, user_id_id INT NOT NULL, company_id_id INT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9E95918B9D86650F ON temporary_employee (user_id_id)');
        $this->addSql('CREATE INDEX IDX_9E95918B38B53C32 ON temporary_employee (company_id_id)');
        $this->addSql('CREATE TABLE temporary_user (id INT NOT NULL, username VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, age INT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DACDCB0EF85E0677 ON temporary_user (username)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DACDCB0EE7927C74 ON temporary_user (email)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, age INT NOT NULL, biography TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('ALTER TABLE availability ADD CONSTRAINT FK_3FB7A2BF9D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE2508AA37 FOREIGN KEY (booker_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F7E3C61F9 FOREIGN KEY (owner_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1EA39FCC8 FOREIGN KEY (franchise_id_id) REFERENCES franchise (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A19D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE franchise ADD CONSTRAINT FK_66F6CE2A38B53C32 FOREIGN KEY (company_id_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE override ADD CONSTRAINT FK_820306E59D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE performance ADD CONSTRAINT FK_82D7968138B53C32 FOREIGN KEY (company_id_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F897E3C61F9 FOREIGN KEY (owner_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F7784E1CFE6F5 FOREIGN KEY (reporter_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F77842C0189D3 FOREIGN KEY (reportee_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C670574616 FOREIGN KEY (reviewer_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6BD992930 FOREIGN KEY (reviewee_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE temporary_employee ADD CONSTRAINT FK_9E95918B9D86650F FOREIGN KEY (user_id_id) REFERENCES temporary_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE temporary_employee ADD CONSTRAINT FK_9E95918B38B53C32 FOREIGN KEY (company_id_id) REFERENCES company (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE availability_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE booking_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE company_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE employee_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE franchise_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE greeting_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE override_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE performance_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE picture_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE report_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE review_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE temporary_employee_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE temporary_user_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('ALTER TABLE availability DROP CONSTRAINT FK_3FB7A2BF9D86650F');
        $this->addSql('ALTER TABLE booking DROP CONSTRAINT FK_E00CEDDE2508AA37');
        $this->addSql('ALTER TABLE company DROP CONSTRAINT FK_4FBF094F7E3C61F9');
        $this->addSql('ALTER TABLE employee DROP CONSTRAINT FK_5D9F75A1EA39FCC8');
        $this->addSql('ALTER TABLE employee DROP CONSTRAINT FK_5D9F75A19D86650F');
        $this->addSql('ALTER TABLE franchise DROP CONSTRAINT FK_66F6CE2A38B53C32');
        $this->addSql('ALTER TABLE override DROP CONSTRAINT FK_820306E59D86650F');
        $this->addSql('ALTER TABLE performance DROP CONSTRAINT FK_82D7968138B53C32');
        $this->addSql('ALTER TABLE picture DROP CONSTRAINT FK_16DB4F897E3C61F9');
        $this->addSql('ALTER TABLE report DROP CONSTRAINT FK_C42F7784E1CFE6F5');
        $this->addSql('ALTER TABLE report DROP CONSTRAINT FK_C42F77842C0189D3');
        $this->addSql('ALTER TABLE review DROP CONSTRAINT FK_794381C670574616');
        $this->addSql('ALTER TABLE review DROP CONSTRAINT FK_794381C6BD992930');
        $this->addSql('ALTER TABLE temporary_employee DROP CONSTRAINT FK_9E95918B9D86650F');
        $this->addSql('ALTER TABLE temporary_employee DROP CONSTRAINT FK_9E95918B38B53C32');
        $this->addSql('DROP TABLE availability');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE franchise');
        $this->addSql('DROP TABLE greeting');
        $this->addSql('DROP TABLE override');
        $this->addSql('DROP TABLE performance');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE report');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE temporary_employee');
        $this->addSql('DROP TABLE temporary_user');
        $this->addSql('DROP TABLE "user"');
    }
}

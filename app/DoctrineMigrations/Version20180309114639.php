<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180309114639 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1727ACA70');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE car_engines');
        $this->addSql('DROP TABLE car_transmission');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE configuration_engines');
        $this->addSql('DROP TABLE configuration_transmission');
        $this->addSql('DROP TABLE configure_engines');
        $this->addSql('ALTER TABLE user_car DROP FOREIGN KEY FK_9C2B871678D28519');
        $this->addSql('ALTER TABLE user_car DROP FOREIGN KEY FK_9C2B87167975B7E7');
        $this->addSql('ALTER TABLE user_car DROP FOREIGN KEY FK_9C2B8716A76ED395');
        $this->addSql('ALTER TABLE user_car DROP FOREIGN KEY FK_9C2B8716C3C6F69F');
        $this->addSql('ALTER TABLE user_car DROP FOREIGN KEY FK_9C2B8716E78C9C0A');
        $this->addSql('ALTER TABLE user_car ADD CONSTRAINT FK_9C2B871678D28519 FOREIGN KEY (transmission_id) REFERENCES transmission (id)');
        $this->addSql('ALTER TABLE user_car ADD CONSTRAINT FK_9C2B87167975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE user_car ADD CONSTRAINT FK_9C2B8716A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_car ADD CONSTRAINT FK_9C2B8716C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE user_car ADD CONSTRAINT FK_9C2B8716E78C9C0A FOREIGN KEY (engine_id) REFERENCES engine (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(64) NOT NULL COLLATE utf8_unicode_ci, code VARCHAR(16) NOT NULL COLLATE utf8_unicode_ci, slug VARCHAR(128) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_BFDD3168989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_engines (car_id INT NOT NULL, engine_id INT NOT NULL, INDEX IDX_DB446350C3C6F69F (car_id), INDEX IDX_DB446350E78C9C0A (engine_id), PRIMARY KEY(car_id, engine_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_transmission (car_id INT NOT NULL, transmission_id INT NOT NULL, INDEX IDX_265EA677C3C6F69F (car_id), INDEX IDX_265EA67778D28519 (transmission_id), PRIMARY KEY(car_id, transmission_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(45) NOT NULL COLLATE utf8_unicode_ci, INDEX IDX_64C19C1727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE configuration_engines (configuration_id INT NOT NULL, engine_id INT NOT NULL, INDEX IDX_6A7505273F32DD8 (configuration_id), INDEX IDX_6A75052E78C9C0A (engine_id), PRIMARY KEY(configuration_id, engine_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE configuration_transmission (configuration_id INT NOT NULL, transmission_id INT NOT NULL, INDEX IDX_213277F373F32DD8 (configuration_id), INDEX IDX_213277F378D28519 (transmission_id), PRIMARY KEY(configuration_id, transmission_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE configure_engines (configuration_id INT NOT NULL, engine_id INT NOT NULL, INDEX IDX_A27D12D573F32DD8 (configuration_id), INDEX IDX_A27D12D5E78C9C0A (engine_id), PRIMARY KEY(configuration_id, engine_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_engines ADD CONSTRAINT FK_DB446350C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_engines ADD CONSTRAINT FK_DB446350E78C9C0A FOREIGN KEY (engine_id) REFERENCES engine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_transmission ADD CONSTRAINT FK_265EA67778D28519 FOREIGN KEY (transmission_id) REFERENCES transmission (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_transmission ADD CONSTRAINT FK_265EA677C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1727ACA70 FOREIGN KEY (parent_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE configuration_engines ADD CONSTRAINT FK_6A7505273F32DD8 FOREIGN KEY (configuration_id) REFERENCES configuration (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE configuration_engines ADD CONSTRAINT FK_6A75052E78C9C0A FOREIGN KEY (engine_id) REFERENCES engine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE configuration_transmission ADD CONSTRAINT FK_213277F373F32DD8 FOREIGN KEY (configuration_id) REFERENCES configuration (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE configuration_transmission ADD CONSTRAINT FK_213277F378D28519 FOREIGN KEY (transmission_id) REFERENCES transmission (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE configure_engines ADD CONSTRAINT FK_A27D12D573F32DD8 FOREIGN KEY (configuration_id) REFERENCES configuration (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE configure_engines ADD CONSTRAINT FK_A27D12D5E78C9C0A FOREIGN KEY (engine_id) REFERENCES engine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_car DROP FOREIGN KEY FK_9C2B8716C3C6F69F');
        $this->addSql('ALTER TABLE user_car DROP FOREIGN KEY FK_9C2B87167975B7E7');
        $this->addSql('ALTER TABLE user_car DROP FOREIGN KEY FK_9C2B8716A76ED395');
        $this->addSql('ALTER TABLE user_car DROP FOREIGN KEY FK_9C2B8716E78C9C0A');
        $this->addSql('ALTER TABLE user_car DROP FOREIGN KEY FK_9C2B871678D28519');
        $this->addSql('ALTER TABLE user_car ADD CONSTRAINT FK_9C2B8716C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_car ADD CONSTRAINT FK_9C2B87167975B7E7 FOREIGN KEY (model_id) REFERENCES model (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_car ADD CONSTRAINT FK_9C2B8716A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_car ADD CONSTRAINT FK_9C2B8716E78C9C0A FOREIGN KEY (engine_id) REFERENCES engine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_car ADD CONSTRAINT FK_9C2B871678D28519 FOREIGN KEY (transmission_id) REFERENCES transmission (id) ON DELETE CASCADE');
    }
}

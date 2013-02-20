<?php

namespace BMurphy\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130220151023 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE tokens (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, user_id INT DEFAULT NULL, token VARCHAR(255) NOT NULL, lifetime INT DEFAULT NULL, refresh_token VARCHAR(255) DEFAULT NULL, valid TINYINT(1) NOT NULL, created DATETIME DEFAULT NULL, updated DATETIME DEFAULT NULL, INDEX IDX_AA5A118E19EB6921 (client_id), INDEX IDX_AA5A118EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(1000) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, redirect_uri VARCHAR(255) DEFAULT NULL, client_id VARCHAR(255) NOT NULL, client_secret VARCHAR(255) NOT NULL, created DATETIME DEFAULT NULL, updated DATETIME DEFAULT NULL, INDEX IDX_C82E74A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE codes (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, user_id INT NOT NULL, code VARCHAR(255) NOT NULL, valid TINYINT(1) NOT NULL, created DATETIME DEFAULT NULL, updated DATETIME DEFAULT NULL, INDEX IDX_E5ADC14D19EB6921 (client_id), INDEX IDX_E5ADC14DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created DATETIME DEFAULT NULL, updated DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), UNIQUE INDEX UNIQ_1483A5E98FFBE0F7 (salt), UNIQUE INDEX UNIQ_1483A5E935C246D5 (password), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE tokens ADD CONSTRAINT FK_AA5A118E19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)");
        $this->addSql("ALTER TABLE tokens ADD CONSTRAINT FK_AA5A118EA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)");
        $this->addSql("ALTER TABLE clients ADD CONSTRAINT FK_C82E74A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)");
        $this->addSql("ALTER TABLE codes ADD CONSTRAINT FK_E5ADC14D19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)");
        $this->addSql("ALTER TABLE codes ADD CONSTRAINT FK_E5ADC14DA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE tokens DROP FOREIGN KEY FK_AA5A118E19EB6921");
        $this->addSql("ALTER TABLE codes DROP FOREIGN KEY FK_E5ADC14D19EB6921");
        $this->addSql("ALTER TABLE tokens DROP FOREIGN KEY FK_AA5A118EA76ED395");
        $this->addSql("ALTER TABLE clients DROP FOREIGN KEY FK_C82E74A76ED395");
        $this->addSql("ALTER TABLE codes DROP FOREIGN KEY FK_E5ADC14DA76ED395");
        $this->addSql("DROP TABLE tokens");
        $this->addSql("DROP TABLE clients");
        $this->addSql("DROP TABLE codes");
        $this->addSql("DROP TABLE users");
    }
}

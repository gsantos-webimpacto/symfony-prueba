<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200518115422 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE idioma (ididioma INT AUTO_INCREMENT NOT NULL, descripcion VARCHAR(100) NOT NULL, PRIMARY KEY(ididioma)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pais (idpais INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(100) NOT NULL, PRIMARY KEY(idpais)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producto (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, urlimagen VARCHAR(255) NOT NULL, fabricante VARCHAR(255) NOT NULL, precio INT NOT NULL, tags LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', descripcion VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provincia (idprovincia INT AUTO_INCREMENT NOT NULL, pais INT DEFAULT NULL, nombre VARCHAR(100) NOT NULL, INDEX fk_provincia_pais (pais), PRIMARY KEY(idprovincia)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, idioma INT DEFAULT NULL, pais INT DEFAULT NULL, provincia INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nombre VARCHAR(50) NOT NULL, apellidos VARCHAR(100) NOT NULL, fechadenacimiento DATE NOT NULL, sexo VARCHAR(20) NOT NULL, telefono VARCHAR(10) NOT NULL, datosadicionales VARCHAR(500) NOT NULL, ciudad VARCHAR(100) NOT NULL, direccion VARCHAR(300) NOT NULL, codigopostal INT NOT NULL, INDEX fk_user_pais (pais), INDEX fk_user_provincia (provincia), INDEX fk_user_idioma (idioma), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE provincia ADD CONSTRAINT FK_D39AF2137E5D2EFF FOREIGN KEY (pais) REFERENCES pais (idpais)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6491DC85E0C FOREIGN KEY (idioma) REFERENCES idioma (ididioma)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497E5D2EFF FOREIGN KEY (pais) REFERENCES pais (idpais)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D39AF213 FOREIGN KEY (provincia) REFERENCES provincia (idprovincia)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6491DC85E0C');
        $this->addSql('ALTER TABLE provincia DROP FOREIGN KEY FK_D39AF2137E5D2EFF');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497E5D2EFF');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D39AF213');
        $this->addSql('DROP TABLE idioma');
        $this->addSql('DROP TABLE pais');
        $this->addSql('DROP TABLE producto');
        $this->addSql('DROP TABLE provincia');
        $this->addSql('DROP TABLE user');
    }
}

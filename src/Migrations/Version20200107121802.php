<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200107121802 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE facture_product (facture_id INT NOT NULL, quantity INT, product_id INT NOT NULL, INDEX IDX_9BADA5F47F2DEE08 (facture_id), INDEX IDX_9BADA5F44584665A (product_id), PRIMARY KEY(facture_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, gender_id INT DEFAULT NULL, brand_id INT DEFAULT NULL, material_id INT DEFAULT NULL, color_id INT DEFAULT NULL, shape_id INT DEFAULT NULL, styles_id INT DEFAULT NULL, mount_type_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, reference LONGTEXT NOT NULL, INDEX IDX_D34A04AD708A0E0 (gender_id), INDEX IDX_D34A04AD44F5D008 (brand_id), INDEX IDX_D34A04ADE308AC6F (material_id), INDEX IDX_D34A04AD7ADA1FB5 (color_id), INDEX IDX_D34A04AD50266CBB (shape_id), INDEX IDX_D34A04ADB0A3C560 (styles_id), INDEX IDX_D34A04AD255FE5F7 (mount_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shape (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE facture_product ADD CONSTRAINT FK_9BADA5F47F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE facture_product ADD CONSTRAINT FK_9BADA5F44584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADE308AC6F FOREIGN KEY (material_id) REFERENCES material (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD50266CBB FOREIGN KEY (shape_id) REFERENCES shape (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADB0A3C560 FOREIGN KEY (styles_id) REFERENCES style (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD255FE5F7 FOREIGN KEY (mount_type_id) REFERENCES mount_type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE facture_product DROP FOREIGN KEY FK_9BADA5F44584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD50266CBB');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADB0A3C560');
        $this->addSql('DROP TABLE facture_product');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE shape');
        $this->addSql('DROP TABLE style');
    }
}

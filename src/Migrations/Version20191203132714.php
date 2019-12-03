<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191203132714 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE style_product (style_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_B5669A99BACD6074 (style_id), INDEX IDX_B5669A994584665A (product_id), PRIMARY KEY(style_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE style_product ADD CONSTRAINT FK_B5669A99BACD6074 FOREIGN KEY (style_id) REFERENCES style (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE style_product ADD CONSTRAINT FK_B5669A994584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD gender_id INT DEFAULT NULL, ADD brand_id INT DEFAULT NULL, ADD material_id INT DEFAULT NULL, ADD color_id INT DEFAULT NULL, ADD shape_id INT DEFAULT NULL, ADD mount_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADE308AC6F FOREIGN KEY (material_id) REFERENCES material (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD50266CBB FOREIGN KEY (shape_id) REFERENCES shape (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD255FE5F7 FOREIGN KEY (mount_type_id) REFERENCES mount_type (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD708A0E0 ON product (gender_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD44F5D008 ON product (brand_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADE308AC6F ON product (material_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD7ADA1FB5 ON product (color_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD50266CBB ON product (shape_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD255FE5F7 ON product (mount_type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE style_product');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD708A0E0');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD44F5D008');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADE308AC6F');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD7ADA1FB5');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD50266CBB');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD255FE5F7');
        $this->addSql('DROP INDEX IDX_D34A04AD708A0E0 ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD44F5D008 ON product');
        $this->addSql('DROP INDEX IDX_D34A04ADE308AC6F ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD7ADA1FB5 ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD50266CBB ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD255FE5F7 ON product');
        $this->addSql('ALTER TABLE product DROP gender_id, DROP brand_id, DROP material_id, DROP color_id, DROP shape_id, DROP mount_type_id');
    }
}

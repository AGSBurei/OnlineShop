<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191203131722 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE order_list_product');
        $this->addSql('DROP TABLE product_brand');
        $this->addSql('DROP TABLE product_color');
        $this->addSql('DROP TABLE product_gender');
        $this->addSql('DROP TABLE product_material');
        $this->addSql('DROP TABLE product_mount_type');
        $this->addSql('DROP TABLE product_shape');
        $this->addSql('DROP TABLE product_style');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE order_list_product (order_list_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_BC54DCACBD4BFC0 (order_list_id), INDEX IDX_BC54DCA4584665A (product_id), PRIMARY KEY(order_list_id, product_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE product_brand (product_id INT NOT NULL, brand_id INT NOT NULL, INDEX IDX_BD0E82044584665A (product_id), INDEX IDX_BD0E820444F5D008 (brand_id), PRIMARY KEY(product_id, brand_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE product_color (product_id INT NOT NULL, color_id INT NOT NULL, INDEX IDX_C70A33B54584665A (product_id), INDEX IDX_C70A33B57ADA1FB5 (color_id), PRIMARY KEY(product_id, color_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE product_gender (product_id INT NOT NULL, gender_id INT NOT NULL, INDEX IDX_A53B4BE64584665A (product_id), INDEX IDX_A53B4BE6708A0E0 (gender_id), PRIMARY KEY(product_id, gender_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE product_material (product_id INT NOT NULL, material_id INT NOT NULL, INDEX IDX_B70E1F024584665A (product_id), INDEX IDX_B70E1F02E308AC6F (material_id), PRIMARY KEY(product_id, material_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE product_mount_type (product_id INT NOT NULL, mount_type_id INT NOT NULL, INDEX IDX_6F7DC15C4584665A (product_id), INDEX IDX_6F7DC15C255FE5F7 (mount_type_id), PRIMARY KEY(product_id, mount_type_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE product_shape (product_id INT NOT NULL, shape_id INT NOT NULL, INDEX IDX_7C6C84844584665A (product_id), INDEX IDX_7C6C848450266CBB (shape_id), PRIMARY KEY(product_id, shape_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE product_style (product_id INT NOT NULL, style_id INT NOT NULL, INDEX IDX_92E1C3364584665A (product_id), INDEX IDX_92E1C336BACD6074 (style_id), PRIMARY KEY(product_id, style_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE order_list_product ADD CONSTRAINT FK_BC54DCA4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_list_product ADD CONSTRAINT FK_BC54DCACBD4BFC0 FOREIGN KEY (order_list_id) REFERENCES order_list (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_brand ADD CONSTRAINT FK_BD0E820444F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_brand ADD CONSTRAINT FK_BD0E82044584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_color ADD CONSTRAINT FK_C70A33B54584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_color ADD CONSTRAINT FK_C70A33B57ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_gender ADD CONSTRAINT FK_A53B4BE64584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_gender ADD CONSTRAINT FK_A53B4BE6708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_material ADD CONSTRAINT FK_B70E1F024584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_material ADD CONSTRAINT FK_B70E1F02E308AC6F FOREIGN KEY (material_id) REFERENCES material (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_mount_type ADD CONSTRAINT FK_6F7DC15C255FE5F7 FOREIGN KEY (mount_type_id) REFERENCES mount_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_mount_type ADD CONSTRAINT FK_6F7DC15C4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_shape ADD CONSTRAINT FK_7C6C84844584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_shape ADD CONSTRAINT FK_7C6C848450266CBB FOREIGN KEY (shape_id) REFERENCES shape (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_style ADD CONSTRAINT FK_92E1C3364584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_style ADD CONSTRAINT FK_92E1C336BACD6074 FOREIGN KEY (style_id) REFERENCES style (id) ON DELETE CASCADE');
    }
}

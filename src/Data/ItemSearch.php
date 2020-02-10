<?php
namespace App\Data;

use App\Entity\Brand;
use App\Entity\Color;
use App\Entity\Gender;
use App\Entity\Material;
use App\Entity\Mount;
use App\Entity\Shape;
use App\Entity\Style;

class ItemSearch
{
    /**
     * @var string
     */
    public $q = '';

    /** 
     * @var Style[]
     */
    public $style = [];

    /**
     * @var Color[]
     */
    public $color = [];

    /**
     * @var boolean
     */

    public $Stock = false;

    /**
    * @var Material[]
    */
    public $material = [];

    /**
     * @var Brand[]
     */
    public $Brand = [];

    /**
     * @var Shape[]
     */
    public $shape = [];

    /**
     * @var Gender[]
     */
    public $gender = [];

}
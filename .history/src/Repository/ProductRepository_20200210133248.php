<?php

namespace App\Repository;

use App\Data\ItemSearch;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Knp\Component\Pager\Paginator;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

     /**
      * @return Product[] 
      */
   
 
    public function findSearch(ItemSearch $search): array
    {
        $query = $this
            ->createQueryBuilder('Product')
            ->select('brand', 'Product');
            ->join('Product.brand', 'brand');

        if(!empty($search->q)){
            $query = $query
            ->andWhere('Product.title LIKE :q')
            ->setParameter('q', "%{$search->q}%");
        }

        if(!empty($search->Brand)){
            $query = $query
            ->andWhere('Product.brand = :Brand')
            ->setParameter('Brand', $search->Brand);
        }

        if(!empty($search->gender)){
            $query = $query
            ->andWhere('Product.gender = :gender')
            ->setParameter('gender', $search->gender);
        }

        if(!empty($search->color)){
            $query = $query
            ->andWhere('Product.color = :color')
            ->setParameter('color', $search->color);
        }
        return $query->getQuery()->getResult();
        return dd($query->getQuery());
     
    }
}

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

    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /**
     * @return PaginationInterface
     */
 
    public function findSearch(ItemSearch $search): Paginator
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('b', 'p')
            ->join('p.brand', 'b');

        if(!empty($search->q)){
            $query = $query
            ->andWhere('p.title LIKE :q')
            ->setParameter('q', "%{$search->q}%");
        }

        if(!empty($search->Brand)){
            $query = $query
            ->andWhere('p.id = :Brand')
            ->setParameter('Brand', $search->Brand);
        }
        /*return $query->getQuery()->getResult();*/
        /*return dd($query->getQuery()->getArrayResult());*/
        return dd($this->paginator->paginate)
        {
            $query
        
        }
    }
}

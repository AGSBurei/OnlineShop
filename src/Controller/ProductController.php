<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Entity\Gender;
use App\Entity\Brand;
use App\Entity\Material;
use App\Entity\Color;
use App\Entity\Shape;
use App\Entity\MountType;
use App\Entity\Style;
use App\Form\AddItemType;
use App\Form\AddColorType;
use App\Form\AddGenderType;
use App\Form\AddMaterialType;
use App\Form\AddMountTypeType;
use App\Form\AddShapeType;
use App\Form\AddStyleType;
use App\Form\AddBrandType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{
    /**
     * @Route("/", name="product_index")
     */
    public function index(ProductRepository $productRepository)
    {
        return $this->render('product/index.html.twig', [
            'products' => $productRepository->findAll()
        ]);
    }

    /**
     * @Route("/addItem", name="product_add")
     */
    public function addItem(Request $request, EntityManagerInterface $manager)
    {
        $product = new Product();
        $form = $this ->createForm(AddItemType::class, $product);
        $form->handleRequest($request);

        if($form->isSubmited()&& $form->isValid())
        {
            $manager->persist($product);
            $manager->flush();
        }
        return $this->render('product/addItem.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/addBrand", name="brand_add")
     */
    public function addBrand(Request $request, EntityManagerInterface $manager)
    {
        $brand = new Brand();
        $form = $this ->createForm(AddBrandType::class, $brand);
        $form->handleRequest($request);

        if($form->isSubmited()&& $form->isValid())
        {
            $manager->persist($brand);
            $manager->flush();
        }
        return $this->render('product/addBrand.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/addColor", name="Colo_add")
     */
    public function addColor(Request $request, EntityManagerInterface $manager)
    {
        $color = new Color();
        $form = $this ->createForm(AddColorType::class, $color);
        $form->handleRequest($request);

        if($form->isSubmited() && $form->isValid())
        {
            $manager->persist($color);
            $manager->flush();
        }
        return $this->render('product/addColor.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/addGender", name="Gender_add")
     */
    public function addGender(Request $request, EntityManagerInterface $manager)
    {
        $gender = new Gender();
        $form = $this ->createForm(AddGenderType::class, $gender);
        $form->handleRequest($request);
        
        if($form->isSubmited() && $form->isValid())
        {
            $manager->persist($gender);
            $manager->flush();
        }
        return $this->render('product/addGender.html.twig',[
            'form'=> $form->createView(),
        ]);
    }

    /**
     * @Route("/addMaterial", name="Material_add")
     */
    public function addMaterial(Request $Request, EntityManagerInterface $manager)
    {
        $material = new Material();
        $form = $this ->createForm(AddMaterialType::class, $material);
        $form ->handleRequest($request);
        
        if($form->isSubmited() && $form->isValid())
        {
            $manager->persist($material);
            $manager->flush();
        }
        return $this->render('product/addMaterial.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/addMountType", name="MountType_add")
     */
    public function addMount(Request $Request, EntityManagerInterface $manager)
    {
        $mount = new MountTypeType();
        $form = $this ->createForm(AddMountTypeTypes::class, $mountType);
        $form ->handleRequest($request);

        if($form->isSubmited() && $form->isValid())
        {
            $manager->persist($mountType);
            $manager->flush();
        }
        return $this ->render('product/addMount.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/addShape", name="Shape_add")
     */
    public function addShape(Request $request, EntityManagerInterface $manager)
    {
        $shape = new Shape();
        $form = $this ->createForm(AddShapeType::class, $shape);
        $form ->handleRequest($request);

        if($form->isSubmited() && $form->isValid())
        {
            $manager->persist($shape);
            $manager->flush();
        }
        return $this ->render('product/addShape.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/addStyle", name="Syle_add")
     */
    public function addStyle(Request $request, EntityManagerInterface $manager)
    {
        $style = new Style();
        $form = $this->createForm(AddShpeType::class, $style);
        $form ->handleRequest($request);

        if($form ->isSubmited()&& $form->isValid())
        {
            $manager->persist($style);
            $manager->flush();

            return $this -> render('product/addStyle.html.twig', [
                'form' => $form->createView(),
            ]);
        }

    }
}

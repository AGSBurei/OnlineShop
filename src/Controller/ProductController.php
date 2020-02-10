<?php

namespace App\Controller;

use App\Data\ItemSearch;
use App\Entity\Brand;
use App\Entity\Color;
use App\Entity\Mount;
use App\Entity\Shape;
use App\Entity\Style;
use App\Entity\Gender;
use App\Entity\Product;
use App\Entity\Material;
use App\Entity\MountType;
use App\Form\AddItemType;
use App\Form\AddBrandType;
use App\Form\AddColorType;
use App\Form\AddShapeType;
use App\Form\AddStyleType;
use App\Form\AddGenderType;
use App\Form\AddMaterialType;
use App\Form\AddMountType;
use App\Form\SearchForm;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    /**
     * @Route("/", name="product_index")
     */
    public function index(ProductRepository $productRepository, Request $request)
    {
        $data = new ItemSearch();
        $form = $this->createForm(SearchForm::class, $data);
        $form-> handleRequest($request);
        $products = $productRepository->findSearch($data);
        return $this->render('product/index.html.twig', [
            'products' => $products,
            'form' => $form->createView()
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
        
        if($form->isSubmitted()&& $form->isValid())
        {
            $product->setGender($form["gender"]->getData());
            $product->setBrand($form["brand"]->getData());
            $product->setMaterial($form["material"]->getData());
            $product->setColor($form["color"]->getData());
            $product->setStyle($form["style"]->getData());
            $product->setMount($form["mount"]->getData());
            $product->setShape($form["shape"]->getData());



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

        if($form->isSubmitted()&& $form->isValid())
        {
            $manager->persist($brand);
            $manager->flush();
        }
        return $this->render('product/addBrand.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/addColor", name="colo_add")
     */
    public function addColor(Request $request, EntityManagerInterface $manager)
    {
        $color = new Color();
        $form = $this ->createForm(AddColorType::class, $color);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($color);
            $manager->flush();
        }
        return $this->render('product/addColor.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/addGender", name="gender_add")
     */
    public function addGender(Request $request, EntityManagerInterface $manager)
    {
        $gender = new Gender();
        $form = $this ->createForm(AddGenderType::class, $gender);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($gender);
            $manager->flush();
        }
        return $this->render('product/addGender.html.twig',[
            'form'=> $form->createView(),
        ]);
    }

    /**
     * @Route("/addMaterial", name="material_add")
     */
    public function addMaterial(Request $request, EntityManagerInterface $manager)
    {
        $material = new Material();
        $form = $this ->createForm(AddMaterialType::class, $material);
        $form ->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($material);
            $manager->flush();
        }
        return $this->render('product/addMaterial.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    

    /**
     * @Route("/addShape", name="shape_add")
     */
    public function addShape(Request $request, EntityManagerInterface $manager)
    {
        $shape = new Shape();
        $form = $this ->createForm(AddShapeType::class, $shape);
        $form ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($shape);
            $manager->flush();
        }
        return $this ->render('product/addShape.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/addStyle", name="style_add")
     */
    public function addStyle(Request $request, EntityManagerInterface $manager)
    {
        $style = new Style();
        $form = $this->createForm(AddStyleType::class, $style);
        $form ->handleRequest($request);

        if($form ->isSubmitted()&& $form->isValid())
        {
           $manager->persist($style);
            $manager->flush();
        }
        return $this -> render('product/addStyle.html.twig', [
            'form' => $form->createView(),
       ]);
    }

    /**
     * @Route("/addMount", name="Mount_add")
     */
    public function addMount(Request $request, EntityManagerInterface $manager)
    {
        $mount = new Mount();
        $form = $this->createForm(AddMountType::class, $mount);
        $form ->handleRequest($request);

        if($form ->isSubmitted()&& $form->isValid())
        {
            $manager->persist($mount);
            $manager->flush();
        }
        return $this -> render('product/addMount.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

<?php

namespace App\Form;


use App\Data\ItemSearch;
use App\Entity\Brand;
use App\Entity\Color;
use App\Entity\Material;
use App\Entity\Shape;
use App\Entity\Style;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SearchForm extends AbstractType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q', TextType::class,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Produit recherché'
                ]
            ])
            ->add('material', EntityType::class,[
                'label' => false,
                'required' => false,
                'class' => Material::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('color', EntityType::class,[
                'label' => false,
                'required' => false,
                'class' => Color::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('style', EntityType::class,[
                'label' => false,
                'required' => false,
                'class' => Style::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('Brand', EntityType::class,[
                'label' => false,
                'required' => false,
                'class' => Brand::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('shape', EntityType::class,[
                'label' => false,
                'required' => false,
                'class' => Shape::class,
                'expanded' => true,
                'multiple' => true
            ])
            
            
            
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ItemSearch::class,
            'method' =>'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}

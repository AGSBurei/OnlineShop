<?php

namespace App\Form;

use App\Entity\Brand;

use App\Entity\Color;
use App\Entity\Mount;
use App\Entity\Shape;
use App\Entity\Style;
use App\Entity\Gender;
use App\Entity\Product;
use App\Entity\Material;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AddItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('image')
            ->add('price')
            ->add('reference')
            ->add('gender', EntityType::class, [
                'label' => 'Gender',
                'required' => true,
                'class' => Gender::class,
                'mapped' => false,
                'choice_label' => 'wording'
            ])
            ->add('brand', EntityType::class, [
                'label' => 'Brand',
                'required' => true,
                'class' => Brand::class,
                'mapped' => false,
                'choice_label' => 'name'
            ])
            ->add('material', EntityType::class, [
                'label' => 'Material',
                'required' => true,
                'class' => Material::class,
                'mapped' => false,
                'choice_label' => 'wording'
            ])
            ->add('color', EntityType::class, [
                'label' => 'Color',
                'required' => true,
                'class' => Color::class,
                'mapped' => false,
                'choice_label' => 'label'
            ])
            ->add('shape', EntityType::class, [
                'label' => 'Shape',
                'required' => true,
                'class' => Shape::class,
                'mapped' => false,
                'choice_label' => 'label'
            ])
            ->add('style', EntityType::class, [
                'label' => 'Style',
                'required' => true,
                'class' => Style::class,
                'mapped' => false,
                'choice_label' => 'label'
            ])
            ->add('mount', EntityType::class, [
                'label' => 'Mount',
                'required' => true,
                'class' => Mount::class,
                'mapped' => false,
                'choice_label' => 'name'
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}

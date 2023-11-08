<?php

namespace App\Form;

use App\Entity\City;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'row_attr' => [ 'class' => 'mb-3' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'attr' => [ 'class' => 'form-control' ],
            ])
            ->add('country',ChoiceType::class, [
                "choices"=>[
                    'Poland'=>'PL',
                    'Germany'=>'DE',
                    'France'=>'FR',
                    'Spain'=>'ES',
                    'Italy'=>'IT',
                    'United Kingdom'=>'GB',
                    'United States'=>'US',
                ],
                'row_attr' => [ 'class' => 'mb-3' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'attr' => [ 'class' => 'form-control' ],
            ])
            ->add('lat',NumberType::class,[
                'row_attr' => [ 'class' => 'mb-3' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'attr' => [ 'class' => 'form-control' ],
            ])
            ->add('lot',NumberType::class,[
                'row_attr' => [ 'class' => 'mb-3' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'attr' => [ 'class' => 'form-control' ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => City::class,
        ]);
    }
}

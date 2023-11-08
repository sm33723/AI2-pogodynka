<?php

namespace App\Form;

use App\Entity\Forecast;
use SebastianBergmann\CodeCoverage\Report\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ForecastType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('timestamp',DateTimeType::class,[
                'widget' => 'single_text',
                'row_attr' => [ 'class' => 'mb-3' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'attr' => [ 'class' => 'form-control' ],
            ])
            ->add('temperature',NumberType::class,[
                'row_attr' => [ 'class' => 'mb-3' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'attr' => [ 'class' => 'form-control' ],
            ])
            ->add('wind_speed',NumberType::class,[
                'row_attr' => [ 'class' => 'mb-3' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'attr' => [ 'class' => 'form-control' ],
            ])
            ->add('wind_direction',TextType::class,[
                'row_attr' => [ 'class' => 'mb-3' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'attr' => [ 'class' => 'form-control' ],
            ])
            ->add('humidity',NumberType::class,[
                'row_attr' => [ 'class' => 'mb-3' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'attr' => [ 'class' => 'form-control' ],
            ])
            ->add('air_quality',TextType::class,[
                'row_attr' => [ 'class' => 'mb-3' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'attr' => [ 'class' => 'form-control' ],
            ])
            ->add('cloud_cover',NumberType::class,[
                'row_attr' => [ 'class' => 'mb-3' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'attr' => [ 'class' => 'form-control' ],
            ])
            ->add('cloud_ceiling',NumberType::class,[
                'row_attr' => [ 'class' => 'mb-3' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'attr' => [ 'class' => 'form-control' ],])
            ->add('rain',NumberType::class,[
                'row_attr' => [ 'class' => 'mb-3' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'attr' => [ 'class' => 'form-control' ],
            ])
            ->add('visibility',NumberType::class,[
                'row_attr' => [ 'class' => 'mb-3' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'attr' => [ 'class' => 'form-control' ],
            ])
            ->add('city',options:[
                'row_attr' => [ 'class' => 'mb-3' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'attr' => [ 'class' => 'form-control' ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Forecast::class,
        ]);
    }
}

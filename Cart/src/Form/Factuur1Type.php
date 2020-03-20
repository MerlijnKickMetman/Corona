<?php

namespace App\Form;

use App\Entity\Factuur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Factuur1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FactuurDatum')
            ->add('VervalDatum')
            ->add('InzakeOpdracht')
            ->add('Korting')
            ->add('KlantNummer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Factuur::class,
        ]);
    }
}

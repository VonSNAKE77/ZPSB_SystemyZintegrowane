<?php

namespace App\Form;

use App\Entity\Fv;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FvType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numerFaktury')
            ->add('terminPlatnosci')
            ->add('kontId')
            ->add('typ')
            ->add('statusPlatnosci')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fv::class,
        ]);
    }
}

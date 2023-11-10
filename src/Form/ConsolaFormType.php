<?php

namespace App\Form;

use App\Entity\Consola;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsolaFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('marca')
            ->add('modelo')
            ->add('precio')
            ->add('foto')
            ->add('stock')
            ->add('info')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Consola::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Histoire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class HistoireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('age')
            ->add('langue')
            ->add('nomHistoire')
            ->add('contenuHistoire', FileType::class, array('data_class' => null))
            ->add('couvertureHistoire',FileType::class, array('data_class' => null))
            ->add('categorie')
            ->add("Submit",SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Histoire::class,
        ]);
    }
}

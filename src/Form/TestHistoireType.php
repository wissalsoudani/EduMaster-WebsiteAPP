<?php

namespace App\Form;

use App\Entity\Histoire;
use App\Entity\TestHistoire;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestHistoireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('question1')
            ->add('r11')
            ->add('r12')
            ->add('r13')
            ->add('correctionq1')
            ->add('question2')
            ->add('r21')
            ->add('r22')
            ->add('r23')
            ->add('correctionq2')
            ->add('question3')
            ->add('r31')
            ->add('r32')
            ->add('r33')
            ->add('correctionq3')
            ->add('idHistoire',EntityType::class,['class'=>Histoire::class,'choice_label'=>'nomHistoire','label'=>'choisissez le nom de votre histoire'])
            ->add("Submit",SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TestHistoire::class,
        ]);
    }
}

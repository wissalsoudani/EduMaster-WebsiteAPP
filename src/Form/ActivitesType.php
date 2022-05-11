<?php

namespace App\Form;

use App\Entity\Activites;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class ActivitesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('dateActivite', DateType::class, [
                'widget' => 'single_text', 'input' => 'string',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('prixActivite')
            ->add('typeActivite')
            ->add('description')
            ->add('lieu')
            ->add('imageFile',FileType::class,[
                'required' => false,
                'data_class' => null,
                // Register new key "empty_data" with an empty string
                'empty_data' => ''
            ])
          -> add('save', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Activites::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use App\Repository\FamilleRepo;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProduitType extends AbstractType
{

    private $Crepo;
    public  function __construct(FamilleRepo $Crepo)
    {
        $this->FamilleRepo = $Crepo;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('pa')
            ->add('pv')
            ->add('tva')
            ->add('stock')
            ->add('image', FileType::class, array('data_class' => null,'required' => false),  [
                'label' => true,
    
            ]) 
            
        


            ->add('familleId', ChoiceType::class, [

                'multiple' => false,
                'choices' =>    
                    $this->FamilleRepo->createQueryBuilder('u')->select("(u.id) as familleId")->getQuery()->getResult(),
                    'choice_label' => function ($choice) {
                    return $choice;
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}

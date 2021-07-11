<?php

namespace App\Form;

use App\Entity\Equipage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EquipeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,[
                'label'=>false,
                'required'=>true,
                'attr'=> [
                    'class'=>'form-control mb-3',
                    'placeholder'=> 'Charalampos',
                ]
            ])
            ->add('submit',SubmitType::class,[
                'attr'=> [
                    'class'=> 'btn btn-success mb-3',
                    'value'=> 'Ajouter'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Equipage::class,
            'method'=> 'post'
        ]);
    }
}

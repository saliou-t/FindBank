<?php

namespace App\Form;

use App\Entity\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,[
                'require' => false,
                'label' => false,
                'attr'=>[
                    'label' => 'Banque',
                    'placeholder' => 'Nom de la banque'
                ]
            ])
            ->add('localite',TextType::class,[
                'require' => false,
                'label' => false,
                'attr'=>[
                    'label' => 'localité',
                    'placeholder' => 'Nom de la localité'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'methode' => 'get',
            'csrf_protection'=>false
        ]);
    }
}

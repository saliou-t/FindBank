<?php

namespace App\Form;

use App\Entity\Banques;
use App\Entity\Localites;
use App\Entity\Operateurs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BanquesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('latitude')
            ->add('longitude')
            ->add('jours_ouverture')
            ->add('heur_ouverture')
            ->add('heur_fermiture')
            ->add('telephone')
            ->add('adresse')
            ->add('localite', EntityType::class, [
                'class'=>Localites::class,
                'choice_label'=>'nom'
            ])
            ->add('operateur', EntityType::class, [
                'class'=>Operateurs::class,
                'choice_label'=>'nom'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Banques::class,
        ]);
    }
}

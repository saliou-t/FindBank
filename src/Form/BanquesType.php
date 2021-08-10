<?php

namespace App\Form;

use App\Entity\Banques;
use App\Entity\Localites;
use App\Entity\Operateurs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BanquesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            // ->add('localite', EntityType::class, [
            //     'class'=>Localites::class,
            //     'choice_label'=>'nom',
            //     'label'=>'Localité ?'])
            ->add('Rechercher', SubmitType::class)
            ->getForm()
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Operateurs::class,
            'methode'=>'get'
        ]);
    }
}

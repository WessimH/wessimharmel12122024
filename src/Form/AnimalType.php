<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Enclos;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numeroIdentification')
            ->add('nom')
            ->add('dateArrivee', null, [
                'widget' => 'single_text',
            ])
            ->add('dateNaissance', null, [
                'widget' => 'single_text',
            ])
            ->add('dateDepart', null, [
                'widget' => 'single_text',
            ])
            ->add('proprietaire')
            ->add('sterilise')
            ->add('genre')
            ->add('espece')
            ->add('releation', EntityType::class, [
                'class' => Enclos::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}

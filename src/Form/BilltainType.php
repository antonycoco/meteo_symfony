<?php

namespace App\Form;

use App\Entity\Billtain;
use App\Entity\Climat;
use App\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BilltainType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ville',EntityType::class,['class'=>Ville::class,
                'choice_label'=>'nom',
                ])
            ->add('climat',EntityType::class,['class'=>Climat::class,
                'choice_label'=>'etat'])
            ->add('description')
            ->add('tempirature')
            ->add('date',null,[
                // 'widget'=>'single_text', // les deux date et time en un seule champ
                // 'html5'=>false, // pour le metre text modifiable

                'date_widget'=>'single_text',
                'time_widget'=>'single_text',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Billtain::class,
        ]);
    }
}

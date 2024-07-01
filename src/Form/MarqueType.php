<?php

namespace App\Form;

use App\Entity\Fabricant;
use App\Entity\Marque;
use App\Entity\Pays;
use App\Repository\PaysRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\repository\FabricantRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Translation\TranslatableMessage;

class MarqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [

            'label' => new TranslatableMessage('Marque'),

            'label_attr' => ['class' => 'fw-bold'],

            'attr' => ['class' => 'form-control']

        ])

        ->add('pays', null, [

            'label' => new TranslatableMessage('Pays'),

            'label_attr' => ['class' => 'fw-bold'],

            'attr' => ['class' => 'form-control'],

            'query_builder' => function (PaysRepository $repository) {

                return $repository->createQueryBuilder('u')->orderBy('u.nom', 'ASC');
            }

        ])

        ->add('fabricants', null, [

            'label' => new TranslatableMessage('Fabricant'),

            'label_attr' => ['class' => 'fw-bold'],

            'attr' => ['class' => 'form-control'],

            'query_builder' => function (FabricantRepository $repository) {

                return $repository->createQueryBuilder('u')->orderBy('u.nom', 'ASC');
            }

        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Marque::class,
        ]);
    }
}

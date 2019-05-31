<?php

namespace App\Form;

use App\Entity\Informations;
use App\Entity\User;
use Symfony\Component\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
class InformationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,
                array(
                     'label'=>'Tytuł'
                )
            )
            ->add('category',ChoiceType::class, [
                'choices' => ['Informacje' => 'Informacje',
                'Kultura i Rozrywka' => 'Rozrywka',
                'Sport' => 'Sport'],
                 'label'=>'Kategoria',])

            ->add('city',ChoiceType::class, [
                'choices' => ['Lublin' => 'Lublin',
                    'Warszawa' => 'Warszawa'],
                     'label'=>'Miasto',
                    ]
            )

            ->add('description', TextareaType::class,
                array(
                     'label'=>'Opis'
                )
            )

            ->add('author', HiddenType::class,
                array(
                'attr' => array('value' => ''),
                 'label'=>'Autor'
                )
            )

            ->add('date',DateType::class,
            array(
                 'label'=>'Data'
            )
            )

            ->add('photoPath', FileType::class,
                array(
                    'attr' => array(
                        'accept' => 'image/*',
                        'multiple' => 'multiple',
                    ),
                    'label'=>'Zdjęcie',
                    'data_class' => null
                )
            )

                  ->add('viewsCounter', HiddenType::class, array(
                'data' => '0'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Informations::class,
        ]);
    }
}

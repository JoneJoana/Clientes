<?php

namespace App\Form\Type;

use App\Config\TypesEnum;
use App\Entity\Client;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DataManagementForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [ 
                'label'=> 'Nombre',
                'attr' => ['class' => 'txtInput']
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required'   => false,
                'attr' => ['class' => 'input']
            ])
            ->add('telephone', NumberType::class, [
                'label' => 'Teléfono',
                'attr' => ['class' => 'txtInput']
            ])
            ->add('contact', ChoiceType::class, [
                'label' => 'Pers de contacto',
                'choices'  => [
                    TypesEnum::Directivo->getLabel() => 1,
                    TypesEnum::Comercial->getLabel() => 2,
                    TypesEnum::RRHH->getLabel() => 0,
                ],
                'attr' => ['class' => 'dropdown']
            ])
            ->add('active', CheckboxType::class, [
                'label' => 'Activo',
                'required'   => false,
                'attr' => ['class' => 'switch checkbox form-check-input', 'role' =>'switch']
            ])
            ->add('added', DateType::class, [
                'label' => 'Fecha de Alta',
                'disabled'=> 'true',
                'widget' => 'single_text',
                'attr' => ['class' => 'date']
            ])
            ->add('updated', DateType::class, [
                'label' => 'Fecha última actualización',
                'disabled'=> 'true',
                'widget' => 'single_text',
                'attr' => ['class' => 'date']
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Guardar',
                'attr' => ['class' => 'btn btn-outline-success buttonSave'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
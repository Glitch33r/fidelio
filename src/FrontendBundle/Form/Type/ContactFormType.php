<?php

namespace FrontendBundle\Form\Type;

use BackendBundle\Entity\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => false,
                'required' => false,
                'attr'   =>  [
                    'class'   => 'contact-form__input',
                    'placeholder' => 'Name'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'required' => false,
                'attr'   =>  [
                    'class'   => 'contact-form__input',
                    'placeholder' => 'E-mail'
                ]
            ])
            ->add('telephone', TextType::class, [
                'label' => false,
                'required' => false,
                'attr'   =>  [
                    'class'   => 'contact-form__input contact-form__input_margin',
                    'placeholder' => 'Phone'
                ]
            ])
            ->add('body', TextareaType::class, [
                'label' => false,
                'required' => false,
                'attr'   =>  [
                    'class'   => 'contact-form__textarea',
                    'placeholder' => 'Text'
                ]
            ])
//            ->add('save', SubmitType::class,[
//                'label'=> 'НАДІСЛАТИ',
//                'attr'   =>  [
//                    'class'   => 'send-message-submit',
//                ]
//            ])
        ;
    }

    public function getName()
    {
        return 'contact_form';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'BackendBundle\Entity\ContactForm']);
    }
}
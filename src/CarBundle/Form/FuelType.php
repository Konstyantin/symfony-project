<?php

namespace CarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class FuelType
 * @package CarBundle\Form
 */
class FuelType extends AbstractType
{
    /**
     * Build form
     *
     * Define form field and set attributes for each form field
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('urban', NumberType::class, [
                'translation_domain' => 'FuelType',
                'label' => 'form.label.urban',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.urban',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('extraUrban', NumberType::class, [
                'translation_domain' => 'FuelType',
                'label' => 'form.label.extraUrban',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.extraUrban',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('combined', NumberType::class, [
                'translation_domain' => 'FuelType',
                'label' => 'form.label.combined',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.combined',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('emission', NumberType::class, [
                'translation_domain' => 'FuelType',
                'label' => 'form.label.emission',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.emission',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
        ;
    }

    /**
     * Configuration options
     *
     * Set configuration params for current form
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'CarBundle\Entity\Fuel'
        ]);
    }

    /**
     * Get block prefix
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'car_bundle_fuel_type';
    }
}

<?php

namespace CarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class FeatureType
 * @package CarBundle\Form
 */
class FeatureType extends AbstractType
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
            ->add('short_description', TextType::class, [
                'label' => 'Short Description',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Short Description'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('full_description', TextType::class, [
                'label' => 'Full Description',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Full Description'
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ]);
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

    }

    /**
     * Get block prefix
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'car_bundle_feature_type';
    }
}
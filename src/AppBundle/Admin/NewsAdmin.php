<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 24.01.18
 * Time: 21:41
 */

namespace AppBundle\Admin;

use AppBundle\Entity\Offers;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class NewsAdmin
 * @package AppBundle\Admin
 */
class NewsAdmin extends AbstractAdmin
{
    /**
     * @var string $translationDomain
     */
    protected $translationDomain = 'SonataOffersBundle';

    /**
     * Configure form field
     *
     * Set configuration for form field which are displayed on the edit
     * and create action
     *
     * @param FormMapper $form
     */
    public function configureFormFields(FormMapper $form)
    {
        $form
            ->add('title', TextType::class, [
                'label' => 'form.label.title',
                'translation_domain' => 'SonataOffersBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.title'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 5,
                        'max' => 40
                    ])
                ]
            ])
            ->add('shortDescription', TextareaType::class, [
                'label' => 'form.label.shortDescription',
                'translation_domain' => 'SonataOffersBundle',
                'required' => false,
                'attr' => [
                    'placeholder' => 'form.placeholder.shortDescription'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 5,
                        'max' => 40
                    ])
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'form.label.description',
                'translation_domain' => 'SonataOffersBundle',
                'required' => false,
                'attr' => [
                    'class' => 'tinymce',
                    'data-theme' => 'bbcode',
                    'placeholder' => 'Description',
                    'tinymce'=>'{"theme":"simple"}'// Skip it if you want to use default theme
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 5,
                    ])
                ]
            ])
            ->add('newsImage', 'sonata_media_type', [
                'label' => 'form.label.offersImage',
                'translation_domain' => 'SonataOffersBundle',
                'provider' => 'sonata.media.provider.image',
                'context' => 'NewsLogo'
            ])
        ;
    }

    /**
     * Configure datagrid filters
     *
     * Configure datagrid filters which will used for filtered and sort
     * the list of car
     *
     * @param DatagridMapper $filter
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('title', null, ['label' => 'datagrid.filters.title']);
    }

    /**
     * Configure list fields
     *
     * Specific fields which are show all car are listed
     *
     * @param ListMapper $list
     */
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('title', null, [
                'label' => 'datagrid.list.title',
                'row_align' => 'left'
            ])
            ->add('_action', null, [
                'actions' => [
                    'delete' => [],
                    'edit' => []
                ]
            ]);
    }

    /**
     * This receives the object to transform to a string as the first parameter
     *
     * @param mixed $object
     * @return string
     */
    public function toString($object)
    {
        if ($object instanceof Offers) {
            return $object->getTitle();
        }

        return 'Offers';
    }
}
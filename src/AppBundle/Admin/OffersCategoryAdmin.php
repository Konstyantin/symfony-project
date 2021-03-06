<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 23.01.18
 * Time: 22:01
 */

namespace AppBundle\Admin;

use AppBundle\Entity\OffersCategory;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class OffersCategoryAdmin
 * @package AppBundle\Admin
 */
class OffersCategoryAdmin extends AbstractAdmin
{
    /**
     * @var string $translationDomain
     */
    protected $translationDomain = 'SonataOffersCategoryBundle';

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
            ->add('parent', EntityType::class, [
                'class' => 'AppBundle:OffersCategory',
                'choice_label' => 'name',
                'multiple' => false,
                'required' => false,
            ])
            ->add('name', TextType::class, [
                'label' => 'form.label.name',
                'required' => false,
                'translation_domain' => 'SonataOffersCategoryBundle',
                'attr' => [
                    'placeholder' => 'form.placeholder.name'
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'form.label.description',
                'required' => false,
                'translation_domain' => 'SonataOffersCategoryBundle',
                'attr' => [
                    'class' => 'tinymce',
                    'data-theme' => 'bbcode',
                    'placeholder' => 'Description',
                    'tinymce'=>'{"theme":"simple"}'// Skip it if you want to use default theme
                ]
            ])
            ->add('offersCategoryImage', 'sonata_media_type', [
                'provider' => 'sonata.media.provider.image',
                'context' => 'OffersCategoryLogo',
                'translation_domain' => 'SonataOffersCategoryBundle',
                'label' => 'form.label.offersCategoryImage'
            ])
        ;
    }

    /**
     * Configure datagrid filters
     *
     * Configure datagrid filters which will used for filtered and sort
     * the list of model
     *
     * @param DatagridMapper $filter
     */
    public function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('name', null, ['label' => 'datagrid.filters.name']);
    }

    /**
     * Configure list fields
     *
     * Specific fields which are show all model are listed
     *
     * @param ListMapper $list
     */
    public function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('name', null, ['label' => 'datagrid.list.name'])
            ->add('_action',null, [
                'actions' => [
                    'delete' => [],
                    'edit' => []
                ],
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
        if ($object instanceof OffersCategory) {
            return $object->getName();
        }

        return 'Offers Category';
    }
}
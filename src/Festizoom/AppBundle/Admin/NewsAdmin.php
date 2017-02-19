<?php
namespace Festizoom\AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NewsAdmin extends AbstractAdmin
{
    /**
     * Formulaire de mofication/ajout de news
     * @param FormMapper $fm
     */
    protected function configureFormFields(FormMapper $fm)
    {
        $fm -> add('title', TextType::class)
            -> add('utitle', TextType::class)
            -> add('body', TextareaType::class);
    }

    /**
     * Filtres d'affichage de news
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper -> add('id')
                        -> add('date');
    }

    /**
     *
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper -> addIdentifier('date')
                    -> addIdentifier('title')
                    -> addIdentifier('utitle');
    }
}
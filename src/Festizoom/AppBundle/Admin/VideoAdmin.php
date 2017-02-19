<?php
namespace Festizoom\AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class VideoAdmin extends AbstractAdmin
{
    /**
     * Formulaire d'ajout/modification de vidéos
     * @param FormMapper $fm
     */
    protected function configureFormFields(FormMapper $fm)
    {
        $fm -> add('url', TextType::class)
            -> add('date', DateTimeType::class)
            -> add('festival', 'sonata_type_model', array('property'=> 'name'));;
    }

    /**
     * Filtres de vidéos
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper -> add('id')
                        -> add('festival')
                        -> add('date');
    }

    /**
     * Affichage des vidéos
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper -> addIdentifier('id')
                    -> addIdentifier('url')
                    -> addIdentifier('date')
                    -> addIdentifier('festival', 'sonata_type_model', array('property'=> 'name'));
    }
}

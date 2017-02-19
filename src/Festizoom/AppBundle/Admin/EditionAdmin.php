<?php

namespace Festizoom\AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class EditionAdmin extends AbstractAdmin
{
    /**
     * Formulaire d'ajout/modification d'éditions
     * @param FormMapper $fm
     */
    protected function configureFormFields(FormMapper $fm)
    {
        $fm -> add('year', IntegerType::class)
            -> add('bdate', DateTimeType::class)
            -> add('edate', DateTimeType::class)
            -> add('lineup', TextareaType::class, ['required'=>false])
            -> add('aurl', UrlType::class, ['required'=>false])
            -> add('festival', 'sonata_type_model', array('property'=> 'name'));
    }

    /**
     * Filtres d'editions
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper -> add('id')
                        -> add('festival')
                        -> add('year');
    }

    /**
     * Affichage d'éditions
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper ->addIdentifier('id')
                    ->addIdentifier('year')
                    ->addIdentifier('festival', 'sonata_type_model', array('property'=> 'name'));
    }
}

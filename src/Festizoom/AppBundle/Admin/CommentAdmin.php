<?php
namespace Festizoom\AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CommentAdmin extends AbstractAdmin
{
    /**
     * Forumulaire de ajout/modification de commentaires
     * @param FormMapper $fm
     */
    protected function configureFormFields(FormMapper $fm)
    {
        $fm -> add('pseudo', TextType::class)
            -> add('body', TextareaType::class)
            -> add('valid', ChoiceType::class, array(
                    'choices'  => array(
                        'Validé' => true,
                        'En attente' => false
                    )
                )
            )
            -> add('festival', 'sonata_type_model', array('property'=> 'name'));;
    }

    /**
     * Filtres d'affichage des commentaires
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper -> add('id')
                        -> add('pseudo')
                        -> add('date');
    }

    /**
     * Affichage des commentaires
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper -> addIdentifier('id')
                    -> addIdentifier('pseudo')
                    -> addIdentifier('date')
                    -> addIdentifier('festival', 'sonata_type_model', array('property'=> 'name'))
                    -> addIdentifier('valid');
    }
}

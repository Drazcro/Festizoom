<?php

namespace Festizoom\AppBundle\Admin;

use Festizoom\AppBundle\Entity\Festival;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class CommentAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $fm)
    {
        $fm->add('body', TextareaType::class)
            ->add('pseudo', TextType::class)
            ->add('valid', ChoiceType::class, array(
                    'choices'  => array(
                        'Validé' => true,
                        'En attente' => false
                    )
                )
            )
            ->add('festival', 'sonata_type_model', array('property'=> 'name'));;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('id')
                       ->add('pseudo')
                       ->add('date');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id')
                    ->addIdentifier('pseudo')
                    ->addIdentifier('date')
                    ->addIdentifier('festival', 'sonata_type_model', array('property'=> 'name'))
                    ->addIdentifier('valid');
    }
}

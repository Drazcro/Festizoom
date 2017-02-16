<?php

namespace Festizoom\AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class FestivalAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $fm)
    {
        $fm->add('name', TextType::class)
            ->add('uname', TextType::class)
            ->add('capacity', IntegerType::class)
            ->add('wsurl', UrlType::class)
            ->add('furl', UrlType::class)
            ->add('aurl', TextType::class)
            ->add('location', TextType::class)
            ->add('kind', TextType::class)
            ->add('type', ChoiceType::class, array(
                'choices'  => array(
                    'Indoor' => 'indoor',
                    'Outdoor' => 'outdoor'
                    )
                )
            )
            ->add('period', ChoiceType::class, array(
                    'choices'  => array(
                        'Singleday' => 'singleday',
                        'Multiday' => 'multiday'
                    )
                )
            )
        ->add('minage', ChoiceType::class, array(
                'choices'  => array(
                    '16+' => '16',
                    '18+' => '18'
                )
            )
        );

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('id')
                       ->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id')
            ->addIdentifier('name');
    }
}
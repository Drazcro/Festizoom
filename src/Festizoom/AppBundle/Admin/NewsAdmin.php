<?php
namespace Festizoom\AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Validator\ErrorElement;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NewsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $fm)
    {
        $fm->add('title', TextType::class)
            ->add('utitle', TextType::class)
            ->add('body', TextareaType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('id')
                       ->add('date');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('date')
            ->addIdentifier('title')
            ->addIdentifier('utitle');
    }
}
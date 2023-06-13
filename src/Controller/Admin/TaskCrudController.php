<?php

namespace App\Controller\Admin;

use App\Config\Statuses\TaskStatus;
use App\Entity\Task;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class TaskCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Task::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('User task')
            ->setEntityLabelInPlural('User tasks')
            ->setSearchFields(['head', 'about', 'end_time'])
            ->setDefaultSort(['end_time' => 'DESC']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters->add(EntityFilter::new('user'));
    }


    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('user',);
        yield TextField::new('head');
        yield TextareaField::new('about')->hideOnIndex();
        yield ChoiceField::new('status')->setChoices(TaskStatus::cases());
        yield DateTimeField::new('end_time', 'end');
    }

}

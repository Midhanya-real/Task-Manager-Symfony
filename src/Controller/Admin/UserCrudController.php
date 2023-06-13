<?php

namespace App\Controller\Admin;

use App\Config\Roles\Roles;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ArrayFilter;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters->add(ArrayFilter::new('roles')->setChoices(Roles::cases()));
    }


    public function configureFields(string $pageName): iterable
    {
        yield EmailField::new('email');
        yield ArrayField::new('roles');
    }

}

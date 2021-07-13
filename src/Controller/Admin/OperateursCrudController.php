<?php

namespace App\Controller\Admin;

use App\Entity\Operateurs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OperateursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Operateurs::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}

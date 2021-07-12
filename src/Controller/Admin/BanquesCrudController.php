<?php

namespace App\Controller\Admin;

use App\Entity\Banques;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BanquesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Banques::class;
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

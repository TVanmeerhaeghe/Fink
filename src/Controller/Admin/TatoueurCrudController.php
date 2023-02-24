<?php

namespace App\Controller\Admin;

use App\Entity\Tatoueur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TatoueurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tatoueur::class;
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

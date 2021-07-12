<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Banques;
use App\Entity\Commune;
use App\Entity\Departement;
use App\Entity\Operateurs;
use App\Entity\Quartier;
use App\Entity\Region;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('FindBanks SIMPLON ONFP');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Banques', 'fas fa-newspaper', Banques::class);
        yield MenuItem::linkToCrud('Operateurs', 'fas fa-newspaper', Operateurs::class);
        yield MenuItem::linkToCrud('Regions', 'fas fa-newspaper', Region::class);
        yield MenuItem::linkToCrud('Département', 'fas fa-newspaper', Departement::class);
        yield MenuItem::linkToCrud('Communes', 'fas fa-newspaper', Commune::class);
        yield MenuItem::linkToCrud('Quartiers', 'fas fa-newspaper', Quartier::class);
    }
     /**
     * @Route("/connexion", name="app_login")
     */
    public function login(){
        return $this->render('security/login.html.twig');

    }

    /**
     * @Route("/deconnexion", name="app_logout")
     */
    public function logout(){}
}

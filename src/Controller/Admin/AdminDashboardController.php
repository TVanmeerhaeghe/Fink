<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Articles;
use App\Entity\Avis;
use App\Entity\Client;
use App\Entity\Contact;
use App\Entity\Maps;
use App\Entity\Quiz;
use App\Entity\Rdv;
use App\Entity\Reponses;
use App\Entity\Style;
use App\Entity\Tatoueur;

class AdminDashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Fink');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Articles', 'fas fa-list', Articles::class);
        yield MenuItem::linkToCrud('Avis', 'fas fa-list', Avis::class);
        yield MenuItem::linkToCrud('Clients', 'fas fa-list', Client::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-list', Contact::class);
        yield MenuItem::linkToCrud('Maps', 'fas fa-list', Maps::class);
        yield MenuItem::linkToCrud('Quiz', 'fas fa-list', Quiz::class);
        yield MenuItem::linkToCrud('Rendez-vous', 'fas fa-list', Rdv::class);
        yield MenuItem::linkToCrud('Reponses aux quizs', 'fas fa-list', Reponses::class);
        yield MenuItem::linkToCrud('Style de tatouage', 'fas fa-list', Style::class);
        yield MenuItem::linkToCrud('Tatoueurs', 'fas fa-list', Tatoueur::class);
    }
}

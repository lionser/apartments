<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Apartment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function index(): Response
    {
        return $this->render('home.html.twig', [
            'apartments' => $this->entityManager
                ->getRepository(Apartment::class)
                ->findAll()
        ]);
    }
}

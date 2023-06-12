<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//#[Route('/task')]
class TaskController extends AbstractController
{
    #[Route('/task', name: 'tasks', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('task/index.html.twig', [
            'controller_name' => 'TaskController',
        ]);
    }

    #[Route('/task/{id}', name: 'task', methods: ['GET'])]
    public function show(Task $task)
    {

    }

    #[Route('/task/{id}/update', name: 'update_task', methods: ['PUT'])]
    public function update(Task $task)
    {

    }

    #[Route('/task/{id}/delete', name: 'delete_task', methods: ['DELETE'])]
    public function delete(Task $task)
    {

    }
}

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/tasks')]
class TaskController extends AbstractController
{
#[Route('', name: 'task_create', methods: ['POST'])]
public function create(Request $request, EntityManagerInterface $em): JsonResponse
{
$data = json_decode($request->getContent(), true);

$task = new Task();
$task->setTitle($data['title']);
$task->setDescription($data['description']);
$task->setStatus($data['status']);
$task->setCreatedAt(new \DateTime());
$task->setUpdatedAt(new \DateTime());

$em->persist($task);
$em->flush();

return new JsonResponse(['status' => 'Task created!'], JsonResponse::HTTP_CREATED);
}

#[Route('/{id}', name: 'task_update', methods: ['PUT'])]
public function update(int $id, Request $request, TaskRepository $taskRepository, EntityManagerInterface $em): JsonResponse
{
$task = $taskRepository->find($id);
if (!$task) {
return new JsonResponse(['status' => 'Task not found!'], JsonResponse::HTTP_NOT_FOUND);
}

$data = json_decode($request->getContent(), true);
$task->setTitle($data['title']);
$task->setDescription($data['description']);
$task->setStatus($data['status']);
$task->setUpdatedAt(new \DateTime());

$em->flush();

return new JsonResponse(['status' => 'Task updated!']);
}

#[Route('/{id}', name: 'task_delete', methods: ['DELETE'])]
public function delete(int $id, TaskRepository $taskRepository, EntityManagerInterface $em): JsonResponse
{
$task = $taskRepository->find($id);
if (!$task) {
return new JsonResponse(['status' => 'Task not found!'], JsonResponse::HTTP_NOT_FOUND);
}

$em->remove($task);
$em->flush();

return new JsonResponse(['status' => 'Task deleted!']);
}

#[Route('/search', name: 'task_search', methods: ['GET'])]
public function search(Request $request, TaskRepository $taskRepository): JsonResponse
{
$query = $request->query->get('query');
$tasks = $taskRepository->searchByTitleOrDescription($query);

return new JsonResponse($tasks);
}
}
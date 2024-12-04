namespace App\Repository;

use App\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TaskRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, Task::class);
}

//public function findByStatus(string $status, int $page, int $limit)
//{
//$query = $this->createQueryBuilder('t')->where('t.status = :status')->setParameter('status', $status)
//return $query->getResult();
//}

public function searchByTitleOrDescription(string $query)
{
return $this->createQueryBuilder('t')
->where('t.title LIKE :query OR t.description LIKE :query')
->setParameter('query', '%' . $query . '%')
->getQuery()
->getResult();
}
}
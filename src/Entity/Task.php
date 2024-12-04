namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class Task
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column(type: 'integer')]
private $id;

#[ORM\Column(type: 'string', length: 255)]
private $title;

#[ORM\Column(type: 'text')]
private $description;

#[ORM\Column(type: 'string', length: 20)]
private $status;

#[ORM\Column(type: 'datetime')]
private $createdAt;

#[ORM\Column(type: 'datetime')]
private $updatedAt;

// Getter et Setter pour l'ID
public function getId(): ?int
{
return $this->id;
}

// Getter et Setter pour le titre
public function getTitle(): string
{
return $this->title;
}

public function setTitle(string $title): self
{
$this->title = $title;
return $this;
}

// Getter et Setter pour la description
public function getDescription(): string
{
return $this->description;
}

public function setDescription(string $description): self
{
$this->description = $description;
return $this;
}

// Getter et Setter pour le statut
public function getStatus(): string
{
return $this->status;
}

public function setStatus(string $status): self
{
$this->status = $status;
return $this;
}

// Getter et Setter pour la date de création
public function getCreatedAt(): \DateTimeInterface
{
return $this->createdAt;
}

public function setCreatedAt(\DateTimeInterface $createdAt): self
{
$this->createdAt = $createdAt;
return $this;
}

// Getter et Setter pour la date de mise à jour
public function getUpdatedAt(): \DateTimeInterface
{
return $this->updatedAt;
}

public function setUpdatedAt(\DateTimeInterface $updatedAt): self
{
$this->updatedAt = $updatedAt;
return $this;
}

#[Assert\NotBlank]
#[Assert\Length(min: 3, max: 255)]
private $title;

#[Assert\NotBlank]
private $description;

#[Assert\Choice(choices: ['todo', 'in_progress', 'done'])]
private $status;




}
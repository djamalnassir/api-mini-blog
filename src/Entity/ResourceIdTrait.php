<?php

declare(strict_types=1);

namespace App\Entity;

trait ResourceIdTrait
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"article_read", "article_details_read"})
     */
    private int $id;

    public function getId(): ?int
    {
        return $this->id;
    }

}
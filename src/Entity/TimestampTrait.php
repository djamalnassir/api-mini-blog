<?php

declare(strict_types=1);

namespace App\Entity;

trait TimestampTrait
{
    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $createdAt;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTimeInterface $updatedAt;

    /**
     * @return  \DateTimeInterface
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return  \DateTimeInterface
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param  \DateTimeInterface  $updatedAt
     * @return  self
     */ 
    public function setUpdatedAt(?\DateTimeInterface $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
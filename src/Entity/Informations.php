<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InformationsRepository")
 */
class Informations
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $author;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;




 /**
     * @Assert\Image(
     * maxWidth = 19200,
     * maxHeight = 1920,
     * maxWidthMessage ="Maksymalna szerokość zdjęcia to {{ max_width }} pikseli, obecne to {{ width }}",
     * maxHeightMessage ="Maksymalna wysokość zdjęcia to {{ max_height }} pikseli, obecne to {{ height }}"
     * )
     * @var string
     *
     * @ORM\Column(name="photoPath", type="string", length=255, nullable=true)
     */
    private $photoPath;

    /**
     * @ORM\Column(type="integer")
     */
    private $viewsCounter;



public function __toString(){
        // to show the name of the Category in the select
        return $this->name;
        // to show the id of the Category in the select
        // return $this->id;
    }


      /**
     * Set photoPath
     *
     * @param string $photoPath
     * @return Ad
     */
    public function setPhotoPath($photoPath)
    {
        $this->photoPath = $photoPath;
        return $this;
    }
    /**
     * Get photoPath
     *
     * @return string
     */
    public function getPhotoPath()
    {
        return $this->photoPath;
    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAuthor(): ?int
    {
        return $this->author;
    }

    public function setAuthor(int $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getViewsCounter(): ?int
    {
        return $this->viewsCounter;
    }

    public function setViewsCounter(int $viewsCounter): self
    {
        $this->viewsCounter = $viewsCounter;

        return $this;
    }
    public function incrementViewsCounter(): self
    {
        $this->viewsCounter ++;

        return $this;
    }



}

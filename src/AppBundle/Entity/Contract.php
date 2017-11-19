<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 19/11/17
 * Time: 00:21
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Contract
 * @package AppBundle\Entity
 * @ORM\Entity()
 */
class Contract
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(
     *     maxSize = "1024M",
     *     mimeTypes = {"image/png", "image/jpg", "image/gif"},
     *     mimeTypesMessage = "Veuillez choisir une image de type png, gif, jpg ou jpeg"
     * )
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $imageSize;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Contract
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param mixed $imageFile
     * @return Contract
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;

        if ($imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * @param string $imageName
     * @return Contract
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
        return $this;
    }

    /**
     * @return int
     */
    public function getImageSize()
    {
        return $this->imageSize;
    }

    /**
     * @param int $imageSize
     * @return Contract
     */
    public function setImageSize($imageSize)
    {
        $this->imageSize = $imageSize;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return Contract
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}

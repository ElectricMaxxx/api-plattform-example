<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="ConsumptionPointRepository")
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 * @ApiResource();
 */
class ConsumptionPoint
{
    /**
     * The primary key.
     *
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @Groups({"value"})
     */
    private $id;

    /**
     * @var string A name to identify the consumption point.
     *
     * @ORM\Column()
     * 
     * @Groups({"value"})
     */
    private $name;

    /**
     * A Date we stoped living at this consumption point – more the date of the contract.
     *
     * @var \DateTimeImmutable
     *
     * @ORM\Column(type="date_immutable")
     * 
     *
     * @Groups({"value"})
     */
    private $activeFrom;

    /**
     * A Date we started living at this consumption point – more the date of the contract.
     *
     * @var \DateTimeImmutable
     *
     * @ORM\Column(type="date_immutable")
     * 
     * @Groups({"value"})
     */
    private $activeTo;

    /**
     * A collection of Values for this consumption point.
     *
     * @var ConsumptionValue[]|ArrayCollection
     *
     * @ORM\ManyToOne(targetEntity="ConsumptionValue", inversedBy="point")
     */
    private $values;

    /**
     * The offset we get through this consumption point (we did most not start at 0)
     *
     * @var int
     *
     * @Groups({"value"})
     */
    private $offsetInValue;

    /**
     * The Price per unit during a specific duration.
     *
     * @var int
     * 
     * @Groups({"value"})
     */
    private $pricePerUnit;

    /**
     * Should be one of 'gas', 'power' or 'water';
     *
     * @var string
     * 
     * @Groups({"value"})
     */
    private $valueType;

    public function __construct()
    {
        $this->values = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getActiveFrom()
    {
        return $this->activeFrom;
    }

    /**
     * @param \DateTimeImmutable $activeFrom
     */
    public function setActiveFrom($activeFrom)
    {
        $this->activeFrom = $activeFrom;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getActiveTo()
    {
        return $this->activeTo;
    }

    /**
     * @param \DateTimeImmutable $activeTo
     */
    public function setActiveTo($activeTo)
    {
        $this->activeTo = $activeTo;
    }

    /**
     * @return ConsumptionValue[]|ArrayCollection
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param ConsumptionValue[]|ArrayCollection $values
     */
    public function setValues($values)
    {
        $this->values = $values;
    }

    /**
     * @return int
     */
    public function getOffsetInValue()
    {
        return $this->offsetInValue;
    }

    /**
     * @param int $offsetInValue
     */
    public function setOffsetInValue($offsetInValue)
    {
        $this->offsetInValue = $offsetInValue;
    }

    /**
     * @return int
     */
    public function getPricePerUnit()
    {
        return $this->pricePerUnit;
    }

    /**
     * @param int $pricePerUnit
     */
    public function setPricePerUnit($pricePerUnit)
    {
        $this->pricePerUnit = $pricePerUnit;
    }

    /**
     * @return string
     */
    public function getValueType()
    {
        return $this->valueType;
    }

    /**
     * @param string $valueType
     */
    public function setValueType($valueType)
    {
        $this->valueType = $valueType;
    }
}

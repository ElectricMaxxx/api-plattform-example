<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ORM\Entity
 * @author Maximilian Berghoff <Maximilian.Berghoff@mayflower.de>
 *
 * @ApiResource(
 *     attributes={
 *         "normalization_context"={"groups"={"value"}},
 *         "denormalization_context"={"groups"={"value"}}
 *     }
 * )
 */
class ConsumptionValue
{
    /**
     *  The primary key.
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
     * The type of a value should be one of 'gas', 'power' or 'water' ath the momen.
     *
     * @var string
     *
     * @ORM\Column()
     * 
     * @Groups({"value"})
     */
    private $type;

    /**
     * The Unit to use for the current value. We use 'kWh' and 'm³' for gas|power and water.
     *
     * @var string
     *
     * @ORM\Column()
     * 
     * @Groups({"value"})
     */
    private $unit;

    /**
     * The value as a float number.
     *
     * @var float
     *
     * @ORM\Column()
     * 
     * @Groups({"value"})
     *
     * @ApiSubresource()
     */
    private $value;
    /**
     * The date where we collect the data for the current consumption value
     *
     * @var \DateTimeImmutable
     *
     * @ORM\Column(type="date_immutable")
     *
     * @Groups({"value"})
     */
    private $date;
    /**
     * The consumption point the value is collected.
     *
     * @var ConsumptionPoint
     *
     * @ORM\OneToMany(targetEntity="ConsumptionPoint", mappedBy="values")
     *
     * @ApiSubresource()
     * @MaxDepth(1)
     *
     * @Groups({"value"})
     */
    private $point;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTimeImmutable $date
     */
    public function setDate(\DateTimeImmutable $date)
    {
        $this->date = $date;
    }
}

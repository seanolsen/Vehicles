<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 27.05.2018
 * Time: 11:59
 */

namespace Vehicle;

use Fuel\FuelAbstract;

abstract class VehicleAbstract implements VehicleInterface
{
    protected $name = null;
    protected $fuelType = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setName(string $name) : self
    {
        $this->name = $name;

        return $this;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function refuel(FuelAbstract $fuel, float $volume) : self
    {
        echo 'refuel ' . $fuel->getName() . ' - ' . $volume . 'L' . PHP_EOL;

        return $this;
    }

    public function stop() : self
    {
        echo 'stopping' . PHP_EOL;

        return $this;
    }

    public function getFuelType() : string
    {
        return $this->fuelType;
    }

    public function setFuelType(string $fuelType) : self
    {
        $this->fuelType = $fuelType;

        return $this;
    }

    public function move() : self
    {
        echo 'moving' . PHP_EOL;

        return $this;
    }
}
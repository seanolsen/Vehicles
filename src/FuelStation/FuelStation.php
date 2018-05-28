<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 27.05.2018
 * Time: 11:59
 */

namespace FuelStation;

use Fuel\FuelAbstract;
use Fuel\Exception\FuelNameNotSetException;
use Fuel\Exception\FuelNotFoundException;
use Vehicle\VehicleAbstract;

class FuelStation
{
    /**
     * @param string $fuelClassName
     * @throws FuelNameNotSetException
     * @throws FuelNotFoundException
     */
    public function validateFuel(string $fuelClassName)
    {
        if (empty($fuelClassName)) {
            throw new FuelNameNotSetException('Fuel name not set');
        }

        if (!class_exists($fuelClassName)) {
            throw new FuelNotFoundException(
                sprintf(
                    'There is no fuel "%s"',
                    $fuelClassName
                )
            );
        }

        $fuelClass = new \ReflectionClass($fuelClassName);
        if (!$fuelClass->isSubclassOf(FuelAbstract::class)) {
            throw new FuelNotFoundException(
                sprintf(
                    '"%s" is not a fuel',
                    $fuelClassName
                )
            );
        }
    }

    /**
     * @param VehicleAbstract $vehicle
     * @param float $amount
     * @return FuelStation
     * @throws FuelNameNotSetException
     * @throws FuelNotFoundException
     */
    public function refuel(VehicleAbstract $vehicle, float $amount) : self
    {
        $fuelClassName = $vehicle->getFuelType();
        $this->validateFuel($fuelClassName);

        $vehicle->refuel(new $fuelClassName, $amount);

        return $this;
    }
}

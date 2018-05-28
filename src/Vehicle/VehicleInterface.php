<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 27.05.2018
 * Time: 11:59
 */

namespace Vehicle;

use Fuel\FuelAbstract;

interface VehicleInterface
{
    public function refuel(FuelAbstract $fuel, float $amount);
    public function stop();
    public function getFuelType();
    public function setFuelType(string $fuelType);
}

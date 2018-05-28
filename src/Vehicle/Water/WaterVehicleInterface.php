<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 27.05.2018
 * Time: 11:59
 */

namespace Vehicle\Water;

use Vehicle\VehicleInterface;

interface WaterVehicleInterface extends VehicleInterface
{
    public function swim();
}

<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 27.05.2018
 * Time: 11:59
 */

namespace Vehicle\Ground;

use Vehicle\VehicleInterface;

interface GroundVehicleInterface extends VehicleInterface
{
    public function move();
}

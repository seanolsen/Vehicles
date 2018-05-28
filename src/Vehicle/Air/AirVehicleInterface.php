<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 27.05.2018
 * Time: 11:59
 */

namespace Vehicle\Air;

use Vehicle\VehicleInterface;

interface AirVehicleInterface extends VehicleInterface
{
    public function fly();
    public function landing();
    public function takeOff();
}

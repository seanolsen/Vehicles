<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 27.05.2018
 * Time: 11:59
 */

namespace Vehicle\Water;

use Vehicle\VehicleAbstract;

abstract class WaterVehicleAbstract extends VehicleAbstract implements WaterVehicleInterface
{
    public function swim() : self
    {
        echo 'swimming';

        return $this;
    }
}

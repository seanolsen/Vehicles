<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 27.05.2018
 * Time: 11:59
 */

namespace Vehicle\Ground;

use Vehicle\VehicleAbstract;

abstract class GroundVehicleAbstract extends VehicleAbstract implements GroundVehicleInterface
{
    public function musicOn() : self
    {
        echo 'la-la-la';

        return $this;
    }

    public function musicOff() : self
    {
        echo 'tssss';

        return $this;
    }
}

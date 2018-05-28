<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 27.05.2018
 * Time: 11:59
 */

namespace Vehicle;

use Vehicle\Ground\GroundVehicleAbstract;

class Truck extends GroundVehicleAbstract
{
    public function emptyLoads() : self
    {
        echo 'its empty';

        return $this;
    }
}

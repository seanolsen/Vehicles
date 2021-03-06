<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 27.05.2018
 * Time: 11:59
 */

namespace Vehicle\Air;

use Vehicle\VehicleAbstract;

abstract class AirVehicleAbstract extends VehicleAbstract implements AirVehicleInterface
{
    public function fly() : self
    {
        echo 'flying' . PHP_EOL;

        return $this;
    }

    public function landing() : self
    {
        echo 'landing' . PHP_EOL;

        return $this;
    }

    public function takeOff() : self
    {
        echo 'took off' . PHP_EOL;

        return $this;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 27.05.2018
 * Time: 11:59
 */

namespace app;

use Fuel\Exception\FuelNameNotSetException;
use Fuel\Exception\FuelNotFoundException;
use Fuel\Petrol\Petrol;
use Fuel\Diesel\Diesel;
use Fuel\Kerosene\Kerosene;
use FuelStation\FuelStation;
use Vehicle\Car;
use Vehicle\Truck;
use Vehicle\Boat;
use Vehicle\Helicopter;
use Vehicle\VehicleAbstract;

class app
{
    private $vehicles = [];

    public function run()
    {
        $this->loadVehicles();

        /** @var VehicleAbstract $vehicle */
        foreach($this->vehicles as $vehicle) {
            $this->useVehicle($vehicle);
            $this->refuelVehicle($vehicle);

            // add linebreak
            echo PHP_EOL;
        }
    }

    private function loadVehicles()
    {
        $this->vehicles = [
            (new Car('bmw'))->setFuelType(Petrol::class),
            (new Boat('boat'))->setFuelType(Diesel::class),
            (new Helicopter('helicopter'))->setFuelType(Kerosene::class),
            (new Truck('kamaz'))->setFuelType(Diesel::class),
        ];
    }

    private function useVehicle(VehicleAbstract $vehicle)
    {
        // this block was changed from switch/case to if/elseif
        // to let your IDE highlight available methods for each
        // instance of vehicles (thnx to instanceof in PhpStorm:))
        if ($vehicle instanceof Car) {
            $vehicle->move();
            $vehicle->musicOn();
        } elseif ($vehicle instanceof Boat) {
            $vehicle->move();
            $vehicle->swim();
        } elseif ($vehicle instanceof Helicopter) {
            $vehicle->takeOff();
            $vehicle->fly();
            $vehicle->landing();
        } elseif ($vehicle instanceof Truck) {
            $vehicle->move();
            $vehicle->stop();
            $vehicle->emptyLoads();
        }

        $vehicle->stop();
    }

    private function refuelVehicle(VehicleAbstract $vehicle)
    {
        $fuelStation = new FuelStation();

        try {
            $fuelStation->refuel($vehicle, 50);
            // refuel successful
        }
        catch (FuelNotFoundException $e) {
            print($e->getMessage());
            // rollback / terminate / write to logs 1
        }
        catch (FuelNameNotSetException $e) {
            print($e->getMessage());
            // rollback / terminate / write to logs 2
        }
        catch (\Exception $e) {
            print($e->getMessage());
            // other action
        }
    }
}

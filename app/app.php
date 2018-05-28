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
use Vehicle\Car;
use Vehicle\Truck;
use Vehicle\Boat;
use Vehicle\Helicopter;
use Fuel\Petrol\Petrol;
use Fuel\Diesel\Diesel;
use Fuel\Kerosene\Kerosene;
use FuelStation\FuelStation;
use Vehicle\VehicleAbstract;

class app
{
    private $vehicles = [];

    public function run()
    {
        $this->loadVehicles();
        $this->useVehicles();
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

    private function useVehicles()
    {
        foreach($this->vehicles as $vehicle) {
            if ($vehicle instanceof Car) {
                $vehicle->move();
                $vehicle->musicOn();
            } elseif ($vehicle instanceof Boat) {
                print_r(get_class($vehicle));
                print_r(Boat::class);
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

            $this->refuelVehicle($vehicle);
        }
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

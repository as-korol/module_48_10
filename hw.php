<?php

interface ToysSpecifications
{
    public function drive(int $speed): int;

    public function specialAbility(): void;

    public function honk(): void;

    public function turnSignals(): void;
}

abstract class Toys implements ToysSpecifications
{
    public function drive(int $speed): int
    {
        echo 'Текущая скорость: ' . $speed . ' км/ч. '.PHP_EOL;
        return $speed;
    }

    public function honk(): void
    {
        echo 'Машина сигналит. ' . PHP_EOL;
    }

    public function turnSignals(): void
    {
        echo 'Дворники включены. ' . PHP_EOL;
    }
}

class Car extends Toys
{
    private $interior;

    public function __construct($interior)
    {
        $this->interior = $interior;
    }

    public function specialAbility(): void
    {
        echo 'Включена закись азота. ' . PHP_EOL;
    }

    public function vievSalon(): void
    {
        echo 'Отделка салона: ' . $this->interior . PHP_EOL;
    }
}

class Tank extends Toys
{
    public function specialAbility(): void
    {
        echo 'Стреляет из орудия' . PHP_EOL;
    }
}

class Bulldozer extends Toys
{
    public function specialAbility(): void
    {
        echo 'Управление ковшом. ' . PHP_EOL;
    }
}

function startPlay(Toys $toy, int $speed): void
{
    $toy->drive($speed);
    $toy->specialAbility();
    $toy->honk();
    $toy->turnSignals();

    if ($toy instanceof Car) {
        $toy->vievSalon();
    }
}

$car = new Car('Салон из кожи');
startPlay($car, 60);


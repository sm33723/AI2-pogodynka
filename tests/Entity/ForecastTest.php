<?php

namespace App\Tests\Entity;

use App\Entity\Forecast;
use PHPUnit\Framework\TestCase;

class ForecastTest extends TestCase
{

    public function dataGetFahrenheit(): array
    {
        return [
            [0   , 32   ],
            [-100, -148 ],
            [100 , 212  ],
            [-100.0,-148.0],

            [-89.47368421052632,-129.05263157894737],
            [-68.42105263157895,-91.15789473684211],
            [-47.368421052631575,-53.263157894736835],
            [-26.315789473684205,-15.368421052631575],
            [-5.263157894736835,22.526315789473696],
            [15.789473684210535,60.42105263157896],
            [36.84210526315792,98.31578947368425],
            [57.89473684210526,136.21052631578945],
            [78.94736842105266,174.1052631578948],
        ];
    }
    /**
     * @dataProvider dataGetFahrenheit
     */
    public function testGetFahrenheit($celsius, $expectedFahrenheit): void
    {
        $forecast = new Forecast();

        $forecast->setTemperature($celsius);
        $this->assertTrue(
            $forecast->getFahrenheit() - $expectedFahrenheit < 1E-7
        );
    }
}

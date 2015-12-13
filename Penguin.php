<?php
/**
 * User: Denis Koshechkin
 * Date: 12.12.2015
 * Time: 19:28
 */

namespace Birds;

use \Location;

class Penguin implements \bird
{
    public $kind;

    private $location;

    private $melody;

    private $alive;

    public function __construct()
    {
        $this->location = new Location();
        $this->alive = true;
    }

    function setKind(string $type)
    {
        $this->kind = $type;
    }

    function getKind()
    {
        return $this->kind;
    }

    function getLocation()
    {
        return $this->location;
    }

    function setLocation(Location $location)
    {
        $this->location = $location;
    }

    function flyTo(Location $location)
    {
        //Нужно дописать
    }

    function setMelody(string $melody)
    {
        $this->melody = $melody;
    }

    function singMelody()
    {
        echo $this->melody;
    }

    function killBird()
    {
        $this->alive = false;
        $this->location->setZ(0); //mwahahaha
    }

    function cloneBird(int $count)
    {
        $birds = [];

        for ($i = 0; $i < $count; $i++) {
            $birds[] = clone $this;
        }

        return $birds;
    }
}
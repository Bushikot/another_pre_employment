<?php

/**
 * User: Denis Koshechkin
 * Date: 12.12.2015
 * Time: 19:44
 */
class Location
{
    private $x;

    private $y;

    private $z;

    public function getX()
    {
        return $this->x;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function getZ()
    {
        return $this->z;
    }

    public function setZ($z)
    {
        $this->z = $z;
    }

    public function getLocation()
    {
        return [$this->x, $this->y, $this->z];
    }

}
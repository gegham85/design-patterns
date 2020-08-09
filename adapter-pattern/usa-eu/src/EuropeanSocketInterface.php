<?php namespace Acme;

interface EuropeanSocketInterface
{
    public function voltage();
    public function live();
    public function neutral();
    public function earth();
}

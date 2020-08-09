<?php namespace Acme;

interface USASocketInterface
{
    public function voltage();
    public function live();
    public function neutral();
}

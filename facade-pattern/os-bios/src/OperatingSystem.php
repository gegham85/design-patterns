<?php namespace Acme;

interface OperatingSystem
{
    public function halt();

    public function getName(): string;
}

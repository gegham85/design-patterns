<?php

// ------------------------------------------------------------
// The Implementation Interface
interface Device
{
    public function powerOn();
    public function powerOff();
    public function setChannel(int $channel);
    public function getStatus(): string;
}

// ------------------------------------------------------------
// Concrete Implementations
class Tv implements Device
{
    private bool $isOn = false;
    private int $channel = 1;

    public function powerOn()
    {
        $this->isOn = true;
    }

    public function powerOff()
    {
        $this->isOn = false;
    }

    public function setChannel(int $channel)
    {
        $this->channel = $channel;
    }

    public function getStatus(): string
    {
        return "TV is " . ($this->isOn ? "on" : "off") . ", on channel " . $this->channel;
    }
}

class Radio implements Device
{
    private bool $isOn = false;
    private float $station = 87.5;

    public function powerOn()
    {
        $this->isOn = true;
    }

    public function powerOff()
    {
        $this->isOn = false;
    }

    public function setChannel(int $station)
    {
        // For a radio, a channel change means changing the station
        $this->station = (float)$station;
    }

    public function getStatus(): string
    {
        return "Radio is " . ($this->isOn ? "on" : "off") . ", tuned to " . $this->station . " MHz";
    }
}

// ------------------------------------------------------------
// The Abstraction
abstract class Remote
{
    protected Device $device;

    public function __construct(Device $device)
    {
        $this->device = $device;
    }

    public function togglePower()
    {
        if ($this->device->getStatus() === "off") {
            $this->device->powerOn();
        } else {
            $this->device->powerOff();
        }
    }

    public function setChannel(int $channel)
    {
        $this->device->setChannel($channel);
    }
}

// ------------------------------------------------------------
// Refined Abstraction
class AdvancedRemote extends Remote
{
    public function __construct(Device $device)
    {
        parent::__construct($device);
    }

    public function mute()
    {
        echo "Muting device.\n";
        $this->device->powerOff(); // A simple mute implementation
    }
}

// ------------------------------------------------------------
// Usage
$tv = new Tv();
$basicRemote = new Remote($tv);

$basicRemote->togglePower(); // Turns the TV on
$basicRemote->setChannel(15);
echo $tv->getStatus() . "\n";
// Output: TV is on, on channel 15

$radio = new Radio();
$advancedRemote = new AdvancedRemote($radio);

$advancedRemote->togglePower(); // Turns the radio on
$advancedRemote->setChannel(98.1);
echo $radio->getStatus() . "\n";
// Output: Radio is on, tuned to 98.1 MHz
$advancedRemote->mute(); // Mutes the radio
echo $radio->getStatus() . "\n";
// Output: Radio is off, tuned to 98.1 MHz
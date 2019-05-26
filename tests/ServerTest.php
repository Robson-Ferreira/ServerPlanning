<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use ServerPlanning\Server;

class ServerTest extends TestCase
{

    public function testSetCpu(): void
    {
    	$server = new Server(2, 32, 100);
    	$server->setCpu(5);

        $this->assertEquals(
            5,
            $server->getCpu()
        );
    }

    public function testSetRam(): void
    {
    	$server = new Server(2, 32, 100);
    	$server->setRam(64);

        $this->assertEquals(
            64,
            $server->getRam()
        );
    }

    public function testSetHdd(): void
    {
    	$server = new Server(2, 32, 100);
    	$server->setHdd(500);

        $this->assertEquals(
            500,
            $server->getHdd()
        );
    }

    public function testCannotSetCpuNotNumberValue(): void
    {
        $this->expectException(Throwable::class);

        $server = new VirtualMachine(2, 32, 100);
    	$server->setCpu('32');
    }

    public function testCannotSetRamNotNumberValue(): void
    {
        $this->expectException(Throwable::class);

        $server = new VirtualMachine(2, 32, 100);
    	$server->setRam('100');
    }

    public function testCannotSetHddNotNumberValue(): void
    {
        $this->expectException(Throwable::class);

        $server = new VirtualMachine(2, 32, 100);
    	$server->setHdd('40');
    }

    public function testRamIsNumber(): void
    {
    	$server = new Server(2, 32, 100);
    	$server->setRam(2);

        $this->assertIsInt($server->getRam());
    }

    public function testCpuIsNumber(): void
    {
    	$server = new Server(2, 32, 100);
    	$server->setCpu(50);

        $this->assertIsInt($server->getCpu());
    }

    public function testHddIsNumber(): void
    {
    	$server = new Server(2, 32, 100);
    	$server->setHdd(500);

        $this->assertIsInt($server->getHdd());
    }
}
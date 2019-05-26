<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use ServerPlanning\ServerPlanning;
use ServerPlanning\Server;
use ServerPlanning\VirtualMachine;

class ServerPlanningTest extends TestCase
{

    public function testCalculateServerExpect2(): void
    {
    	$server = new Server(2, 32, 100);
    	
    	$virtualMachines = [];

    	array_push($virtualMachines, new VirtualMachine(1, 16, 10));
    	array_push($virtualMachines, new VirtualMachine(1, 16, 10));
    	array_push($virtualMachines, new VirtualMachine(2, 32, 100));

    	$result = ServerPlanning::calculate($server, $virtualMachines);

        $this->assertEquals(
            2,
            $result
        );
    }

    public function testCalculateServerExpect3(): void
    {
    	$server = new Server(2, 32, 100);
    	
    	$virtualMachines = [];

    	array_push($virtualMachines, new VirtualMachine(1, 16, 10));
    	array_push($virtualMachines, new VirtualMachine(2, 32, 100));
    	array_push($virtualMachines, new VirtualMachine(1, 16, 10));    	

    	$result = ServerPlanning::calculate($server, $virtualMachines);

        $this->assertEquals(
            3,
            $result
        );
    }

    public function testCalculateServerExpect4(): void
    {
    	$server = new Server(4, 64, 500);
    	
    	$virtualMachines = [];

    	array_push($virtualMachines, new VirtualMachine(1, 16, 10));
    	array_push($virtualMachines, new VirtualMachine(1, 16, 10));
    	array_push($virtualMachines, new VirtualMachine(1, 16, 10));
    	array_push($virtualMachines, new VirtualMachine(1, 16, 10));
    	array_push($virtualMachines, new VirtualMachine(1, 16, 10));
    	array_push($virtualMachines, new VirtualMachine(2, 32, 100));
    	array_push($virtualMachines, new VirtualMachine(1, 16, 10));
    	array_push($virtualMachines, new VirtualMachine(3, 32, 150));
    	array_push($virtualMachines, new VirtualMachine(4, 64, 200));
    	
    	$result = ServerPlanning::calculate($server, $virtualMachines);

        $this->assertEquals(
            4,
            $result
        );
    }

    public function testCannotSetEmptyVirtualMachines()
    {
    	$this->expectException(Throwable::class);

        $server = new Server(2, 32, 100);
    	$result = ServerPlanning::calculate($server, []);
    }

    public function testVirtualMachineUnexpectedType()
    {
    	$this->expectException(Throwable::class);

        $server = new Server(2, 32, 100);
    	$result = ServerPlanning::calculate($server, ['wrong_data' => 1]);
    }

    public function testVirtualMachineUnexpectedType2()
    {
    	$this->expectException(Throwable::class);

        $server = new Server(2, 32, 100);
    	$virtualMachines = [];

    	array_push($virtualMachines, new VirtualMachine(1, 16, 10));
    	array_push($virtualMachines, new Server(1, 16, 10));
    	array_push($virtualMachines, new VirtualMachine(2, 32, 100));

    	$result = ServerPlanning::calculate($server, $virtualMachines);
    }
}
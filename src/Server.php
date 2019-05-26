<?php

declare(strict_types = 1);

namespace ServerPlanning;

/**
 * 
 */
class Server extends ServerResources
{
	/**
	 * Return true if the {$virtual_machine} can be allocated to current server or false if it cannot be allocated.
     * @param self $virtual_machine
     * @return bool
     */
	public function checkResources(VirtualMachine $virtual_machine): bool 
	{
		// Checking if the components of the virtual_machine (ram, cpu, and hdd), can be alocated to the currenty server.
		if ($virtual_machine->getCpu() <= $this->getCpu() && 
			$virtual_machine->getRam() <= $this->getRam() && 
			$virtual_machine->getHdd() <= $this->getHdd()) {
			return true;
		}
		return false;
	}

	/**
	 * The ramaining resources are the resources available on the server after the virtual machine is allocated.
     * @param self $server
     * @param VirtualMachine $virtual_machine
     * @return Server
     */
	public function calculateRamainingResources(VirtualMachine $virtual_machine): void 
	{
		$this->setCpu($this->getCpu() - $virtual_machine->getCpu());
		$this->setRam($this->getRam() - $virtual_machine->getRam());
		$this->setHdd($this->getHdd() - $virtual_machine->getHdd());
	}
}
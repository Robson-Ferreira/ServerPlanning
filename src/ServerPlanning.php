<?php

declare(strict_types = 1);

namespace ServerPlanning;

/**
 * class ServerPlanning
 * This class, has one method called "calculate", it return the number of servers that is required, 
 * to host a non-empty collection of virtual machines.
 */
class ServerPlanning 
{
	/**
	 * Return the number of servers that is required, to host a non-empty collection of virtual machines.
     * @param ServerPlanning\Server $server
     * @param array $virtualMachines
     * @return int
     * @throws Exception
     */
	public static function calculate(Server $server_type, array $virtualMachines): int
	{
		// checking if virtualMachines array is not empty
		if (empty($virtualMachines)) throw new \InvalidArgumentException('Virtual Machines are empty.');

		$currentServer = clone $server_type;
		$server_count = 0;
		
		foreach ($virtualMachines as $key => $machine) {
			// checking typeof machine
			if (!($machine instanceof VirtualMachine)) {
				throw new \InvalidArgumentException('Virtual Machine is not instance of Virtual Machine.');
			}
			// checking resources on the current server
			if ($currentServer->checkResources($machine)) {
			   /*  If the current server resources are sufficient to allocate the 
				*  virtual machine, the remaining resources must be calculated.
				*/
				$currentServer->calculateRamainingResources($machine);
				// if the server_count is bigger then 0, it means that it already has a server allocated. 
				$server_count = ($server_count > 0) ? $server_count : ++$server_count;
			} else {
			   /*  If the current server resources are insufficient to allocate the virtual
				*  machine, we must check if a new server has sufficient resources
				*/
				$newServer = clone $server_type;
			   
				if ($newServer->checkResources($machine)) {
				   /*  If the new server resources are sufficient to allocate the virtual machine, 
					*  it becomes the current server and the remaining resources must be calculated.
					*/
					$newServer->calculateRamainingResources($machine);
					$currentServer = $newServer;
					$server_count++;
				}
			}
		}

		return $server_count;
	}
}

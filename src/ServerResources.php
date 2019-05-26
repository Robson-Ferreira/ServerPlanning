<?php 

declare(strict_types = 1);

namespace ServerPlanning;

/**
 * Class server
 */
abstract class ServerResources
{
	/**
     * The power of cpu
     *
     * Potential values are any int number.
     *
     * @var int
     */
	private $cpu;

	/**
     * The power of ram
     *
     * Potential values are any int number.
     *
     * @var int
     */
	private $ram;

	/**
     * The power of hdd
     *
     * Potential values are any int number.
     *
     * @var int
     */
	private $hdd;
	
	/**
	 * constructor of the class
	 * @param int $cpu
	 * @param int $ram
	 * @param int $hdd
     * @return void
     */
	function __construct(int $cpu, int $ram, int $hdd)
	{
		$this->cpu = $cpu;
		$this->ram = $ram;
		$this->hdd = $hdd;
	}

	/**
	 * Return the cpu value
     * @return int
     */
	public function getCpu(): int 
	{
		return $this->cpu;
	}

	/**
	 * Set cpu value
     * @param int $cpu
     * @return void
     */
	public function setCpu(int $cpu): void 
	{
		$this->cpu = $cpu;
	}

	/**
	 * Return the ram value
     * @return int
     */
	public function getRam(): int
	{
		return $this->ram;
	}

	/**
	 * Set ram value
     * @param int $ram
     * @return void
     */
	public function setRam(int $ram): void 
	{
		$this->ram = $ram;
	}

	/**
	 * Return the hdd value
     * @return int
     */
	public function getHdd(): int 
	{
		return $this->hdd;
	}

	/**
	 * Set hdd value
     * @param int $hdd
     * @return void
     */
	public function setHdd(int $hdd): void
	{
		$this->hdd = $hdd;
	}
}
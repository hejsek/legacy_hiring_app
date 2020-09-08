<?php
namespace LegacyApp\Structures;

use Dibi\Row;

/**
 * @author Jakub Heyduk
 */

class User extends Row
{

	private int $id;
	private string $name;


	/**
	 * User constructor.
	 * @param $id
	 * @param $name
	 */
	public function __construct($id, $name)
	{
		$this->id = $id;
		$this->name = $name;
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}


	/**
	 * @param int $id
	 */
	public function setId(int $id): void
	{
		$this->id = $id;
	}


	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}


	/**
	 * @param string $name
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}
}
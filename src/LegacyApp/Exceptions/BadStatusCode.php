<?php
namespace LegacyApp\Exceptions;
use Throwable;

/**
 * @author Jakub Heyduk
 */
class BadStatusCode extends \Exception
{
	public function __construct($message = "", $code = 0, Throwable $previous = NULL)
	{
		parent::__construct($message, $code, $previous);
	}
}
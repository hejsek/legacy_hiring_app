<?php
namespace LegacyApp;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use LegacyApp\Exceptions\BadStatusCode;
use LegacyApp\Structures\User;

/**
 * @author Jakub Heyduk
 */
class Request
{

	/**
	 * @var Client
	 */
	private Client $http;


	/**
	 * Request constructor.
	 */
	public function __construct()
	{
		$this->http = new Client();
	}


	/**
	 * @param User $user
	 * @return \Psr\Http\Message\ResponseInterface
	 * @throws BadStatusCode
	 * @throws GuzzleException
	 */
	public function getSomething(User $user) {
		$params = [
			'query' => [
				'userId' => $user->getId(),
				'name' => $user->getName()
			]
		];

		$res = $this->http->request("GET", "http://localhost/legacy_hiring_app/api/dosomething.php", $params);

		if($res->getStatusCode() != 200) {
			throw new BadStatusCode("Bad status code");
		}

		return $res;
	}
}
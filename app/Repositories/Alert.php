<?php

namespace App\Repositories;

use App\Keyword;
use App\Repositories\Articles;
use App\Repositories\PusherInit;

/**
* 
*/
class Alert
{
	protected $client;
	protected $pusher;
	
	function __construct($client)
	{
		$this->client = $client;
	}

	public function index()
	{
		$keywords = Keyword::all();

		foreach ($keywords as $keyword) {
			$resultset = (new Articles($this->client))->search($keyword->name);
			if ($resultset->getNumFound() > $keyword->articles)
			{
				$keyword->articles = $resultset->getNumFound();
				$keyword->save();
				$this->pusher = (new PusherInit())->init();
			}
		}
	}
}
<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

/**
* 
*/
class Articles
{
	protected $client;
	
	function __construct($client)
	{
		$this->client = $client;
	}


	public function init()
	{
		$user = Auth::user();

    	$querySearched = "";

    	if ($user->role === 'admin')
    		$querySearched = '"*:* ';
    	else
			foreach($user->keywords as $keyword){
				$querySearched .= '"'.$keyword->name.'" ';
			}
			
		$thequery = "";
		$Textfields = ['Title', 'Fulltext'];

		foreach ($Textfields as $value) {
		  $thequery .= $value.":(".$querySearched.") ";
		}

		// get a select query instance
		$query = $this->client->createSelect();

		$query->setFields(['id','Title', 'Fulltext','document', 'Source', 'SourceDate','Author']);


		// get the dismax component and set a boost query
		$edismax = $query->getEDisMax();
		$query->createFilterQuery('filterkeywords')->setQuery($thequery);


		// get the facetset component
		$facetSet = $query->getFacetSet();
		$facetSet->createFacetField('language')->setField('ArticleLanguage');
		$facetSet->createFacetField('author')->setField('Author');
		$facetSet->createFacetField('source')->setField('Source');
		$facetSet->setMinCount(1);

		// Get highlighting component, and apply settings
		$hl = $query->getHighlighting();
		$hl->setSnippets(5);
		$hl->setFields(array('Title', 'Fulltext'));

		$hl->setSimplePrefix('<strong>');
		$hl->setSimplePostfix('</strong>');

		return $query;

	}


	/**
	 * @param Illuminate\Http\Request $request
	 * @return array $resultset
	*/
	public function index()
	{
		$query = Articles::init();

		// this executes the query and returns the result
		return $resultset = $this->client->select($query);
	}

	/**
	 * 
	 * @return array $resultset
	*/
	public function search($request)
	{
		$query = Articles::init();
		$helper = $query->getHelper();

		$thequery = "";

		$Textfields = ['Title', 'Fulltext'];

		foreach ($Textfields as $value) {
		  $thequery .= $value.":(".$request.") ";
		}
		$query->setQuery($thequery);

		//new code
		if ($request === 'language') {
			$thequery1 = 'ArticleLanguage:"'.$request->language.'"';
			$query->createFilterQuery('language')->setQuery($thequery1);

		}

		// this executes the query and returns the result
		return $resultset = $this->client->select($query);
	}

	public function show($request)
	{
		$query = Articles::init();
		$helper = $query->getHelper();

		$thequery = 'id:"'.$request.'"';
		$query->setQuery($thequery);

		// this executes the query and returns the result
		return $resultset = $this->client->select($query);	
	}

}
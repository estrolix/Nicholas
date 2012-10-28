<?php

exit('123');

class Harvester {
    
    const SEARCH_DEEP = 3;

    protected $walkedUrls = array();
    protected $harvest = array();
    protected $errors = array();
    protected $searchStr = null;
    
    public function __construct($urlsList, $searchStr)
    {
        $this->searchStr = $searchStr;

        foreach($urlsList as $url) {
            $found = $this->findHarvest($url);
            if($found)
                $this->harvest = array_merge($this->harvest, $found);
                
        }
    }

    public function getResults()
    {
        return $this->harvest;
    }
    
    protected function findHarvest($url)
    {
        $htmlcode = @file($url);
        if(!$htmlcode) {
            $this->errors[] = 'Unable to open url ' . $url;
            return false;
        }

        $this->walkedUrls[$url] = true;

        $matches = array();

        preg_match_all('|<p>(.*\b' . $this->searchStr . '\b.*)<\/p>|', $htmlcode, $matches);

        return (!empty($matches[1] ? $matches[1] : null);
    }
    
    protected function findLinks($url)
    {
        
    }
   
}

/*
$text = 'srsegegesgsegseg
terrorism alse se terror 
sdgsdgsdg wet terrorism

dfgdfg <p>1 dfgdfgdfgd terrorism <dgdfg> </p> dfgfdg

dfgdfgdfg


dfgdfg <p>2 terrorism <dgdfg> <p></p>  </p> dfgfdg

segseges';

$matches = array();
preg_match_all('|<p>(.*\bterrorism\b.*)<\/p>|', $text, $matches);

print_r($matches);
*/

exit();

$urls = array('http://america24.com', 'http://macapla.com');
$searchTerm = 'Emergono';

$harvester = new Harvester($urls, $searchTerm);
$results = $harvester->getResults();

if($results) {
    echo '<ul>';
    foreach($results as $result) {
        echo '<li>' . $result . '</li>';
    }
    echo '</ul>';
} else {
    echo 'Nothing found.';
}
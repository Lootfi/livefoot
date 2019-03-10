<?php

/**
 * This service class encapsulates football-data.org's RESTful API.
 *
 * @author Daniel Freitag <daniel@football-data.org>
 * @date 04.11.2015 | switched to v2 09.08.2018
 * 
 */
class FBData {
    public $config;
    public $baseUri; /* check config.ini for this*/
    public $reqPrefs = array();
    public $reqPrefs2 = array();    
    public function __construct() {
        $this->config = parse_ini_file('config.ini', true);

	// some lame hint for the impatient
	if($this->config['authToken'] == 'YOUR_AUTH_TOKEN' || !isset($this->config['authToken'])) {
		exit('Get your API-Key first and edit config.ini');
	}
        
        $this->baseUri = $this->config['baseUri']; 
        
        $this->reqPrefs['http']['method'] = 'GET';
        $this->reqPrefs['http']['header'] = 'X-Auth-Token: ' . $this->config['authToken'];

        // $this->reqPrefs2['http']['method'] = 'GET';
        $this->reqPrefs2['http']['header'] = 'X-RapidAPI-Key: ' .  "deedfb1ebfmshe986db2f5bb0edep1502abjsn79e6f4d8f5e0";
    }
    
    /**
     * Function returns a particular competition identified by an id.
     * 
     * @param Integer $id
     * @return array
     */        
    public function findCompetitionById($id) {
        $resource = 'competitions/' . $id;
        $response = file_get_contents($this->baseUri . $resource, false, 
                                      stream_context_create($this->reqPrefs));
        
        return json_decode($response);
    }

    public function getData(){
        $response = file_get_contents('https://heisenbug-champions-league-live-scores-v1.p.rapidapi.com/api/championsleague/table?group=H'
        ,false,stream_context_create($this->reqPrefs2));
        // return json_decode($response);
    }
    
    /**
     * Function returns all available matches for a given date range.
     * 
     * @param DateString 'Y-m-d' $start
     * @param DateString 'Y-m-d' $end
     * 
     * @return array of matches
     */    
    public function findMatchesForDateRange($start, $end) {
        $resource = 'matches/?dateFrom=' . $start . '&dateTo=' . $end;

        $response = file_get_contents($this->baseUri . $resource, false, 
                                      stream_context_create($this->reqPrefs));
        
        return json_decode($response);
    }
    
    public function findMatchesByCompetitionAndMatchday($c, $m) {
        $resource = 'competitions/' . $c . '/matches/?matchday=' . $m;

        $response = file_get_contents($this->baseUri . $resource, false, 
                                      stream_context_create($this->reqPrefs));
        
        return json_decode($response);
    }

    public function findStandingsByCompetition($id) {
	$resource = 'competitions/' . $id . '/standings';
        $response = file_get_contents($this->baseUri . $resource, false, 
                                      stream_context_create($this->reqPrefs));

        // return json_decode($response); //without json pretty syntax
        return json_decode($response,JSON_PRETTY_PRINT);
    }

    
    public function findHomeMatchesByTeam($teamId) {
        $resource = 'teams/' . $teamId . '/matches/?venue=HOME';
        //http://api.football-data.org/v2/teams/62/matches?venue=home

        $response = file_get_contents($this->baseUri . $resource, false, 
                                      stream_context_create($this->reqPrefs));
        
        return json_decode($response)->matches;
    }
    
    /**
     * Function returns one unique match identified by a given id.
     * 
     * @param int $id
     * @return stdObject fixture
     */
    public function findMatchById($id) {
        $resource = 'matches/' . $id;
        $response = file_get_contents($this->baseUri . $resource, false, 
                                      stream_context_create($this->reqPrefs));
        
        return json_decode($response);
    }
    
    /**
     * Function returns one unique team identified by a given id.
     * 
     * @param int $id
     * @return stdObject team
     */    
    public function findTeamById($id) {
        $resource = 'teams/' . $id;
        $response = file_get_contents($this->baseUri . $resource, false, 
                                      stream_context_create($this->reqPrefs));
        
        return json_decode($response);
    }
    
    /**
     * Function returns all teams matching a given keyword.
     * 
     * @param string $keyword
     * @return list of team objects
     */    
    public function searchTeam($keyword) {
        $resource = 'teams/?name=' . $keyword;
        $response = file_get_contents($this->baseUri . $resource, false, 
                                      stream_context_create($this->reqPrefs));
        
        return json_decode($response);
    }

    public function getCLmatches(){
        $resource = 'competitions/CL/matches';
        $response = file_get_contents($this->baseUri . $resource, false,
                                       stream_context_create($this->reqPrefs));
        return json_decode($response);
                                    }

    public function getCLteams(){
        $resource = 'competitions/CL/teams';
        $response = file_get_contents($this->baseUri . $resource, false,
                                       stream_context_create($this->reqPrefs));
        return json_decode($response);
                                    }


}

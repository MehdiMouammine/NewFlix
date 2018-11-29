<?php
class Season implements JsonSerializable{
	private $IdSe;
	private $Episodes=array();
	private $Year;

	public function __construct($idse, $year){
		$this->IdSe = $idse;
		$this->Year = $year;
	}

	public function jsonSerialize(){
      	return ['IdSe' => $this->IdSe,'Year' => $this->Year,'Episodes' => $this->Episodes];
    }

	public function getIdSe(){
		return $this->IdSe;
	}
	public function getYear(){
		return $this->Year;
	}
	public function getNbEpisodes(){
		return count($this->Episodes);
	}
	public function getEpisode($num){
		return $this->Episodes[$num - 1];
	}
	public function getEpisodes(){
		return $this->Episodes;
	}

	public function setEpisodes($Episode){
	 	array_push($this->Episodes,$Episode);
	}
	public function setEpisode($Episode){
	 	$this->Episodes=$Episode;
	}
	public function setIdSe($IdSe){
		$this->IdSe=$IdSe;
	}
	public function setYear($Year){
		$this->Year=$Year;
	}

}
?>
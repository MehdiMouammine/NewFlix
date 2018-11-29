<?php
class Serie implements JsonSerializable{
	private $IdSr;
	private $Title;
	private $Synopsis;
	private $Icon;
	private $Background;
	private $Seasons=array();
	private $Period;

	public function jsonSerialize(){
      	return ['IdSr' => $this->IdSr,'Title' => $this->Title,'Period' => $this->Period,'Synopsis' => $this->Synopsis,'Icon' => $this->Icon,'Background' => $this->Background,'Seasons' => $this->Seasons];
    }

	public function getIdSr(){
		return $this->IdSr;
	}
	public function getSynopsis(){
		return $this->Synopsis;
	}
	public function getPeriod(){
		return $this->Period;
	}
	public function getTitle(){
		return $this->Title;
	}
	public function getIcon(){
		return $this->Icon;
	}
	public function getBackground(){
		return $this->Background;
	}
	public function getNbSeasons(){
		return count($this->Seasons);
	}
	public function getSeasons(){
		return $this->Seasons;
	}
	public function getSeason($num){
		return $this->Seasons[$num - 1];
	}

	public function setSeasons($Season){
	 	array_push($this->Seasons,$Season);
	}
	public function setTitle($Title){
		$this->Title=$Title;
	}
	public function setIcon($Icon){
		$this->Icon=$Icon;
	}
	public function setBackground($Background){
		$this->Background=$Background;
	}
	public function setIdSr($IdSr){
		$this->IdSr=$IdSr;
	}
	public function setSynopsis($Synopsis){
		$this->Synopsis=$Synopsis;
	}
	public function setPeriod($Period){
		$this->Period=$Period;
	}

}
?>
<?php
class Movie implements JsonSerializable{
	private $IdMv;
	private $Title;
	private $Synopsis;
	private $Icon;
	private $Background;
	private $Duration;
	private $Year;
	private $Link;

	public function jsonSerialize(){
      	return ['IdMv' => $this->IdMv,'Title' => $this->Title,'Year' => $this->Year,'Synopsis' => $this->Synopsis,'Icon' => $this->Icon,'Background' => $this->Background, 'Link' => $this->Link,'Duration' => $this->Duration];
    }

	public function getIdMv(){
		return $this->IdMv;
	}
	public function getSynopsis(){
		return $this->Synopsis;
	}
	public function getYear(){
		return $this->Year;
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
	public function getDuration(){
		return $this->Duration;
	}
	public function getLink(){
		return $this->Link;
	}

	public function setDuration($Duration){
	 	$this->Duration=$Duration;
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
	public function setIdMv($IdMv){
		$this->IdMv=$IdMv;
	}
	public function setSynopsis($Synopsis){
		$this->Synopsis=$Synopsis;
	}
	public function setYear($Year){
		$this->Year=$Year;
	}
	public function setLink($Link){
		$this->Link=$Link;
	}

}
?>
<?php
class Episode implements JsonSerializable{
	private $IdEp;
	private $Link;

	public function __construct($idep, $link){
		$this->IdEp = $idep;
		$this->Link = $link;
	}

	public function jsonSerialize(){
      	return ['IdEp' => $this->IdEp,'Link' => $this->Link];
    }
	public function getIdEp(){
		return $this->IdEp;
	}
	public function getLink(){
		return $this->Link;
	}

	public function setIdEp($IdEp){
		$this->IdEp=$IdEp;
	}
	public function setLink($Link){
		$this->Link=$Link;
	}

}
?>
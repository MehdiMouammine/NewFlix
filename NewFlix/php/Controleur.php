<?php
require 'connbd.php';
require 'Season.php';
require 'Movie.php';
require 'Episode.php';
require 'Serie.php';

class Controleur {
		
		private $con;

		public function __construct($pdo) {
			
			$this->con = $pdo;
		}
		public function getCon() {
			
			return $this->con;
			
		}
		function getSeries() {
			$a = $this->getCon()->query('select * from Serie');
			$a->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Serie');
			$result = $a->fetchAll();
			foreach ($result as $serie) {
				$b=$this->getSeasons($serie->getIdSr());
				foreach ($b as $season) {
					$serie->setSeasons($season);
				}
				$serie->setIcon("../img/series/icon/".$serie->getIdSr().".jpg");
				$serie->setBackground("../img/series/background/".$serie->getIdSr().".jpg");
			}
			return $result;			
		}
		function getLastAdded() {
			$a = $this->getCon()->query('select * from Serie Order by IdSr DESC Limit 5');
			$a->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Serie');
			$result = $a->fetchAll();
			foreach ($result as $serie) {
				$b=$this->getSeasons($serie->getIdSr());
				foreach ($b as $season) {
					$serie->setSeasons($season);
				}
				$serie->setIcon("../img/series/icon/".$serie->getIdSr().".jpg");
				$serie->setBackground("../img/series/background/".$serie->getIdSr().".jpg");
			}
			return $result;			
		}
		function getMostWatched() {
			$a = $this->getCon()->query('select * from Serie Order by Count DESC Limit 5');
			$a->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Serie');
			$result = $a->fetchAll();
			foreach ($result as $serie) {
				$b=$this->getSeasons($serie->getIdSr());
				foreach ($b as $season) {
					$serie->setSeasons($season);
				}
				$serie->setIcon("../img/series/icon/".$serie->getIdSr().".jpg");
				$serie->setBackground("../img/series/background/".$serie->getIdSr().".jpg");
			}
			return $result;			
		}
		function getSearch($found) {
			$a = $this->getCon()->query('select * from Serie WHERE Title Like "%'.$found.'%" Limit 5');
			$a->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Serie');
			$result = $a->fetchAll();
			foreach ($result as $serie) {
				$b=$this->getSeasons($serie->getIdSr());
				foreach ($b as $season) {
					$serie->setSeasons($season);
				}
				$serie->setIcon("../img/series/icon/".$serie->getIdSr().".jpg");
				$serie->setBackground("../img/series/background/".$serie->getIdSr().".jpg");
			}
			return $result;			
		}
		function getRandom() {
			$a = $this->getCon()->query('SELECT * FROM Serie ORDER BY RAND() LIMIT 5');
			$a->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Serie');
			$result = $a->fetchAll();
			foreach ($result as $serie) {
				$b=$this->getSeasons($serie->getIdSr());
				foreach ($b as $season) {
					$serie->setSeasons($season);
				}
				$serie->setIcon("../img/series/icon/".$serie->getIdSr().".jpg");
				$serie->setBackground("../img/series/background/".$serie->getIdSr().".jpg");
			}
			return $result;			
		}
		function getSerie($idsr) {
			$a = $this->getCon()->prepare('select * from Serie WHERE IdSr = ?');
			$a->execute(array($idsr));
			$a->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Serie');
			$result2= null;
			$result = $a->fetchAll();
			foreach ($result as $serie) {
				$b=$this->getSeasons($serie->getIdSr());
				foreach ($b as $season) {
					$serie->setSeasons($season);
				}
				$serie->setIcon("../img/series/icon/".$serie->getIdSr().".jpg");
				$serie->setBackground("../img/series/background/".$serie->getIdSr().".jpg");
				$result2 = $serie;
			}
			return $result2;			
		}
		function getSeasons($idse) {	
			$json = file_get_contents("../json/series/".$idse.".json");
			$arr = json_decode($json, true);
			$seasons= array();
			foreach((array) $arr as $value){
				$se = new Season(null, null);
        			foreach ($value as $key2=>$value2) {
        				if(is_array($value2)){
            				foreach ($value2 as $arr3) {
            					$ep = new Episode(null,null);
        						foreach($arr3 as $key3=>$value3){
            						if ($key3 == "IdEp") {
            				 			$ep->setIdEp($value3);
            						}		
            						if ($key3 == "Link") {
            				 			$ep->setLink($value3);
            						}  
           						}
           						$se->setEpisodes($ep);
        					} 
        				} 
        				if ($key2 == "IdSe") {
        					$se->setIdSe($value2);
        				}
        				if ($key2 == "Year") {
        					$se->setYear($value2);
        				}
    				}
    			array_push($seasons,$se);
    		}
    	return $seasons;			
		}
		function newSerie($title, $synopsis, $period){
			$query = $this->getCon()->prepare("INSERT INTO Serie (Title, Synopsis, Period) VALUES (?, ?, ?)");
			$query->execute(array($title, $synopsis, $period));
			$a = $this->getCon()->query('select Max(IdSr) from Serie');
			$d = $a->fetch();
			$fp = fopen("../json/series/".$d['Max(IdSr)'].".json", 'w');
			fclose($fp);
		}
		function newSeason($year,$idse,$idsr){
			$a=$this->getSeasons($idsr);
			$s = new Season($idse,$year);
			array_push($a,$s);
			$json = json_encode($a);
			$fp = fopen("../json/series/".$idsr.".json", 'w');
			fwrite($fp, $json);
			fclose($fp);
		}
		function newEpisode($idep,$link,$idsr,$idse){
			$a=$this->getSeasons($idsr);
			$s=$a[$idse - 1];
			$n=new Episode($idep,$link);
			$s->setEpisodes($n);
			$json = json_encode($a);
			$fp = fopen("../json/series/".$idsr.".json", 'w');
			fwrite($fp, $json);
			fclose($fp);
		}
		function editEpisode($idep,$link,$idsr,$idse,$nidep){
			$a=$this->getSeasons($idsr);
			$s=$a[$idse - 1];
			$e=$s->getEpisodes();
			$n=$e[$idep - 1];
			$n->setLink($link);
			$n->setIdEp($nidep);
			$e[$idep - 1]=$n;
			$s->setEpisode($e);
			$a[$idse - 1]=$s;
			$json = json_encode($a);
			$fp = fopen("../json/series/".$idsr.".json", 'w');
			fwrite($fp, $json);
			fclose($fp);
		}
		function editSeason($year,$idse,$idsr,$nidse){
			$a=$this->getSeasons($idsr);
			$s=$a[$idse - 1];
			$s->setYear($year);
			$s->setIdSe($nidse);
			$a[$idse - 1]=$s;
			$json = json_encode($a);
			$fp = fopen("../json/series/".$idsr.".json", 'w');
			fwrite($fp, $json);
			fclose($fp);
		}
		function editSerie($idsr,$title, $synopsis, $period){
			$query = $this->getCon()->prepare("UPDATE Serie SET Title = ? , Synopsis = ? , Period = ? WHERE IdSr = ?");
			$query->execute(array($title, $synopsis, $period,$idsr));
		}
		function deleteSerie($idsr){
			$query = $this->getCon()->prepare("DELETE FROM Serie WHERE IdSr = ?");
			$query->execute(array($idsr));
			unlink('../json/series/'.$idsr.'.json');
			unlink('../img/series/background/'.$idsr.'.jpg');
			unlink('../img/series/icon/'.$idsr.'.jpg');
		}
		function deleteEpisode($idep,$idsr,$idse){
			$a=$this->getSeasons($idsr);
			$s=$a[$idse - 1];
			$e=$s->getEpisodes();
			array_splice($e, ($idep-1), 1);
			$s->setEpisode($e);
			$a[$idse - 1]=$s;
			$json = json_encode($a);
			$fp = fopen("../json/series/".$idsr.".json", 'w');
			fwrite($fp, $json);
			fclose($fp);
		}
		function deleteSeason($idse,$idsr){
			$a=$this->getSeasons($idsr);
			array_splice($a, ($idse-1), 1);
			$json = json_encode($a);
			$fp = fopen("../json/series/".$idsr.".json", 'w');
			fwrite($fp, $json);
			fclose($fp);
		}
		function getMLastAdded() {
			$a = $this->getCon()->query('select * from Movie Order by IdMv DESC Limit 5');
			$a->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Movie');
			$result = $a->fetchAll();
			foreach ($result as $serie) {
				$serie->setIcon("../img/movies/icon/".$serie->getIdMv().".jpg");
				$serie->setBackground("../img/movies/background/".$serie->getIdMv().".jpg");
			}
			return $result;			
		}
		function getMMostWatched() {
			$a = $this->getCon()->query('select * from Movie Order by Count DESC Limit 5');
			$a->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Movie');
			$result = $a->fetchAll();
			foreach ($result as $serie) {
				$serie->setIcon("../img/movies/icon/".$serie->getIdMv().".jpg");
				$serie->setBackground("../img/movies/background/".$serie->getIdMv().".jpg");
			}
			return $result;			
		}
		function getMSearch($found) {
			$a = $this->getCon()->query('select * from Movie WHERE Title Like "%'.$found.'%" Limit 5');
			$a->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Movie');
			$result = $a->fetchAll();
			foreach ($result as $serie) {
				$serie->setIcon("../img/movies/icon/".$serie->getIdMv().".jpg");
				$serie->setBackground("../img/movies/background/".$serie->getIdMv().".jpg");
			}
			return $result;			
		}
		function getMRandom() {
			$a = $this->getCon()->query('SELECT * FROM Movie ORDER BY RAND() LIMIT 5');
			$a->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Movie');
			$result = $a->fetchAll();
			foreach ($result as $serie) {
				$serie->setIcon("../img/movies/icon/".$serie->getIdMv().".jpg");
				$serie->setBackground("../img/movies/background/".$serie->getIdMv().".jpg");
			}
			return $result;			
		}
		function getMovie($idmv) {
			$a = $this->getCon()->prepare('select * from Movie WHERE IdMv = ?');
			$a->execute(array($idmv));
			$a->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Movie');
			$result2= null;
			$result = $a->fetchAll();
			foreach ($result as $serie) {
				$serie->setIcon("../img/movies/icon/".$serie->getIdMv().".jpg");
				$serie->setBackground("../img/movies/background/".$serie->getIdMv().".jpg");
				$result2 = $serie;
			}
			return $result2;			
		}
		function newMovie($title, $synopsis, $year, $duration, $link){
			$query = $this->getCon()->prepare("INSERT INTO Movie (Title, Synopsis, Year, Duration, Link) VALUES (?, ?, ?, ?, ?)");
			$query->execute(array($title, $synopsis, $year, $duration, $link));
		}
		function editMovie($idmv,$title, $synopsis, $year, $duration, $link){
			$query = $this->getCon()->prepare("UPDATE Movie SET Title = ? , Synopsis = ? , Year = ? , Duration = ? , Link = ? WHERE IdMv = ?");
			$query->execute(array($title, $synopsis, $year, $duration, $link, $idmv));
		}
		function deleteMovie($idmv){
			$query = $this->getCon()->prepare("DELETE FROM Movie WHERE IdMv = ?");
			$query->execute(array($idmv));
			unlink('../img/movies/background/'.$idmv.'.jpg');
			unlink('../img/movies/icon/'.$idmv.'.jpg');
		}
}
?>
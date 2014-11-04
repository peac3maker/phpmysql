<?php  
class Mensch extends Lebewesen {

	protected static $vorfahre = "Adam";

	private $name;
	private $geschlecht;

	public function __construct() {
		$this->name = "Luca Selinger";
		$this->geschlecht = "Männlich";
		if ($this->alter == -1) {
			$this->alter = 26;
		} else {
			$this->altern();
		}
	}
	
	public function __destruct() {
		echo '<p>'.$this->getName().' ist gestorben</p>';
	}

	public function altern() {
		$this->alter++;
	}

	public function geburtstagFeiern() {
		$this->altern();
		echo $this->getName().' hat Geburtstag gefeiert und ist nun '.$this->getAlter().' Jahre alt';
	}

	public function umbenennen($name) {
		$this->name = $name;
	}

	public function neueEvolutionstheorie($vorfahre) {
		self::$vorfahre = $vorfahre;
	}

	public function getName() {
		return $this->name;
	}

	public function getVorfahre() {
		return self::$vorfahre;
	}
}
?>
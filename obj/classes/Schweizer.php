<?php  
class Schweizer extends Mensch {

	public function umbenennen($name) {
		$this->behoerdengang();
	}

	public function behoerdengang() {	
		throw new Exception('Sorry, mag nicht mehr warten');
	}
}
?>
<?php  
abstract class Lebewesen {  
	
	protected $alter = -1;
	
	abstract public function altern();
	
	public function getAlter() {
		return $this->alter;
	}
}
?>
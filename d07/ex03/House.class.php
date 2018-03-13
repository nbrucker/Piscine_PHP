<?php
abstract class House
{
	abstract public function getHouseName();
	abstract public function getHouseSeat();
	abstract public function getHouseMotto();
	public function introduce()
	{
		echo "House ";
		echo $this->getHouseName();
		echo " of ";
		echo $this->getHouseSeat();
		echo " : \"";
		echo $this->getHouseMotto();
		echo "\"".PHP_EOL;
	}
}
?>
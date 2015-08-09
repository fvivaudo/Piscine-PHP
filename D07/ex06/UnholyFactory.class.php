<?php
class UnholyFactory
{
	static protected $nb_soldier = 0;
	static protected $nb_archer = 0;
	static protected $nb_assassin = 0;
	static protected $fabricate = 0;

	public function absorb($rhs)
	{
		if (get_class($rhs) == "Footsoldier")
		{
			if (!self::$nb_soldier)
			{
				echo "(Factory absorbed a fighter of type foot soldier)" . PHP_EOL;
				self::$nb_soldier++;
			}
			else
			{
				echo "(Factory already absorbed a fighter of type foot soldier)" . PHP_EOL;
			}
			return;
		}
		if (get_class($rhs) == "Archer")
		{
			if (!self::$nb_archer)
			{
				echo "(Factory absorbed a fighter of type archer)" . PHP_EOL;
				self::$nb_archer++;
			}
			else
				echo "(Factory already absorbed a fighter of type archer)" . PHP_EOL;
			return;
		}
		if (get_class($rhs) == "Assassin")
		{
			if (!self::$nb_assassin)
			{
				echo "(Factory absorbed a fighter of type assassin)" . PHP_EOL;
				self::$nb_assassin++;
			}
			else
				echo "(Factory already absorbed a fighter of type foot soldier)" . PHP_EOL;
			return;
		}
		else
		{
			echo "(Factory can't absorb this, it's not a fighter)" . PHP_EOL;
		}
	}
	public function fabricate($rhs)
	{


			if ($rhs == "foot soldier")
			{
				echo "(Factory fabricates a fighter of type foot soldier)" . PHP_EOL;
				return new Footsoldier;
			}
			if ($rhs == "archer")
			{
				echo "(Factory fabricates a fighter of type archer)" . PHP_EOL;
				return new Archer;
			}
			if ($rhs == "assassin")
			{
				echo "(Factory fabricates a fighter of type assassin)" . PHP_EOL;
				return new Assassin;
			}
			if ($rhs == "llama")
			{
				echo "(Factory hasn't absorbed any fighter of type llama)" . PHP_EOL;
			}
	}
}
?>
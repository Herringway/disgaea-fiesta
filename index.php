<?php
require_once 'vendor/autoload.php';
if (!isset($_GET['trand']))
	srand(ip2long($_SERVER['REMOTE_ADDR']) + isset($_GET['random']) + isset($_GET['advanced']) + isset($_GET['natural']));

$jobs = ['Archer', 'Brawler (Female)', 'Brawler (Male)', 'Dark Knight', 'Dragon', 'EDF Soldier', 'Faery', 'Galactic Demon', 'Gargoyle', 'Golem', 'Great Wyrm', 'Healer (Female)', 'Healer (Male)', 'Kit Cat', 'Lantern', 'Mage', 'Manticore', 'Nether Noble', 'Nosferatu', 'Prinny', 'Serpent', 'Shadow', 'Skull', 'Spirit', 'Succubus', 'Treant', 'Undead', 'Warrior (Female)', 'Warrior (Male)', 'Winged'];
$unlockablejobs = ['Majin' => false, 'Angel' => false, 'Scout' => false, 'Samurai' => false, 'Ninja' => false, 'Knight' => false, 'Thief' => false];
$selectedjobs = [];

function unlockJob($job) {
	global $jobs;
	global $unlockablejobs;
	if (!$unlockablejobs[$job]) {
		$jobs[] = $job;
		$unlockablejobs[$job] = true;
	}
}

for ($i = 0; $i < 10; $i++) {
	$j = array_rand($jobs);
	$selectedjobs[$i] = $jobs[$j];
	unset($jobs[$j]);
	if (in_array('Warrior (Male)', $selectedjobs) && in_array('Brawler (Male)', $selectedjobs) && in_array('Ninja', $selectedjobs) && in_array('Thief', $selectedjobs) && in_array('Scout', $selectedjobs)) {
		unlockJob('Majin');
	}
	if (in_array('Healer (Female)', $selectedjobs) && in_array('Knight', $selectedjobs) && in_array('Archer', $selectedjobs)) {
		unlockJob('Angel');
	}
	if (in_array('Warrior (Female)', $selectedjobs) && in_array('Brawler (Female)', $selectedjobs)) {
		unlockJob('Samurai');
	}
	if (in_array('Warrior (Male)', $selectedjobs) && in_array('Brawler (Male)', $selectedjobs)) {
		unlockJob('Ninja');
	}
	if (in_array('Warrior (Female)', $selectedjobs) && in_array('Mage', $selectedjobs)) {
		unlockJob('Knight');
	}
	if (in_array('Warrior (Female)', $selectedjobs) || in_array('Warrior (Male)', $selectedjobs) || in_array('Brawler (Female)', $selectedjobs) || in_array('Brawler (Male)', $selectedjobs)) {
		unlockJob('Thief');
	}
	if ((in_array('Warrior (Female)', $selectedjobs) || in_array('Warrior (Male)', $selectedjobs)) && (in_array('Brawler (Female)', $selectedjobs) || in_array('Brawler (Male)', $selectedjobs))) {
		unlockJob('Scout');
	}
}

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('.');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('fiesta.tpl');
$template->display(['jobs' => $selectedjobs]);
?>

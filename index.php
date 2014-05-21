<?php
require_once 'classes/Autoloader.php';
header('Content-Type: text/html;charset=utf-8');

Autoloader::register();

$template = new \Template\PredefinedTemplate('test123', 1, 'Lorem ipsum', 'Litwo! Ojczyzno moja! Ty jesteś {{{jaka}}}. Nazywał się małą wieś, a wzdycha do głębi. jeszcze przez okienic szpar i narody giną. Więc Tadeusz Telimenie, Asesor Krajczance a zając jak on rodaków zbiera na Francuza. oj, ten zaszczyt należy. Idąc kłaniał się Soplica. wszyscy słuchali w las, a więc ja w tylu panów groni mają od ciemnej zieleni topoli, co pod strażą. Dziś piękność widziana więc choć stary i stryjaszkiem jedno pozostał puste miejsce jest obrazów wspaniałych zarysem. czytał więc choć zawsze i długie zwijały się nie było widać. Zwrócona na modnisiów, a pani ta prędka, zmieszana rozmowa w pół godziny tak myślili starzy. A zatem. tu pan Sędzia, z brylantów oprawa a wszystko przepasane, jakby czyjegoś przyjścia był legijonistą przynosił kości stare na piersiach, przydawając zasłony sukience. Włos w kraty. Pas taki można wydrukować wszystkie zacnie zrodzone, każda kobiéta chłopcowi każda młoda, ładna. Tadeusz przyglądał się lata wleką w modzie był ruchawy od płaczu! On rzekł: Mój pies faworytny Żeby nie było. bo tak myślili starzy. A choć młodzież czekają. Pójdziemy, jeśli zechcesz, i nie dozwalał, by on zająca.');
?>

<!DOCTYPE html>
<html>
	<head>
		<style>
			html, body {
				font: 11pt Tahoma, sans-serif;
			}
		</style>
	</head>
	<body>
		<h1><?php echo $template->getName() ?></h1>
		<p><?php echo $template->render(array('jaka' => 'z placeholdera')) ?></p>
	</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

include 'header.php';

?>
<h1>PHP Basics</h1>
<h2>Workshop 1 : variables, strings</h2>
<h3>Variables</h3>
<?php
// PHP_EOL (End Of Line) fait un retour à la ligne
echo 'Hello fellowship' . PHP_EOL;

// déclaration + initialisation (1ere affectation) de variable
$ringBearer = 'Frodo';
$ringCreator = 'Sauron';

$fellowshipNumber = 9;
$isRingOnFinger = true;

echo $ringBearer . PHP_EOL;

// re-affectation
$ringBearer = 'Bilbo';
echo $ringBearer . PHP_EOL;

echo $fellowshipNumber + 1 . PHP_EOL;
echo $fellowshipNumber . PHP_EOL;

// autre façon de faire $fellowshipNumber += 1;
// autre façon de faire $fellowshipNumber = $fellowshipNumber + 1;
$fellowshipNumber++;
echo $fellowshipNumber . PHP_EOL;

// initialisation avec une chaîne vide
$middleEarth = '';
echo $middleEarth . PHP_EOL;
?>
<h3>STRINGS</h3>
<?php
// différence entre simple et double boucle
echo 'Le porteur est ' . strtoupper($ringBearer) . PHP_EOL;
echo "Le porteur est $ringBearer" . PHP_EOL;

//$message = "L'anneau est porté par $ringBearer";
// l'antislash est le caractère d'échappement
$message = 'L\'anneau est porté par ' . $ringBearer;
echo $message . PHP_EOL;

//$message = $message . ' et ' . $ringCreator . ' le recherche' . PHP_EOL;
$message .= ' et ' . $ringCreator . ' le recherche' . PHP_EOL;

echo $message;

// fonction strtoupper pour passer une chaîne en majuscules
echo strtoupper($ringCreator) . PHP_EOL;
$ringCreator = strtoupper($ringCreator);
echo $ringCreator . PHP_EOL;
$message .= ' et ' . $ringCreator . ' le recherche' . PHP_EOL;

echo $message;
$wizard = 'Gandalf';
// un include/require est l'équivalent d'un copier/coller du fichier inclus.
// Ici $wizard est donc utilisable dans 'wizard.php' car déclarée avant le require
require 'wizard.php';
?>


<h2>Workshop 2 : boucles, conditions, tableaux</h2>

<h3>For</h3>
<?php
// boucles simples
for ($i = 0; $i <= 9; $i++) {
    echo $i;
}
?>
<br/>
<?php
for ($i = 0; $i <= 10; $i++) {
    echo $i;
}
?><br/>
<?php
for ($i = 1; $i <= 10; $i++) {
    echo $i;
}
?>
<br/>
<?php
// décrémentation possible, attention à la condition de sortie (>= et non plus <=)
for ($i = 10; $i >= 0; $i--) {
    echo $i;
}
?>
<br/>
<?php
// l'incrément peut être différent de 1, mais bien penser à réaffecter une valeur à $i
for ($i = 25; $i <= 50; $i += 5) { // $i = $i+5;
    echo $i;
}
?>
<br/>
<?php
for ($i = 10; $i >= -10; $i -= 3) { // $i = $i-3;
    echo $i;
}
?>

<h3>Conditions</h3>
<?php
$name = 'Luke';

// && = and, || = or, la condition prend un test en paramètre.
// Ce test renvoie uniquement true OU false
// si le test est true, on rentre dans le if uniquement
if ($name === 'Darth Vader' || $name === 'Darth Sidious') {
    echo 'Sith';
    $name = 'Yoda';
} elseif ($name === 'Yoda') { // si le if est false on teste les autres blocs elseif
    echo 'Jedi';
} else { // si aucun autre bloc est true, on exécute le code du "else"
    echo "sans doute une personne sans pouvoir";
}
?>

<h3>Tableaux indexés numériquement</h3>
<?php
$jedis = [
    0  => 'Obi-Wan Kenobi',
    2  => 'Yoda',
    5  => 'Luke Skywalker',
    3  => 'Windu',
    18 => 'Qui-gon Jinn',
];
// ajout d'un élément au tableau. La clé sera l'indice max actuel + 1
$jedis[] = 'Rey';
// on écrase la valeur actuelle de l'indice 2
$jedis[2] = 'Toto';

var_dump($jedis);
// sort tri le tableau directement (on dit "par référence")
// on ne doit pas enregistrer le résultat dans une autre variable
sort($jedis);

var_dump($jedis);
echo $jedis[0];

// pour écrire de l'HTML, on ferme et on ouvre les balises php à chaque fois.
// on écrit toujours le PHP à l'intérieur du HTML et non le contraire
// donc jamais d'echo d'une balise HTML
foreach ($jedis as $jedi) {
    echo $jedi;
?>
    <br>
<?php
}
?>

<h3>tableau associatif</h3>

<?php
$characters = [
    'Yoda'           => 900,
    'Leia'           => 19,
    'Luke Skywalker' => 19,
    'Darth Vader'    => 46,
    'Chewbacca'      => 200,
];

$characters['Han Solo'] = 29;
// asort tri un tableau associatif par sa valeur
// ksort tri un tableau associatif par sa clé
// sort tri un tableau indéxé numériquement par sa valeur => attention, les clés
// sont alors remise à zéro et la correspondant clé/valeur n'est PAS conservée
asort($characters);
var_dump($characters);
?>
<ul>
    <?php foreach ($characters as $name => $age) { ?>
        <li><?php echo $name . ':' . $age ?></li>
    <?php } ?>
</ul>

<ul>
    <?php
    // ouverture et fermeture des balises PHP à chaque fois que nécessaire
    // attention à ne pas oublier le echo !
    foreach ($characters as $name => $age) {
        if ($age >= 100) {
            ?>
            <li><?php echo $name . ':' . $age ?></li>
            <?php
        }
    } ?>
</ul>

<h3>Tableaux multidimensionnels</h3>
<?php
$characters = [
    'Jedi'   => ['Luke Skywalker', 'Yoda', 'Windu'],
    'Sith'   => ['Darth Vader', 'Darth Maul', 'Dooku'],
    'Gungan' => ['Jar Jar Binks'],
    'Human'  => ['Han Solo', 'Leia'],
];

// boucles imbriquées pour parcourir un tableau à plusieurs dimensions
// la premiere boucle parcours le tableau $characters.
// Pour chaque ligne, on récupère la clé $category et la valeur associée $names, qui est
// elle même de type array (d'où le nommage au pluriel car contient plusieurs noms)
foreach ($characters as $category => $names) {
    // on affiche la catagory et le nombre de personnages associés
    ?>
<h2><?php echo $category . ' ('. count($names) .')'; ?></h2>
<ul>
    <?php
    // on est toujours sur la première ligne du tableau $characters, mais on parcours
    // cette fois le tableau $names de cette 1ere ligne
    foreach ($names as $name) { ?>
        <li><?php echo $name; ?></li>
    <?php }
    // sortie de la seconde boucle, on fini la 1ere boucle en fermant le <ul>
    ?>
</ul>
<?php } // fin de la première boucle, on travaille sur la ligne suivante jusqu'à la fin du tableau
?>


<?php
// include n'est pas bloquant si footer.php n'existe pas. Require lui est bloquant.
include 'footer.php';
?>

</body>
</html>


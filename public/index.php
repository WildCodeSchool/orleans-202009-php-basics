<?php

require "../src/functions.php";
echo sayHello('John'); //=> return ;
?>
<br/>
<?php

$message = 'Hello watchmen and ' . sayHello('bob');

echo $message;
?>
<br/>
<?php

$firstname = 'Bilbo';
$lastname = 'Baggins';
//echo sayHello('Bilbo', 'Baggins');

echo sayHello($lastname, $firstname);
echo $lastname;

$watchmen = ['Dr. Manhattan', 'Ozymandias', 'Silk Spectre', 'Rorschach', 'The comedian', 'Nite Owl'];

echo whoAmI('bilbo', $watchmen);
echo whoAmI('Ozymandias', $watchmen);
echo whoAmI('Nite Owl', $watchmen);

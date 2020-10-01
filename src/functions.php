<?php


function sayHello(string $lastname, string $firstname = 'Dr. Manhattan'): string
{
    $lastname = 'Mr. ' . $lastname;
    return "Hello " . $firstname . ' ' . $lastname;
}

function whoAmI(string $name, array $watchmen): ?string
{
//    $message = ' est un intrus';
//
//    foreach ($watchmen as $watchman) {
//        if ($watchman === $name) {
//            $message = ' est un watchmen';
//        }
//    }
    if(in_array($name, $watchmen)) {
        $message = $name.' est un watchmen';
    } else {
        $message = ' est un intrus';
    }

    return $name.$message;
}

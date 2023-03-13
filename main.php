<?php

require_once "Character.php";
require_once "Word.php";

$characters = json_decode(
    file_get_contents("characters.json"),
    true
);
$character = new Character();
$character->setCharacters($characters['characters']);
$character->setConsonants($characters['consonants']);
$character->setVowls($characters['vowls']);

$word = new Word();
$words = $word->generateWords(
    $character,
    $argv[1] ?? 10,
    $argv[2] ?? 6,
    $argv[3] ?? 6
);
print_r($words);

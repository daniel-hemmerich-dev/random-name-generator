<?php

require_once "Character.php";


class Word
{
    /**
     * @param character $character
     * @param int $min
     * @param int $max
     * @return string
     */
    protected function generateWord(
        character $character,
        int $min,
        int $max
    ): string
    {
        $word = "";
        $length = rand(
            $min,
            $max
        );

        $state = "EMPTY";
        $index = 0;
        do
        {
            switch ($state) {
                case "CONSONANT_X1": {
                    $random = $character->randomCharacter();
                    if($word[$index-1] === $random) break;
                    $word .= $random;
                    $state = ($character->isConsonant($word[$index]) ? "CONSONANT_X2" : "VOWL_X1");
                    $index++;
                    break;
                }
                case "CONSONANT_X2": {
                    $word .= $character->randomVowl();
                    $state = "VOWL_X1";
                    $index++;
                    break;
                }
                case "VOWL_X1": {
                    $random = $character->randomCharacter();
                    if($word[$index-1] === $random) break;
                    $word .= $random;
                    $state = ($character->isConsonant($word[$index]) ? "CONSONANT_X1" : "VOWL_X2");
                    $index++;
                    break;
                }
                case "VOWL_X2": {
                    $word .= $character->randomConsonant();
                    $state = "CONSONANT_X1";
                    $index++;
                    break;
                }
                default: {
                    $word .= $character->randomCharacter();
                    $state = ($character->isConsonant($word[$index]) ? "CONSONANT_X1" : "VOWL_X1");
                    $index++;
                }
            }
        } while($index<$length);

        return $word;
    }

    /**
     * @param character $character
     * @param int $count
     * @param int $min
     * @param int $max
     * @return array
     */
    public function generateWords(
        character $character,
        int $count,
        int $min,
        int $max
    ): array
    {
        $words = [];

        for($index=0; $index<$count; $index++) {
            $word = $this->generateWord(
                $character,
                $min,
                $max
            );
            $words[] = $word;
        }

        return $words;
    }
}
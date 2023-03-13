<?php


class Character
{
    /** @var array  */
    protected array $_characters = [];

    /** @var array  */
    protected array $_consonants = [];

    /** @var array  */
    protected array $_vowls = [];

    /**
     * @return array
     */
    public function getCharacters(): array
    {
        return $this->_characters;
    }

    /**
     * @param array $characters
     */
    public function setCharacters(array $characters): void
    {
        $this->_characters = $characters;
    }

    /**
     * @return array
     */
    public function getConsonants(): array
    {
        return $this->_consonants;
    }

    /**
     * @param array $consonants
     */
    public function setConsonants(array $consonants): void
    {
        $this->_consonants = $consonants;
    }

    /**
     * @return array
     */
    public function getVowls(): array
    {
        return $this->_vowls;
    }

    /**
     * @param array $vowls
     */
    public function setVowls(array $vowls): void
    {
        $this->_vowls = $vowls;
    }


    /**
     * @param string $consonant
     * @return bool
     */
    public function isConsonant(string $consonant): bool
    {
        return in_array(
            $consonant,
            $this->getConsonants()
        );
    }


    /**
     * @param string $vowl
     * @return bool
     */
    public function isVowl(string $vowl): bool
    {
        return in_array(
            $vowl,
            $this->getVowls()
        );
    }


    /**
     * @return mixed
     */
    public function randomCharacter(): mixed
    {
        $randomIndex = rand(
            0,
            count($this->getCharacters()) - 1
        );
        return $this->_characters[$randomIndex];
    }

    /**
     * @return mixed
     */
    public function randomConsonant(): mixed
    {
        $randomIndex = rand(
            0,
            count($this->getConsonants()) - 1
        );
        return $this->_consonants[$randomIndex];
    }

    /**
     * @return mixed
     */
    public function randomVowl(): mixed
    {
        $randomIndex = rand(
            0,
            count($this->getVowls()) - 1
        );
        return $this->_vowls[$randomIndex];
    }
}
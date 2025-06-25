<?php

class Race extends BaseMethods
{

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    private $_id_race;

    public function id_race()
    {
        return $this->_id_race;
    }

    public function setId_race($value)
    {
        $this->_id_race = $this->integer($value);
    }

    private $_category;

    public function category()
    {
        return $this->_category;
    }

    public function setCategory($value)
    {
        $this->_category = $this->string($value);
    }

    private $_race_date;

    public function race_date()
    {
        return $this->_race_date;
    }

    public function setRace_date($value)
    {
        $this->_race_date = $this->date_timestamp($value);
    }

    private $_race_hour;

    public function race_hour()
    {
        return $this->_race_hour;
    }

    public function setRace_hour($value)
    {
        $this->_race_hour = $this->string($value);
    }

    private $_title;

    public function title()
    {
        return $this->_title;
    }

    public function setTitle($value)
    {
        $this->_title = $this->string($value);
    }

    private $_program;

    public function program()
    {
        return $this->_program;
    }

    public function setProgram($value)
    {
        $this->_program = $this->string($value);
    }

    // ***** Récupérer la date au format français (ex: Dimanche 22 Octobre 2025 au lieu de 20-10-2025)

    public function date_fr($format = "short") {
        
        if($format == "short") {
            $pattern = "dd MMM yyyy";
        } else {
            $pattern = "eeee dd MMMM yyyy";
        }

        $formatter = new \IntlDateFormatter(
            'fr_FR',
            \IntlDateFormatter::FULL,
            \IntlDateFormatter::NONE,
            'Europe/Paris',
            \IntlDateFormatter::GREGORIAN,
            $pattern
        );
        
        $date = $formatter->format(strtotime($this->_race_date));
        // Met en capitale uniquement la première lettre de la chaîne
        return ucfirst($date);
    }

    // ***** Vérifier si la date est passée ou future

    public function is_past() {
        $now = time();
        
        if(strtotime($this->race_date()) < $now) {
            return 'past';
        }
    }

}

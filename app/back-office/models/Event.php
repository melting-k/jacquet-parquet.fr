<?php

class Event extends BaseMethods
{

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    private $_id_event;

    public function id_event()
    {
        return $this->_id_event;
    }

    public function setId_event($value)
    {
        $this->_id_event = $this->integer($value);
    }

    private $_slug;

    public function slug()
    {
        return $this->_slug;
    }

    public function setSlug($value)
    {
        $this->_slug = $this->string($value);
    }

    private $_date_event;

    public function date_event()
    {
        return $this->_date_event;
    }

    public function setDate_event($value)
    {
        $this->_date_event = $this->date_timestamp($value);
    }

    private $_hour_event;

    public function hour_event()
    {
        return $this->_hour_event;
    }

    public function setHour_event($value)
    {
        $this->_hour_event = $this->string($value);
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

    private $_description;

    public function description()
    {
        return $this->_description;
    }

    public function setDescription($value)
    {
        $this->_description = $this->string($value);
    }

    private $_cover;

    public function cover()
    {
        return $this->_cover;
    }

    public function setCover($value)
    {
        $this->_cover = $this->string($value);
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
        
        $date = $formatter->format(strtotime($this->date_event()));
        // Met en capitale uniquement la première lettre de la chaîne
        return ucfirst($date);
    }

    // ***** Vérifier si la date est passée ou future

    public function is_past() {
        $now = time();
        
        if(strtotime($this->date_event()) < $now) {
            return 'past';
        }
    }
}

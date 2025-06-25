<?php

class Images extends BaseMethods
{

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    private $_id_images;

    public function id_images()
    {
        return $this->_id_images;
    }

    public function setId_images($value)
    {
        $this->_id_images = $this->integer($value);
    }

    private $_icons;

    public function icons()
    {
        return $this->_icons;
    }

    public function setIcons($value)
    {
        $this->_icons = $this->array_or_string($value);
    }

    private $_open_graph;

    public function open_graph()
    {
        return $this->_open_graph;
    }

    public function setOpen_graph($value)
    {
        $this->_open_graph = $this->string($value);
    }

    private $_favicon;

    public function favicon()
    {
        return $this->_favicon;
    }

    public function setFavicon($value)
    {
        $this->_favicon = $this->string($value);
    }

    private $_logo_main;

    public function logo_main()
    {
        return $this->_logo_main;
    }

    public function setLogo_main($value)
    {
        $this->_logo_main = $this->string($value);
    }

    private $_logo_alt;

    public function logo_alt()
    {
        return $this->_logo_alt;
    }

    public function setLogo_alt($value)
    {
        $this->_logo_alt = $this->string($value);
    }

}

<?php

namespace App\Entities;

class SettingEntity
{
    private $id;
    private $title;
    private $keywords;
    private $description;
    private $author;
    private $logo;
    private $footer;

    public function __construct($array)
    {
        $this->id = $array['id'];
        $this->title = $array['title'];
        $this->keywords = $array['keywords'];
        $this->description = $array['description'];
        $this->author = $array['author'];
        $this->logo = $array['logo'];
        $this->footer = $array['footer'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function getFooter()
    {
        return $this->footer;
    }

}
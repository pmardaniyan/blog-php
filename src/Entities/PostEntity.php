<?php

namespace App\Entities;

class PostEntity
{
    private $id;
    private $title;
    private $content;
    private $date;
    private $category;
    private $image;
    private $view;

    public function __construct($array)
    {
        $this->id = $array['id'];
        $this->title = $array['title'];
        $this->content = $array['content'];
        $this->date = $array['date'];
        $this->category = $array['category'];
        $this->image = $array['image'];
        $this->view = $array['view'];
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'date' => $this->date,
            'category' => $this->category,
            'image' => $this->image,
            'view' => $this->view
        ];
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getExcerpt($count = 200)
    {
        return substr($this->content, 0 , $count) . '...';
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getTimestamp()
    {
        return strtotime($this->date);
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    public function getView()
    {
        return $this->view;
    }

}
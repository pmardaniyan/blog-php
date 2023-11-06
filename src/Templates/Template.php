<?php

namespace App\Templates;

use App\Classes\Request;
use App\Models\Setting;

abstract class Template
{
    protected $title;
    protected $setting;
    protected $request;

    public function __construct()
    {
        $this->request = new Request();

        $settingModel = new Setting();
        $this->setting = $settingModel->getFirstData();
    }

    protected function getHead()
    {
        ?>
        <head>
            <meta charset="UTF-8">
            <meta name="description" content="<?= $this->setting->getDescription() ?>">
            <meta name="keyword" content="<?= $this->setting->getKeywords() ?>">
            <meta name="author" content="<?= $this->setting->getAuthor() ?>">

            <title><?= $this->title ?></title>
            <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
        </head>
        <?php
    }

    protected function getHeader()
    {
        ?>
        <header>
            <h1><?= $this->setting->getTitle() ?></h1>
            <div id="logo">
                <img src="<?= asset($this->setting->getLogo()) ?>" alt="<?= $this->setting->getTitle() ?>">
            </div>
        </header>
        <?php
    }

    protected function getFooter()
    {
        ?> 
        <footer>
            <p>
                <?= $this->setting->getFooter() ?>
            </p>
        </footer>
        <?php
    }

    protected function getSidebar($topPosts, $lastPosts)
    {  
        ?>
        <aside>
            <?php if(count($topPosts)) : ?>
                <div class="aside-box">
                    <h2>Top Posts</h2>
                    <ul>
                        <?php foreach($topPosts as $item) : ?>
                            <li><a href="#"><?= $item->getTitle() ?> <small>(<?= $item->getView() ?>)</small></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
            
            <?php if(count($lastPosts)) : ?>
                <div class="aside-box">
                    <h2>Last Posts</h2>
                    <ul>
                        <?php foreach($lastPosts as $item) : ?>
                            <li><a href="#"><?= $item->getTitle() ?> <small>(<?= $item->getDate() ?>)</small></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
        </aside>
        <?php
    }

    protected function getNavbar()
    {
        ?>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
            <form action="index.php" method="GET">
                <input type="text" name="word" placeholder="Search your word" value="<?= $this->request->has('word')? $this->request->word : '' ?>">
                <input type="submit" value="Search">
            </form>
        </nav>
        <?php
    }

    abstract public function renderPage();
}
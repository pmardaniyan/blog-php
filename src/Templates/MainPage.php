<?php

namespace App\Templates;

use App\Models\Post;

class MainPage extends Template
{
    private $topPosts;
    private $lastPosts;
    private $posts;

    public function __construct()
    {
        parent::__construct();
        $this->title = $this->setting->getTitle() . '-MainPage';

        $postModel = new Post();

        $this->topPosts = $postModel->sortData(function($first, $second) {
            return $first->getView() > $second->getView() ? -1 : 1;
        });

        $this->lastPosts = $postModel->sortData(function($first, $second) {
            return $first->getTimestamp() > $second->getTimestamp() ? -1 : 1;
        });

        $this->posts = $postModel->getAllData();
    }

    public function renderPage()
    {
        ?>
        <html lang="en">
            <?php $this->getHead() ?>
            <body>
                <main>
                    <?php $this->getHeader() ?>
                    <?php $this->getNavbar() ?>
                    <section id="content">
                        <?php $this->getSidebar($this->topPosts, $this->lastPosts) ?>
                        <?php if(count($this->posts)) : ?>
                            <div id="articles">
                                <?php foreach($this->posts as $post) : ?>
                                    <article>
                                        <div class="caption">
                                            <h3><?= $post->getTitle() ?></h3>
                                            <ul>
                                                <li>Date: <span><?= $post->getDate() ?></span></li>
                                                <li>Views: <span><?= $post->getView() ?> view</span></li>
                                            </ul>
                                            <p>
                                                <?= $post->getExcerpt() ?>
                                            </p>
                                            <a href="#">More...</a>
                                        </div>
                                        <div class="image">
                                            <img src="<?= asset($post->getImage()) ?>" alt="<?= $post->getTitle() ?>">
                                        </div>
                                        <div class="clearfix"></div>
                                    </article>
                                <?php endforeach ?>
                            </div>    
                        <?php endif ?>
                        <div class="clearfix"></div>
                    </section>
                    <?php $this->getFooter() ?>
                </main>
            </body>
        </html>
        <?php
    }
}
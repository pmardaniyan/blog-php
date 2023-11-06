<?php

require "./vendor/autoload.php";

use App\Classes\Request;
use App\Exceptions\DoesNotExistsException;
use App\Exceptions\NotFoundException;
use App\Templates\CategoryPage;
use App\Templates\MainPage;
use App\Templates\SearchPage;
use App\Templates\SinglePage;

try {
    $request = new Request();
    switch($request->get('action')) {
        case 'single' :
            $page = new SinglePage();
            break;
        case 'search' : 
            $page = new SearchPage();
            break;
        case 'category' :
            $page = new CategoryPage();
            break;
        case null :
            $page = new MainPage();
            break;
        default :
            throw new NotFoundException("page not found!");
    }
    $page->renderPage();
} catch(DoesNotExistsException | NotFoundException $exception) {
    echo $exception->getMessage();
} catch(Exception $exception) {
    echo $exception->getMessage();
}
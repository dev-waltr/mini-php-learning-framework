<?php

    namespace Application;

    use Application\Route;

    class Application
    {
        protected $route;

        public function __construct()
        {
            $this->route = new Route();
        }

        public function start()
        {
            $this->route->findRoute();

            echo 'hello world start';
        }
    }
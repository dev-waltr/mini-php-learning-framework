<?php

    namespace Application;

    use Application\Route;

    class Application
    {
        /**
         * @var \Application\Route
         */
        protected $route;

        public function __construct()
        {
            $this->route = new Route();
        }

        /**
         * @return void
         * @throws \Exception
         */
        public function start()
        {
            $controller = $this->route->findRoute();
            $this->isController($controller);

            $controller->action();
        }

        /**
         * @param $availableRoutes
         * @return void
         * @throws \Exception
         */
        protected function isController($availableRoutes): void
        {
            $availableInterfaces = class_implements($availableRoutes);

            if (!isset($availableInterfaces['Application\Controller\DefaultController'])) {
                throw new \Exception('Controller does not implement Application\Controller\DefaultController');
            }
        }
    }
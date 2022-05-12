<?php

    namespace Application\Controller;

    /**
     * @route /
     */
    class Fallback implements DefaultController
    {
        public function action()
        {
            return 'index.php';
        }
    }
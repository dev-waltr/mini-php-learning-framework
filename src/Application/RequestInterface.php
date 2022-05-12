<?php

    namespace Application;

    interface RequestInterface
    {
        public function getCookie();

        public function getRequest();
    }
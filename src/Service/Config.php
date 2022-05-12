<?php

    namespace Service;

    class Config
    {
        protected $config;

        public function __construct(array $configFile)
        {
            $this->config = json_decode(json_encode($configFile), false);
        }

        public function __get($name)
        {
            return isset($this->config->$name)?$this->config->$name:null;
        }
    }
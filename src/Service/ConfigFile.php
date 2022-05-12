<?php

    namespace Service;

    class ConfigFile
    {
        protected $configFileAsArr;

        public function __construct()
        {
            $this->configFileAsArr = parse_ini_file(__DIR__ . '/../../config.ini', true);
        }

        public function getConfigFileAsArr():array
        {
            return $this->configFileAsArr;
        }
    }
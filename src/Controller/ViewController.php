<?php

    namespace Application\Controller;

    abstract class ViewController implements DefaultController
    {
        /**
         * @var \Smarty
         */
        protected $smarty;

        /**
         * @var \Service\Config
         */

        protected $config;
        /**
         * @var \Service\ConfigFile
         */
        protected $configFile;

        public function __construct()
        {
            $this->smarty = new \Smarty();
            $this->configFile = new \Service\ConfigFile();
            $this->config = new \Service\Config($this->configFile->getConfigFileAsArr());

            $this->smarty->setTemplateDir(__DIR__ . '/../../templates/');
            $this->smarty->setCompileDir(__DIR__ . '/../../cache/templates_c/');
            $this->smarty->setConfigDir(__DIR__ . '/../../cache/smarty_configs/');
            $this->smarty->setCacheDir(__DIR__ . '/../../cache/smarty_cache/');
        }

        /**
         * @throws \Exception
         */
        private function setCurrentTemplatePath()
        {
            $classNameExploded = explode('\\',get_class($this));
            if (empty($classNameExploded)) {
                throw new \Exception('Wrong classname');
            }

        }

        final public function action()
        {
            $this->__action();
        }

        protected function __action()
        {
            
        }
    }
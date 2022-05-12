<?php

    namespace Service;

    class DbConnection
    {
        protected $pdoConnection;

        public function __construct(\Service\Config $config)
        {
            $this->pdoConnection = new \mysqli($config->db->host, $config->db->username, $config->db->password, $config->db->db);
        }

        /**
         * @return mixed
         */
        public function getPdoConnection()
        {
            return $this->pdoConnection;
        }
    }
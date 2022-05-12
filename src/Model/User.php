<?php

    namespace Model;

    class User
    {
        /**
         * @var \mysqli
         */
        protected $dbConnection;

        public function __construct(\mysqli $dbConnection)
        {
            $this->dbConnection = $dbConnection;
        }

        public function getUser($user)
        {
            $stmt = $this->dbConnection->prepare('SELECT * FROM User WHERE name = ?');
            $stmt->bind_param('s', $user);
            $stmt->execute();
            $result = $stmt->get_result();
            $resultAsObject = $result->fetch_object();
            return $resultAsObject;
        }
    }
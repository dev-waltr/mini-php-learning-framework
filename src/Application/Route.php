<?php
    namespace Application;

    class Route
    {
        protected $availableRoutes = [];

        static $CACHE_PATH = __DIR__ . '/../../cache/routerCache.json';

        public function findRoute() : void
        {
            $currentUri = $this->getCurrentUri();
            $availableRoutes = $this->getAvailableRoutes();
        }

        public function getCurrentUri() : string
        {
            return $currentUri = $_SERVER['REQUEST_URI'];
        }

        protected function getAvailableRoutes():array
        {
            $cachedRoutes = $this->getCachedRoutes();

            if (!empty($cachedRoutes)) {
                return $cachedRoutes;
            }
;
            $availableController = scandir(__DIR__ . '/../Controller');

            $routesToClasses = $this->findAllAvailableRoutes($availableController);

            return $this->cacheRoutes($routesToClasses);
        }

        protected function getCachedRoutes():?array
        {
            if (empty($this->availableRoutes)) {
                if (is_readable(self::$CACHE_PATH)) {
                    $handle = fopen(self::$CACHE_PATH, "r");
                    $this->availableRoutes = json_decode(fread($handle, filesize(self::$CACHE_PATH)));
                    fclose($handle);
                }
            }

            return $this->availableRoutes;
        }

        protected function cacheRoutes(array $routesToClasses):array
        {
            $routesClassesToJson = json_encode($routesToClasses);

            try {
                $fp = fopen(self::$CACHE_PATH, "w");
                fwrite($fp, $routesClassesToJson);
                fclose($fp);
            } catch (\Throwable $throwable) {

            }

            return $routesToClasses;
        }

        /**
         * @param $availableFiles
         * @param $matches
         * @return array
         * @throws \ReflectionException
         */
        protected function findAllAvailableRoutes($availableFiles): array
        {
            $routesToClasses = [];
            foreach ($availableFiles as $file) {
                if (preg_match('/[a-zA-Z]/', $file[0]) == true) {

                    $className = substr($file, 0, -4);
                    $path = 'Application\Controller\\'.$className;

                    $rc = new \ReflectionClass($path);

                    $pattern = "/@route .*/";

                    //perform the regular expression on the string provided
                    preg_match_all($pattern, $rc->getDocComment(), $matches, PREG_PATTERN_ORDER);

                    if (empty($matches) || empty($matches[0]) || empty($matches[0][0])) {
                        continue;
                    }

                    $routePath = explode(' ', $matches[0][0]);

                    $routesToClasses[] = [$routePath[1] => $path];
                }
            }

            return $routesToClasses;
        }


    }
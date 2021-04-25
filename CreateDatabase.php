<?php
   include_once('Mysqldump.php');
 
    class GenerateBackup
    {
        private $dbname = 'wofa_wofa_back';
        private $host = 'localhost';
        private $user = 'c2140416_qwe';
        private $pass = 'papi87NOpu';
        private $downloadRoute = './bkBD';
        private $fileName = 'backup.sql';
        private $uniqueFileName = true;
    
        function generateDump()
        {

            $finalRouteFile = $this->getFinalRouteFile($this->downloadRoute,  $this->fileName, $this->uniqueFileName);

            $dump = new Ifsnop\Mysqldump\Mysqldump(
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->user, 
                $this->pass, 
                []//['compress' => 'Gzip']
            );

            
            $dump->start( $finalRouteFile );
        }

        function getFinalRouteFile($downloadRoute, $fileName, $uniqueFileName)
        {

            $finalRouteFile = $downloadRoute . $fileName;

            if($uniqueFileName)
            {
                $aux_finalRoute = explode('.', $finalRouteFile);
                $last_index = count($aux_finalRoute )-1;
                $extension = $aux_finalRoute[$last_index];
                unset($aux_finalRoute[$last_index]);
                $aux_finalRoute = implode('.', $aux_finalRoute);
                $finalRouteFile = $aux_finalRoute . date("YmdHis") . '.' .$extension;
            }

            return $finalRouteFile;
        }
    }

    $generateBackup = new GenerateBackup();
    $generateBackup->generateDump();
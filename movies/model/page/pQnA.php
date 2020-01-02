<?php
    class pQnA{


        public function __construct(){
            
        }
        
        public function readData() {
            $content = "";
            $file = fopen("resource/QnA.txt", "r") or die("Unable to open file!");
            // Output one line until end-of-file
            while(!feof($file)) {
                $content = $content.fgets($file);
            }

            return $content;
            fclose($file);
    
        }
    }
?>
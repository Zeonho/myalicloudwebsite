<?php
    // ob_start();
    $JSON_setup = array("eventname"=>array(),"starttime"=> array(),"endtime"=>array(),"location"=>array(),"day"=>array());
    // $filename = "calendar.txt";
    $filename ="calendar.txt";
    if (file_exists($filename)){
        echo "file exists\n";
        $myfile = fopen($filename, "r") or die("Unable to open file!");
        // if ($myfile){
            $myfile = fread($myfile,filesize($filename));
            // echo "readfile Result: ".$myfile;
            $JSON_array = json_decode($myfile, true);
            // var_dump ($JSON_array);
            fclose($myfile);
            if (!empty($_POST)){
                array_push($JSON_array["eventname"],$_POST["eventname"]);
                array_push($JSON_array["starttime"],$_POST["starttime"]);
                array_push($JSON_array["endtime"],$_POST["endtime"]);
                array_push($JSON_array["location"],$_POST["location"]);
                array_push($JSON_array["day"],$_POST["day"]);
                // echo $JSON_array["eventname"];
                // $JSON_array["eventname"][0] = "hellos";
                // array_push($JSON_array["eventname"],"hello");
                var_dump($JSON_array);
                $JSON_array_encode = json_encode($JSON_array);
                // file_put_contents($filename, $JSON_array_encode);
                $wfile = fopen($filename, "w") or die("Unable to open file!");
                fwrite($wfile, $JSON_array_encode);
                fclose($wfile);
                // var_dump($JSON_array_encode);
            }
        // }
        else {
            echo "file is empty\n";
            $JSON_setup = json_encode($JSON_setup);
            // file_put_contents($filename, $JSON_setup);

            $myfile = fopen($filename, "w") or die("Unable to open file!");
            fwrite($myfile, $JSON_setup);
            fclose($myfile);
        }

    }
    else {
        echo "file not exist\n";
        if (!empty($_POST)){
            array_push($JSON_setup["eventname"],$_POST["eventname"]);
            array_push($JSON_setup["starttime"],$_POST["starttime"]);
            array_push($JSON_setup["endtime"],$_POST["endtime"]);
            array_push($JSON_setup["location"],$_POST["location"]);
            array_push($JSON_setup["day"],$_POST["day"]);
            // echo $JSON_array["eventname"];
            // var_dump($JSON_setup);
            $JSON_array_encode = json_encode($JSON_setup);
            var_dump($JSON_array_encode);

            // file_put_contents($filename, $JSON_array_encode);

            $myfile = fopen($filename, "w") or die("Unable to open file!");
            fwrite($myfile, $JSON_array_encode);
            fclose($myfile);

        }
    }

    // //Redirect to calendar.php
    // ob_end_flush();
    echo '<script type="text/javascript"> window.location.href = "calendar.php" </script>'
?>

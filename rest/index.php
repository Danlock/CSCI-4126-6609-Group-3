<?php
header('Access-Control-Allow-Origin: *');

/*
require 'vendor/autoload.php';
f you have any questions for Rob (the greenhouse project coordinator) please email them to me by Friday at noon as that is when I’ll be firing off the first batch of questions to him.

Also, we have acquired some server space (thanks to Jonathon Amyotte), here are the details to access it:

Website URL: https://projects.cs.dal.ca/greenhouse (Redirection to HTTPS from HTTP is automatic and always in place).

SSH Hostname: projects.cs.dal.ca
SSH Username: greenhouse
SSH Password: UqWA%wiZ7Z4vcpLV

MySQL Username: greenhouse
MySQL Password: oG9gk=yk7DMDUxFJ
MySQL Hostname: localhost
MySQL Database: greenhouse

- The website file space is accessible via the "website" symlink when you login via SSH/SFTP.
- You can change the password at the command line with the "passwd" command.
- There is no restriction on where you can connect from over SSH/SFTP (no regular FTP) or HTTP/HTTPS. Most other ports are blocked.

I ask that no one change any of these passwords as everyone will need to be able to access them!

Also, please do not share them with anyone outside of this class.

If anyone has any problems or needs any clarification, please do not hesitate to email me.

Thanks,
Mo Tawakol
---------------------------------

<?php
    $col = "CLASS";
    $q = "SELECT DISTINCT $col FROM $tableName ORDER BY $col";
    $r = mysql_query($q,$dbc);
    if($r)
    {
        echo "<select id=\"$col\" class=\"form-control\" onchange=\"OnChange(this.form.CLASS)\" name=\"$col\">\n";
        echo "<option selected value=\"\"> </option>\n";
                        while ($row = mysql_fetch_array($r))
                        {
                            echo "<option value=\"{$row[$col]}\">{$row[$col]}</option>\n";
                        }
                                    echo "</select>\n";
    }
?>

INSERT INTO `ubicomp`.`test` (`name`) VALUES ('example');


-------------------------------------------
<?php
header('Access-Control-Allow-Origin: *');

/*
require 'vendor/autoload.php';
f you have any questions for Rob (the greenhouse project coordinator) please email them to me by Friday at noon as that is when Iâ€™ll be firing off the first batch of questions to him.

Also, we have acquired some server space (thanks to Jonathon Amyotte), here are the details to access it:

Website URL: https://projects.cs.dal.ca/greenhouse (Redirection to HTTPS from HTTP is automatic and always in place).

SSH Hostname: projects.cs.dal.ca
SSH Username: greenhouse
SSH Password: UqWA%wiZ7Z4vcpLV

MySQL Username: greenhouse
MySQL Password: oG9gk=yk7DMDUxFJ
MySQL Hostname: localhost
MySQL Database: greenhouse

- The website file space is accessible via the "website" symlink when you login via SSH/SFTP.
- You can change the password at the command line with the "passwd" command.
- There is no restriction on where you can connect from over SSH/SFTP (no regular FTP) or HTTP/HTTPS. Most other ports are blocked.

I ask that no one change any of these passwords as everyone will need to be able to access them!

Also, please do not share them with anyone outside of this class.

If anyone has any problems or needs any clarification, please do not hesitate to email me.

Thanks,
Mo Tawakol
-----------------------

    $app->get('/sensor',function () {
        //Connects to the mySQL database
        $dbc = @mysql_connect (DB_HOST, DB_USER,DB_PASSWORD)
        OR die ('Could not connect to MySQL: ' . mysql_connect_error());
        $db = @mysql_select_db(DB_NAME,$dbc);
        mysql_set_charset('utf8',$dbc);
        $q = "SELECT * from sensorData";
        $r = mysql_query($q,$dbc);
        //pulls all info from sensorData table
        while ($row = mysql_fetch_array($r))
        {
            $arr[] = $row;
            printf("ID: %s  sensorName: %s collectedValue: %s thresholdValue: %s", $row[0], $row[1], $row[2], $row[3]);
        }
        return json_encode($arr);

    });

-------------------------------------------
*/

    require 'Slim/Slim.php';
    \Slim\Slim::registerAutoloader();

    $app = new \Slim\Slim();


    DEFINE ('DB_USER', 'greenhouse');
    DEFINE ('DB_PASSWORD', 'oG9gk=yk7DMDUxFJ');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'test');
    //DEFINE ('TABLENAME','data');
    //Using tablenames as defined in the Group 6 Database Schema defined in their Implemenation

    //Using optional variable accepts /sensor call and /sensor/1 call
    //Gets data from sensorData table or one specific sensor
    $app->get('/sensordata(/:sensor_id)' ,function ($sensor_id = NULL) {
        //Connects to the mySQL database
        $dbc = @mysql_connect (DB_HOST, DB_USER,DB_PASSWORD)
        OR die ('Could not connect to MySQL: ' . mysql_connect_error());
        $db = @mysql_select_db(DB_NAME,$dbc);
        mysql_set_charset('utf8',$dbc);

        //pulls all info from sensorData table
        if (is_null($sensor_id)) {
            $q = "SELECT * from sensorData";
            $r = mysql_query($q,$dbc);
            while ($row = mysql_fetch_array($r))
            {
                $arr[] = $row;
                printf("ID: %s  sensorName: %s collectedValue: %s thresholdValue: %s", $row[0], $row[1], $row[2], $row[3]);
            }
            return json_encode($arr);
        } else {
            $q = "SELECT * from sensorData WHERE ID=$sensor_id";
            $r = mysql_query($q,$dbc);
            while ($row = mysql_fetch_array($r))
            {
                $arr[] = $row;
                printf("ID: %s  sensorName: %s collectedValue: %s thresholdValue: %s", $row[0], $row[1], $row[2], $row[3]);
            }
            return json_encode($arr);
        }
    });

    //gets entire powerProduction table in the database
     $app->get('/powerproduction' ,function () {
            //Connects to the mySQL database
            $dbc = @mysql_connect (DB_HOST, DB_USER,DB_PASSWORD)
            OR die ('Could not connect to MySQL: ' . mysql_connect_error());
            $db = @mysql_select_db(DB_NAME,$dbc);
            mysql_set_charset('utf8',$dbc);

            //pulls all info from sensorData table

            $q = "SELECT * from powerProduction";
            $r = mysql_query($q,$dbc);
            while ($row = mysql_fetch_array($r))
            {
                $arr[] = $row;
            }
            return json_encode($arr);

        });

    //gets entire sensor_ambient table in the database
     $app->get('/sensor_ambient' ,function () {
            //Connects to the mySQL database
            $dbc = @mysql_connect (DB_HOST, DB_USER,DB_PASSWORD)
            OR die ('Could not connect to MySQL: ' . mysql_connect_error());
            $db = @mysql_select_db(DB_NAME,$dbc);
            mysql_set_charset('utf8',$dbc);

            //pulls all info from sensorData table

            $q = "SELECT * from sensor_ambient";
            $r = mysql_query($q,$dbc);
            while ($row = mysql_fetch_array($r))
            {
                $arr[] = $row;
            }
            return json_encode($arr);

        });

     $app->get('/sensor_soil' ,function () {
            //Connects to the mySQL database
            $dbc = @mysql_connect (DB_HOST, DB_USER,DB_PASSWORD)
            OR die ('Could not connect to MySQL: ' . mysql_connect_error());
            $db = @mysql_select_db(DB_NAME,$dbc);
            mysql_set_charset('utf8',$dbc);

            //pulls all info from sensorData table

            $q = "SELECT * from sensor_soil";
            $r = mysql_query($q,$dbc);
            while ($row = mysql_fetch_array($r))
            {
                $arr[] = $row;
            }
            return json_encode($arr);

        });

     $app->get('/expertise' ,function () {
            //Connects to the mySQL database
            $dbc = @mysql_connect (DB_HOST, DB_USER,DB_PASSWORD)
            OR die ('Could not connect to MySQL: ' . mysql_connect_error());
            $db = @mysql_select_db(DB_NAME,$dbc);
            mysql_set_charset('utf8',$dbc);

            //pulls all info from sensorData table

            $q = "SELECT * from expertise";
            $r = mysql_query($q,$dbc);
            while ($row = mysql_fetch_array($r))
            {
                $arr[] = $row;
            }
            return json_encode($arr);

        });

     $app->get('/tasks' ,function () {
            //Connects to the mySQL database
            $dbc = @mysql_connect (DB_HOST, DB_USER,DB_PASSWORD)
            OR die ('Could not connect to MySQL: ' . mysql_connect_error());
            $db = @mysql_select_db(DB_NAME,$dbc);
            mysql_set_charset('utf8',$dbc);

            //pulls all info from sensorData table

            $q = "SELECT * from tasks";
            $r = mysql_query($q,$dbc);
            while ($row = mysql_fetch_array($r))
            {
                $arr[] = $row;
            }
            return json_encode($arr);

        });

     $app->get('/tbluserdetails' ,function () {
            //Connects to the mySQL database
            $dbc = @mysql_connect (DB_HOST, DB_USER,DB_PASSWORD)
            OR die ('Could not connect to MySQL: ' . mysql_connect_error());
            $db = @mysql_select_db(DB_NAME,$dbc);
            mysql_set_charset('utf8',$dbc);

            //pulls all info from sensorData table

            $q = "SELECT * from tbluserdetails";
            $r = mysql_query($q,$dbc);
            while ($row = mysql_fetch_array($r))
            {
                $arr[] = $row;
            }
            return json_encode($arr);

        });

     $app->get('/userexpertise' ,function () {
            //Connects to the mySQL database
            $dbc = @mysql_connect (DB_HOST, DB_USER,DB_PASSWORD)
            OR die ('Could not connect to MySQL: ' . mysql_connect_error());
            $db = @mysql_select_db(DB_NAME,$dbc);
            mysql_set_charset('utf8',$dbc);

            //pulls all info from sensorData table

            $q = "SELECT * from userexpertise";
            $r = mysql_query($q,$dbc);
            while ($row = mysql_fetch_array($r))
            {
                $arr[] = $row;
            }
            return json_encode($arr);

        });

     $app->get('/userallocation' ,function () {
            //Connects to the mySQL database
            $dbc = @mysql_connect (DB_HOST, DB_USER,DB_PASSWORD)
            OR die ('Could not connect to MySQL: ' . mysql_connect_error());
            $db = @mysql_select_db(DB_NAME,$dbc);
            mysql_set_charset('utf8',$dbc);

            //pulls all info from sensorData table

            $q = "SELECT * from userAllocation";
            $r = mysql_query($q,$dbc);
            while ($row = mysql_fetch_array($r))
            {
                $arr[] = $row;
            }
            return json_encode($arr);

        });


    $app->run();
?>
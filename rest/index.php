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

---------------------------------



    require 'Slim/Slim.php';
    \Slim\Slim::registerAutoloader();

    $app = new \Slim\Slim();


    DEFINE ('DB_USER', 'greenhouse');
    DEFINE ('DB_PASSWORD', 'oG9gk=yk7DMDUxFJ');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'greenhouse');
    DEFINE ('TABLENAME','data');
    DEFINE ('USAGE_FILE','usage.txt');
    // Supporting functions.
    function _connection(){
        $dbc = @mysql_connect (DB_HOST, DB_USER,DB_PASSWORD)
          OR die ('Could not connect to MySQL: ' . mysql_connect_error());
        $db = @mysql_select_db(DB_NAME,$dbc);
        mysql_set_charset('utf8',$dbc);
        return $db;
        
    }

    $app->get('/',function () {
        //Connects to the mySQL database
        if(!_connection()) {
        echo "<h1>Can not connect to mySQL!</h1>";  
    }

        else {
        echo "<h1>Database connected</h1>";
        echo "<h2>Database usage</h2>";
        $usagefile = file_get_contents(USAGE_FILE);
        if($usagefile) {
            echo $usagefile;
        }
    }
        
        //$col = "name";
        //$q = "SELECT * from ".TABLENAME;
        //$r = mysql_query($q,$dbc);

        //while ($row = mysql_fetch_array($r))
        //{
          //  $arr[] = $row;
          //  printf("ID: %s  Name: %s", $row[0], $row[1]);
       // }

    });

    // return all sensors data
    $app->get('/sensors',function() {
    echo 'sensors: sensor';    
    });
    
    // get the sensor data by its id
    $app->get('/sensors/:sensor_id/',function($sensor_id){
        echo "sensor:$sensor_id";
    });

    // return the data during a period of time.
    $app->get('/sensor_data/:sensor_id/:start_time/:end_time',function($sensor_id,$start_time,$end_time){
    echo "sensor:$sensor_id,time:$start_time-$end_time";
    });
    
    // post a sensor's data. Create a sensor data table and store the sensor data in to the database.
    $app->post('/sensors/:sensor_id/',function($sensor_id) use($app){
        $data = $app->request->getBody();
    echo $data;
    });
    
    // add an item in to the data table.
    $app->post('/sensor_data/:sensor_id/',function($sensor_id) use($app){
    $data = $app->request->getBody();
        echo $data;
    });

    // get current the data
    $app->get('/sensor_data/:sensor_id/',function($sensor_id) {
        echo 'last stored sensor data';
    });

    // get the power
    $app->get('/power/:start_time/:end_time',function($start_time,$end_time) {
        echo $start_time."-".$end_time;
    });
    
    
    $app->get('/power',function() {
        echo 'last stored power data';
    });
    
    
    $app->post('/power',function() use($app){
        $data = $app->request->getBody();
        echo $data;
    });

    $app->run();

?>

-------------------------------------------
*/

    require 'Slim/Slim.php';
    \Slim\Slim::registerAutoloader();

    $app = new \Slim\Slim();


    DEFINE ('DB_USER', 'greenhouse');
    DEFINE ('DB_PASSWORD', 'oG9gk=yk7DMDUxFJ');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'test');
    DEFINE ('TABLENAME','data');


    //Using optional variable accepts /sensor call and /sensor/1 call
    $app->get('/sensor(/:sensor_id)' ,function ($sensor_id = NULL) {
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

    $app->post('/post', 'post');
    $app->put('/put', 'update');
    $app->delete('/delete', 'delete');
    

    function post() {
        echo "POST";
    }
    function put() {
        echo "pit"; 
    }
    function delete() {
        echo "delete";
    }

    $app->run();
?>
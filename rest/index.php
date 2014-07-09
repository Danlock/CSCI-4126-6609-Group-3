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
*/

    require 'Slim/Slim.php';
    \Slim\Slim::registerAutoloader();

    $app = new \Slim\Slim();


    DEFINE ('DB_USER', 'greenhouse');
    DEFINE ('DB_PASSWORD', 'oG9gk=yk7DMDUxFJ');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'test');
    DEFINE ('TABLENAME','data');
    // $tableName = "data";

    // $dbc = @mysql_connect (DB_HOST, DB_USER,DB_PASSWORD)
    // OR die ('Could not connect to MySQL: ' . mysql_connect_error());

    // $db = @mysql_select_db(DB_NAME,$dbc);
    // mysql_set_charset('utf8',$dbc);
    // $GLOBALS['dbc'] = $dbc;

    $app->get('/',function () {
        //Connects to the mySQL database
        $dbc = @mysql_connect (DB_HOST, DB_USER,DB_PASSWORD)
        OR die ('Could not connect to MySQL: ' . mysql_connect_error());
        $db = @mysql_select_db(DB_NAME,$dbc);
        mysql_set_charset('utf8',$dbc);
        $col = "name";
        $q = "SELECT * from ".TABLENAME;
        $r = mysql_query($q,$dbc);

        while ($row = mysql_fetch_array($r))
        {
            $arr[] = $row;
            printf("ID: %s  Name: %s", $row[0], $row[1]);
        }
        return json_encode($arr);
    });
    /*
    $app->post('/post', 'post');
    $app->put('/put', 'update');
    $app->delete('/delete', 'delete');
    */

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
/*
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get('/', 'get');
$app->get('/post', 'post');
$app->get('/put', 'update');
$app->get('/delete', 'delete');

function get() {

}

function post() {
    
}
function put() {
    
}
function delete() {
    
}

$app->run();
*/
?>
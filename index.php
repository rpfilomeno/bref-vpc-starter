<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome!</title>
    <style>
        .container{
            background: gray;
            min-height: 400px;
        }

        /*Can achive using vw css unit*/
        .row-full{
            width: 100vw;
            position: relative;
            margin-left: -50vw;
            height: 100px;
            margin-top: 100px;
            left: 50%;
        }

        .higlight {
            background-color: lime;
            padding: 5px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="row row-full">
        <?php phpinfo() ?>
    </div>

    
    <div class="row higlight">
    <h2>Checking Internet test connection</h2>
    <?php
        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $_SERVER['API_HOST']);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        if(curl_error($ch)) {
            echo "Connection failed. Error was: ". curl_error($ch). "\n";
            
        } else {

            echo "Connection succesful. Your iP is: " . $output . "\n";
        }

        // close curl resource to free up system resources
        curl_close($ch);
    ?>
    </div>

    <div class="row higlight">
    <h2>Checking RDS test connectiion</h2>:
    <?php

        $serv_ip = $_SERVER['DB_CRM_SERV'];
        $db_name = "ccloud_crm";
        $db_user = $_SERVER['DB_CRM_USER'];
        $db_pwd  = $_SERVER['DB_CRM_PASS'];
        $connection = pg_connect("host=$serv_ip dbname=$db_name user=$db_user password=$db_pwd");

        if (!$connection = cc_pgcon()) {
             $error = error_get_last();
            echo "Connection failed. Error was: ". $error['message']. "\n";
        } else {
            echo "Connection succesful.\n";
        } 
    ?>
    </div>
    
    
    
</body>
</html>
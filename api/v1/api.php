<?php
    header('Content-Type: application/json; charset=utf-8');
    include("db/module.php");
    checkfile("db/maintenance.txt");
    $json = '{"name": "API","server": "localhost","port": "80","url": "http://localhost/adminpanel/", "version": "0.0.1","created": "Wednesday, July 14, 2021 9:58:33.114 PM GMT+05:45","timestamp": "1626279213114","Created_date": " Wednesday, July 14, 2021 4:13:33.114 PM","emojis_url": "https://api.github.com/emojis","api_url": "http://localhost/adminpanel/api/v1/index.php","user_data": "http://localhost/adminpanel/api/v1/index.php?id={client_id}","emoji_urls": "https://api.github.com/emojis","developer": "Agent Perfect","home_page": "https://www.kabstore.com.np"}';
    $json_array = json_decode($json, true);
    $json_array["maintenance"] = $output["maintenance"];
    $array_json = json_encode($json_array, 128);
    
    if ($_SERVER["QUERY_STRING"] == '') {
        print_r($array_json);
    } else {
        $filename = "../adminpanel/api/v1/db/maintenance.txt";
    }
    if (isset($_REQUEST['maintenance'])) {
        switch ($_REQUEST['maintenance']) {
            case 'true':
                changefile("db/maintenance.txt", "true");
            break;
            case 'false':
                changefile("db/maintenance.txt", "false");
            break;
            default: 
                echo "Invalid Parameter";
            break;
        }
    }
?>

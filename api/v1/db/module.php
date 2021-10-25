<?php 
function checkfile($filename) {
    // $filename();
    $filetext = file_get_contents($filename);
    $_array = explode('::', $filetext);
    $_array[1] = str_replace("maintenance == ", "", $_array[1]);
    $_array["maintenance"] = $_array[1];
    unset($_array[0], $_array[1]);
    if($_array['maintenance'] == " TRUE "){
        $_array['maintenance'] = TRUE;
    } elseif ($_array['maintenance'] == " FALSE ") {
        $_array['maintenance'] = FALSE;
    } else {
        $_array['maintenance'] = TRUE;
    }
    global $output;
    $output = $_array;
    if ($output["maintenance"] == "") {
        $output["maintenance"] = FALSE;
    } else {
        $output["maintenance"] = TRUE;
    }
}

function changefile($_filename, $text) {
    // $_filename = realpath($_filename);
    $_fopen = fopen($_filename, "w+");
    if ($text == "true") {
        fwrite($_fopen, ":: maintenance == TRUE");
        fclose($_fopen); 
    } 
    elseif ($text == " FALSE " || $text == false || $text == "FALSE" || $text == "false" || $text == "__FALSE__" || $text == "__false__"){
        fwrite($_fopen, ":: maintenance == FALSE");
        fclose($_fopen);
        // echo $_filetext;
    }
}
?>
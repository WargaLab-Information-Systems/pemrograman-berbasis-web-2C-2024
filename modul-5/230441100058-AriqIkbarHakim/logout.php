<?php

$session_data = array(
    "id" => "",
    "user_name" => ""
);

function unset_session_data($data) {
    foreach ($data as $key => $value) {
        $data[$key] = "";
    }
    return $data;
}

$session_data = unset_session_data($session_data);

header("Location: index.php");
exit();

?>

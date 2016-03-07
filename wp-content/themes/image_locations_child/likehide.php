<?php

if (isset($_GET['act'])) {
    $entry = filter_var($_POST['entry'], FILTER_SANITIZE_STRING);
    $href = filter_var($_POST['href'], FILTER_SANITIZE_STRING);
    $archive = json_decode(file_get_contents('db.json'), true);

    // Save like
    if ($_GET['act'] == 'like') {
        $archive[$entry] = array('state' => 'like', 'href' => $href);
    }
    // Remove like
    elseif ($_GET['act'] == 'unlike') {
        if (isset($archive[$entry]) && $archive[$entry]['state'] == 'like') unset($archive[$entry]);
    }
    // Save hide
    else if ($_GET['act'] == 'hide') {
        $archive[$entry] = array('state' => 'hide', 'href' => $href);
    }
    // Remove hide
    elseif ($_GET['act'] == 'unhide') {
        foreach ($_POST['hidden'] as $hidden) {
            foreach ($archive as $entry => $data) {
                if ($data['href'] == $hidden)
                    unset($archive[$entry]);
            }
        }
    }

    file_put_contents('db.json', json_encode($archive));
}
?>
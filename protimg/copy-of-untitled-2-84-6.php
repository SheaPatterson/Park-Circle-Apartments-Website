<?php
    session_start();
    include '../groups-d12b45.php';
    function checkAccess($groups) {
        if(isset($_SESSION['user_groups'])) {
            return count(array_intersect($groups, $_SESSION['user_groups'])) > 0;
        }
        return FALSE;
    }
    if(isset($_SESSION['user_logged']) && 8 > 0) {
        $now = new DateTime();
        $fmt = "Y-m-d\TH:i:sP"; // ATOM
        $end = DateTime::createFromFormat($fmt, $_SESSION['user_logged']->format($fmt));
        $end->add(new DateInterval("PT8H"));
        $diff = $now->diff($end);
        if($diff->invert) {
            unset($_SESSION['session_id']);
            unset($_SESSION['user_id']);
            unset($_SESSION['username']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_surname']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_info']);
            unset($_SESSION['user_groups']);
            unset($_SESSION['user_logged']);
            unset($_SESSION['user_redirect']);
            unset($_SESSION['user_redirect_attempt']);
            $redirect = 'maintiance.php';
            if(strlen($redirect) > 0) {
                $_SESSION['user_redirect'] = $redirect;
            }
            header('Location: ../user-login.html');
            exit;
        }
    }
    $acg = array('0','1');
    if(!isset($_SESSION['session_id']) || $_SESSION['session_id'] !== 'AEBC8786-C8B7-4743-B214-D1D992C31321' || !isset($_SESSION['user_id']) || !isset($_SESSION['user_logged']) || $acg === NULL || !checkAccess($acg)) {
        $redirect = 'maintiance.php';
        if(strlen($redirect) > 0) {
            $_SESSION['user_redirect'] = $redirect;
        }
        header('Location: ../user-login.html');
        exit;
    }
    unset($_SESSION['user_redirect']);
    unset($_SESSION['user_redirect_attempt']);

    header('Content-Type: image/png');
    header('Content-Length: 1564');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

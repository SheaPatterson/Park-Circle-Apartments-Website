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
    header('Content-Length: 1561');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

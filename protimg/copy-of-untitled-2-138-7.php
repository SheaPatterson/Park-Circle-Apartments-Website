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

    header('Content-Type: image/avif');
    header('Content-Length: 3177');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

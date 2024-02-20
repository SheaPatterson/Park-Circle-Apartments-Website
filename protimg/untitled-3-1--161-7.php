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
    header('Content-Length: 5482');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

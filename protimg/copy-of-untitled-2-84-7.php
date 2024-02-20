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
    header('Content-Length: 1661');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

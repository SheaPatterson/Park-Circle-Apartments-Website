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
    header('Content-Length: 1677');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

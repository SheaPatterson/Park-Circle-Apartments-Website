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
    header('Content-Length: 5285');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

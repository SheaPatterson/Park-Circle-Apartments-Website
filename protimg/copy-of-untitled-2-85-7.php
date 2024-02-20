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
    header('Content-Length: 1684');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

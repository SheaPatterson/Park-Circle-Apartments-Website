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
    header('Content-Length: 13807');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

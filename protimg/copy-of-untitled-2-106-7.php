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
    header('Content-Length: 2299');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

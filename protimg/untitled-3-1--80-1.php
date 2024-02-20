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
    header('Content-Length: 2550');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

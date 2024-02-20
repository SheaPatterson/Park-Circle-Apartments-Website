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
    header('Content-Length: 3441');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

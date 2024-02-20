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
    header('Content-Length: 4286');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

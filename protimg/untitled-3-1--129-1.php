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
    header('Content-Length: 4312');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

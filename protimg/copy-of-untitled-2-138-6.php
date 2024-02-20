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

    header('Content-Type: image/png');
    header('Content-Length: 3275');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

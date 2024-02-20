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
    header('Content-Length: 2185');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

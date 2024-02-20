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
    header('Content-Length: 4452');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

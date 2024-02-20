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
    header('Content-Length: 5305');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

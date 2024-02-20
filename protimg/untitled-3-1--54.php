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
    header('Content-Length: 5158');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('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');

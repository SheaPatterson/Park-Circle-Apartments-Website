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
    header('Content-Length: 466');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAAB0AAAALCAYAAACDHIaJAAABmUlEQVR4Ab2Tg85cURSFxzZ/27aNsT0Tp/Zj9LX7reQOoro9yb7aWDjnmv7mCgaD4UAgsBSJRDZDLNM/XJaxsbG5WCx2FA6Hd4gZn88X5/1euT9SkEwmvXpGRSCRSOxwP49Go8cMPxAQKVu/HpGzfNv6LQUMXyQqAJYEDMCEFAlYBTx3iFXep/pN8Xh8SWR4NP8SGI3LgNW5NwCc18elpSUnAHcej2fcGL4PkQXqkoCczM3NuQxCG78CZhYAA6o0NgU8ylZDsWwb6+5kKfkxfacnwXNO6n58eEbUyy6aH2hu03zK3dfPTU1Nuft36jKGdfbx8fFZwFcg0iUuJycno+oVMX2XYj3LEbjsc6pP/X7/ZZ+YnaIe0dHAiYmJVQg8Etucymx/v7R3xBvViAB1M9o/ZpSwuMb3D4B8Jd7SUxcBuWYcqh224khu9U+a1mxfDYXrsgslXxj8klxNbOWG2JOflCrDCKuapYw4Ircm2wGYh3Ccda0ecuM6/aP2mklM6zdQIzZE1MDzhIK8g7AYYf5rP/cIk/+yvgHNfDo+4dSGkQAAAABJRU5ErkJggg==');

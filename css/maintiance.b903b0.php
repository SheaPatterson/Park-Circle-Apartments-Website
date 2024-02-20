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

    header('Content-Type: text/css');
    header('Content-Length: 527');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('Ym9keXstLWY6MTstLXN3OjBweDttaW4td2lkdGg6MTkyMHB4fUBtZWRpYSAobWluLXdpZHRoOjEyMDBweCkgYW5kIChtYXgtd2lkdGg6MTkxOXB4KXtib2R5e21pbi13aWR0aDoxMjAwcHh9fUBtZWRpYSAobWluLXdpZHRoOjk2MHB4KSBhbmQgKG1heC13aWR0aDoxMTk5cHgpe2JvZHl7bWluLXdpZHRoOjk2MHB4fX1AbWVkaWEgKG1pbi13aWR0aDo3NjhweCkgYW5kIChtYXgtd2lkdGg6OTU5cHgpe2JvZHl7bWluLXdpZHRoOjc2OHB4fX1AbWVkaWEgKG1pbi13aWR0aDo0ODBweCkgYW5kIChtYXgtd2lkdGg6NzY3cHgpe2JvZHl7bWluLXdpZHRoOjQ4MHB4fX1AbWVkaWEgKG1heC13aWR0aDo0NzlweCl7Ym9keXttaW4td2lkdGg6MzIwcHh9fS5tZW51LWNvbnRlbnR7Y3Vyc29yOnBvaW50ZXI7cG9zaXRpb246cmVsYXRpdmV9bGl7LXdlYmtpdC10YXAtaGlnaGxpZ2h0LWNvbG9yOnJnYmEoMCwwLDAsMCl9Ci5jMXtkaXNwbGF5OmlubGluZS1ibG9jaztwb3NpdGlvbjpyZWxhdGl2ZTttYXJnaW4tbGVmdDowO21hcmdpbi10b3A6MH0=');

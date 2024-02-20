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
    header('Content-Length: 1052');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('AAAAIGZ0eXBhdmlmAAAAAGF2aWZtaWYxbWlhZk1BMUEAAAGNbWV0YQAAAAAAAAAoaGRscgAAAAAAAAAAcGljdAAAAAAAAAAAAAAAAGxpYmF2aWYAAAAADnBpdG0AAAAAAAEAAAAsaWxvYwAAAABEAAACAAEAAAABAAADIAAAAPwAAgAAAAEAAAG1AAABawAAAEJpaW5mAAAAAAACAAAAGmluZmUCAAAAAAEAAGF2MDFDb2xvcgAAAAAaaW5mZQIAAAAAAgAAYXYwMUFscGhhAAAAABppcmVmAAAAAAAAAA5hdXhsAAIAAQABAAAAw2lwcnAAAACdaXBjbwAAABRpc3BlAAAAAAAAADoAAAAWAAAAEHBpeGkAAAAAAwgICAAAAAxhdjFDgSAAAAAAABNjb2xybmNseAABAA0ABoAAAAAOcGl4aQAAAAABCAAAAAxhdjFDgQAcAAAAADhhdXhDAAAAAHVybjptcGVnOm1wZWdCOmNpY3A6c3lzdGVtczphdXhpbGlhcnk6YWxwaGEAAAAAHmlwbWEAAAAAAAAAAgABBAECgwQAAgQBBYYHAAACb21kYXQSAAoGGBU5ryqAMt4CFgAYYWi6NfAnmM/JNeR5jSSBm8D8903tWk2EYM4IVKxgHpM0Ewb86xxomtkzWGj+6279egApfHpE9R5RN+WvURj3gvO5vCFT39J48t1mkBa8ou+FP01KvnBi9RVTZiyJWaHj892dzy4WgGNQaSR+NYynGNPZ0rCupFlVdbWxowH/WOO5xCSUyylspMSk3gzM15zM3Y6eh4IK6efLVvgFgXIrw5RB7ahBeduOxCIEjiAGCpx19X2DH9v8qbP+4ri0mDHydGu2Lb9MDJQfUn+qulMjkCWtkB06nfNIu8LBNcOMedp06FjI4TM7hYZgBUrGInp0N2KovSc8zNaC5Tu8b/T8cVAzCdsEM4wJsaNlXHLYcfAsWKqyaKguz2cQs7CMpSueA2eVP99DIa32mxiQqCEVCRL4KrJkJmMo12JevJBo1F1k+SaJ4u1Y1wmKVb5DifvVLOm0YHhvW1nj43ASAAoJOBU5rygIaDSAMuwBFgAHGAAEBPHmNjCaKEKVYm4wPx5uqsQCxpzrxROOV23dnpjI8jqsCwx5NJvAGYTpU4QO6Oom+9mII7Vb+6L2wipGbsB8h3YFsJYcw5KCuRWOPtoP2Ori0sMo2pAUsJVmNpZqAzTdVTMwpGHeDdSeSInrgfBr5WuhIUQHXcqgpdgUD9T3RKKCiCjyW41gNkyiXeKlmJPhMYcp3yHbYLR8W0wl6kfOSO9nJM9N2io45vulfdDS5h2njrjkFPpDw6QoLVwtM+D0K1SPAG2nYJLDcOLk9qkpxvMrlD/uhog1XWQfZ40iO2wjtLzHInk=');

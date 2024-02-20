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
    header('Content-Length: 755');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAACoAAAAQCAYAAABgIu2QAAACuklEQVR4Ac2UA5NdQRCF19595tr2xrZt23Yp/yI/ON+XepNaW1M1uHMbp093T9EWjJJMJpOOx+MDsVhsKJ/P1xRtp5FMJnPMQ4lE4gogT7PvYu7kfAvAka3CVRoOAGlKpVJnYPEo52YZnRXAuXQ6ndkwJG1tbVVsxdMc1uNwHyxdBtA1znvYdwPy9EKMmX7myXUH19TUVI3jcdh5Go1GHwTmANcP0IvZbLaNz7LC3TvuJjzPV4f86zWgIL8uQ0YAeID5DjDvcTwR2LQhYO/k9JQ2NDTEkX3G/Sn27kgkcmIWyAkCucqxYl0ARhk2APMFht+YTo3PSvcpxEbDPSw12CCAi8kWgQzz/6D/yEQt3+f4PhQCXdMI9QYbT2QGkMfmqzObA7nRuro6U1huOu1qn59p2dBON/sI8x7ynetBos6mmLeZL3F6KThdYJQZlPVq+i2P2TUnOOzcl9VV1KOsl7pPZ6cJp+dxdp15VrYWerCnBwaI44B5zSsQDa8BTTeMjaz/KIEfLS0tsZAp30/uJmUWEob9xtdeS4zdF+I8QV1G5ga1fs9sBX0N9BTS/I75iIY5gpHj7GdC57a3t2dQvjatBEqRuYQjdfZbf16aAcZ99I7g2Pr9auNwfxfdn3z/YX8lGcgctiwEy9xhIF1dXZXawneKUTfjcbauZMWm8PGNMiYnJ8thRiMP6fKTKP5EcWxwcPB/M/GvDzDffbJQeejzNZ1xArupPQA8Z77Gxy92gb/h3090r9tcNp//rXcZNTBZnZFVGUJoMnyHdw/Bf4yg/CqXy30BxDO+n5KK3wbmEyR71uXhw4fLNCooUx/qCztJ2TFAAh3UjyUmCfpQXgb53yXDfI+oo+6SzxEKBwViSjCcx/ANgE7xfZrzAGKVBVbLZLBw3pwBqwfsWhm0Xou26zA9pqJoG4+/qRF0IKfUHwoAAAAASUVORK5CYII=');

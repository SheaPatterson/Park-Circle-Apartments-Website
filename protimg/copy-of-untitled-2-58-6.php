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
    header('Content-Length: 1168');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAADoAAAAWCAYAAACR1Y9lAAAEV0lEQVR4Ae2YBWssWRBG456ZuCcjz93d3d3y3N3d3f3hrAu6vzJ7DvQsTccDxNiGoq3sq/q67p3JGglHbW1tWUVFRSIej6emTJlSkDWKjmzAjauqqtpTWVl5BZBXuT4D0NOcb/Fu5ohGV1NTU15XV7euurr6EteHBOSzsM6ECRPKAfxwRAIcO3ZsIZ3bAqgLAF3S0tJS3EMxmtQbtmCSyWRFfX39WilIx64ix5uamkqkKIlLx6VSticfK1euzMP+dkNDQ3LIgLS1tVVybCPpuZFXOYDYzPNzdotzo6C9Ri4B+Ki2fYkByHP4Wj7o4OhQaZDwRbrziaHxlMSbw9+c3eO8KmorYPT/7OjoyPYe+zYoW9VNqByKeB7ZPKgAGQaVdgm5AtgnUOkKiU6MFsEJCaAJ3XxrB7E/TiGucG4A9CmATO2qmOhcw9eGQQNoxQm6w+oGtLvMebEVjy4PPD+KTCfRui4ouBg54zW+4lC5CKCCaY0UY7zf5KAtJyYjQJI+ZxcQ6bjNandD6TrkgNQtLS29G0l+lctHdOEnxoOMP99x324nm5ubqwejg8UE3OQgQQ4jZwF5AJrW9DI0WujmTqQ+FotdytCdxI9hvzfKAHc+0txrOjuTmI8Gi6rZTrdgXdtjBwh+0W1YX4znzJmTT5Ga0Z+BbMfPimBJmdSVvssFOjd4f8TJaiEHY185zs7ZEa73Sx9ATh/g0JIJLwGy0jUwPEX37duXm6EpXb9OjA/EGxsteG8N0V7KV3DIIJthQfE5v6ioaHlxcfFCZ0DYKBeFnVbVxKjsaa4X9AZGJ110qBbZS/I/+51G3zU2Nh6h4+N47+Q+Qawf586dy8/4S6fTcQeWBadYd9DZSC673Bby/KxMU7C/IFM4X0Fk3Xn0zzrBAXq0rKxsL/er/9tpeUFVDpHARs6nqMxdzlsJ4Pd5kOdnuT/D9UoLEtCzBGcG3hsGYmVddhgiC1060KmKDKoU/t0JnUaWyiB0/nS6mjTv7jj0ePYPrv4WmEsZOcx1wjvoLIYFkwEDmaofysvL31kZHC4C1OyAxo3uXCZOnFhN0KcEaeAbWos84H6/NOxi3TtCkj94f8rpaaW7o6HDCr0pdh4wu90pcb/ObSG+2vHzygFGd35YaN5PxN/hwPcH54GCbpp3a5HjssDrToPDrkgDzrFupmgMwxME3EenjpPQDeS6dGJDHsN2qeewjd0UtB3A/qbfEgWcEY0tUIsAIJeth4C5ie175D5yj+c73H2RvDRV54AbCwcc1x+CwtwSuEuXgAMc2Z2+MV5O6256OuZ1ZHelFAAfC7a1tVVKH2Wd/BUmfHbzYCe0k1ImldnMB4Hz3B5Gh0lmSOGj2k2+xQFIm3n1MjTHoruAHBLBYOv/YfWtDnLDdVTAOiXh55wP8n1sDrZum8NLgT+3MuBMeDj+hCoyYUVgALoByC1WOLyoR8yo4gg7HAYAvEcX/Jk1ZwT/L/P/8S/Owdnv4NHzvAAAAABJRU5ErkJggg==');

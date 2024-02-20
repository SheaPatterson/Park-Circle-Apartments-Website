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
    header('Content-Length: 1328');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('AAAAIGZ0eXBhdmlmAAAAAGF2aWZtaWYxbWlhZk1BMUEAAAGNbWV0YQAAAAAAAAAoaGRscgAAAAAAAAAAcGljdAAAAAAAAAAAAAAAAGxpYmF2aWYAAAAADnBpdG0AAAAAAAEAAAAsaWxvYwAAAABEAAACAAEAAAABAAADrwAAAYEAAgAAAAEAAAG1AAAB+gAAAEJpaW5mAAAAAAACAAAAGmluZmUCAAAAAAEAAGF2MDFDb2xvcgAAAAAaaW5mZQIAAAAAAgAAYXYwMUFscGhhAAAAABppcmVmAAAAAAAAAA5hdXhsAAIAAQABAAAAw2lwcnAAAACdaXBjbwAAABRpc3BlAAAAAAAAAEUAAAAaAAAAEHBpeGkAAAAAAwgICAAAAAxhdjFDgSAAAAAAABNjb2xybmNseAABAA0ABoAAAAAOcGl4aQAAAAABCAAAAAxhdjFDgQAcAAAAADhhdXhDAAAAAHVybjptcGVnOm1wZWdCOmNpY3A6c3lzdGVtczphdXhpbGlhcnk6YWxwaGEAAAAAHmlwbWEAAAAAAAAAAgABBAECgwQAAgQBBYYHAAADg21kYXQSAAoGGBkiZ5VAMu0DFYAYUWjRdjQ0Vk/c1EhUsQbXTZGYLNWQbnW66NGjJd8e/j5RGUjhLXjp3ShsXus1C/ZNy9G1XNRx+JIAnmqc33dDc7/tWOPDwAEcgO+mHS0BXHxq7c9W0czxYEa2vyAYpNuWog7xubSjKkibEoJn4lTZtIxUeJdPKK7+61nH08JNRs5NpxljgZqAfBSc0vq8Uh9LnD4QC1lcB52tyhL7aY/ty0NLKVPtkAtFp2eS1S5kNzGUGNTeGO2//D0FYjoC9hBOfVtz3U0ZZDZIrUGohvLGxsXzbXhD5kz+FOvgfjsVuX2KkIyBygTyVoWA732BAo8uezGbWX3BhigeUFAJk2OGon0+BPRwITLGZGN47D1YcCHNncK6aJhQ9uF4/6CfhuavYTPGSGCmDI6MsTWdiVSW5n2MB1C0hmNmkIae0eFeiNKFoQ1qJqOXwqkGK4n1VDxHjNXV2TYGHugQJnvLP8qKZJfD4w7vG+GNEAR9KxYhh5huwI6eDfU4isZBUznjIImrHyaCEItAbuAF5NfjQn4cFw03/MzVkvh2y505dQWwJLY7JyOFGUBB4cSy3J69tY32hKL/U+SBWtgsUFmpwNJVlZHkoKZYHG04GjDNqnhY/FImivF1WHuGmq8BM6zRURSBPPAu2DRldxG44BIACgk4GSJnlAQ0GkAy8QIVgAYMAAWCi6y7m/Rcpzwx62oPJ+mCImsQY6Pb1WBQP69YjpljfOJZQF1DCa3U6aP7wv79JAE23eW75zHOUKjwxGbJ+jHwEFvZYmq3wApsz63ywBsNa0kxcVe4I0QDPgLaRSbkcu8uqoNHYuWMzqSVevlhPdhEq6RmSCgAnxJYa8i2tLQ76k6TDlyogdeGKjd7AIOn5fA5Hjx5uJr8McaPTOsw9v5JDgYr9k19IIzmzH9ZCuY4g4mdsaHRQmzb7PokABem4Gmf8iErVAhSOMFPfSYt51y2toaJ0YBAB+qnksMzQwVJxQaGzQVDForRlACI2Rbkm41gu/3bPTAbY+D+9sT4PrB8S7vxDaDlMUkTTTEOSdM+gMQdaEw1T1Z5doD2nHUnjpYVKIWjvOZ7j09v0PzxtBLOq/35ulp4ILDZ4LvOAt85Vsh1XpSMF5BUiX0wDQx07KiuFkpwkHmWM0WJqPkjz4oiPxm2kRQHEoTlflo=');

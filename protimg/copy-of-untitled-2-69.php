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
    header('Content-Length: 1155');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAAEUAAAAaCAQAAABLXFmAAAAESklEQVR4Ae2WhXYjNxSG5Q0bZiTdK2nI3nByshxOFkLLzAxhZmaGMjMzHW4P9xH6UK4dclxuQ6XPNJ4ZSRd/Ddl+gq5UXcl98WQ3sfzsIu2jc3Q2/MIH5bFk50mmeBFGcAAvi3QniYTIi4M2/QbZWYQhasQIXrCBRKGK9IbtT4RbedaO4AkbgQLyC/BJzCTbh+3Ih2Kcz8E8jDEdM2FRnia/CHsA1WSryItL8+uNRk4kFrwW+1VxuhZ0BV3ylOoQnWj+iiHn2CjZQ7YClSpuW0PyY++cw1fPpLB5LCPrYJb+TdC1EiniIlGI83R2S5oZc0W7MWTMqm6RHlmYP2sFoparxudEtUrJi9Ofjvaf36Ez6Qlks/AS3idbZYvsk6WRs0rCYnR/8H10KuiCSlmaqmvPR86nJ9BO1ja92dTIUhgWdfIBjMGVaK9kqz9NK2IHyCpGMn1eGKvRyaDT6+dz2CI/QzaHUQDDokZdgjFem0x/2rqiixBvu/vc6r2FsBRJFpazlpV48Aa2EDq/GdR+Noj14hzvhja0fklFsJcQ2qPnE6I8vJb3pOpkHaiGKkJ4sfYCvx10bUasAtgDreYJNkCnMIv8CoF9hOjDDscKnMFyEgX2GgW8j42guSnNlI9xwC6GR2yJF5PfZHoPe8doE9VZPhJFcqL2HU6II39m3w7VocdybxAAKOITRjmW82l24fc3O97nfVuq9T7R7Iqga1+8OE5f0wc3OHfkMFX7b8VYbhusAM+BQqzAi6HmrmbNtFsf0qb0p7wveV9Nepb27POu+igfy2Y7UzbBkzx3OD4BtjH/yiNLIlaL46H2nsZ8soYLZ+3bUM1n8SKdkDfEYVUkjhvn9Cbte+0j/SsYxSkYgmHohGq4CpVYzovFYcimyWhq3HLnxUVqao/ocM7rN8XHqkM8wW45KIbscTWK/cIIm5Gdqb2q34hUk1j0p7ElWcoOrOmFKlZ35FEnaZ9X+1gfYG3YLIatk9qHMMT7zXwnI8+NZWuqzc5HabErmUYJonysf6GNQ5WRYzvouxWzkkM+bWWrIqvDXIKCjaLFb7IF/U1VRLtoF4nC90S/SUimrTroY1rGBkQ7u6t/adz2fAsPzb1wlU5DNXvTsQlxOC+Gx2xEX2JjkXpzYRlbgCISxT6v6IQnxk2z2+o0m+F60GXlRp7BxG1xghCsCJuyMXV0WhhOEvvcbBbj8Cr287egEy8bZbSXd2E3XpYKqsTL4iaf4LPYKE5Y/uTEjYvGw1VDkCj4qZBxhf4T1rBdvfeG3WOe9b7q/sHo1+f9Vjhl7Jnwk5k8xDXiUkURU8JiWB6rFSQnWn5xWKWuLRSBn8X74oQwyB9BlvAZ3sg126Ef4Dtmg6pXjaKLXguwvDjIDjBCHFuWku2lPBbLcAab95okBFTJQ8m0PJYXQ2FeHNkZkhPZBScDrsA4r0OL7Cbpmm/YuBVquiSywv/8CPbs0j8F9BhBAAAAAElFTkSuQmCC');

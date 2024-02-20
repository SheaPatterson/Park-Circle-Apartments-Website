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
    header('Content-Length: 4148');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('AAAAIGZ0eXBhdmlmAAAAAGF2aWZtaWYxbWlhZk1BMUEAAAGNbWV0YQAAAAAAAAAoaGRscgAAAAAAAAAAcGljdAAAAAAAAAAAAAAAAGxpYmF2aWYAAAAADnBpdG0AAAAAAAEAAAAsaWxvYwAAAABEAAACAAEAAAABAAAH7wAACEUAAgAAAAEAAAG1AAAGOgAAAEJpaW5mAAAAAAACAAAAGmluZmUCAAAAAAEAAGF2MDFDb2xvcgAAAAAaaW5mZQIAAAAAAgAAYXYwMUFscGhhAAAAABppcmVmAAAAAAAAAA5hdXhsAAIAAQABAAAAw2lwcnAAAACdaXBjbwAAABRpc3BlAAAAAAAAAKoAAABAAAAAEHBpeGkAAAAAAwgICAAAAAxhdjFDgSAAAAAAABNjb2xybmNseAABAA0ABoAAAAAOcGl4aQAAAAABCAAAAAxhdjFDgQAcAAAAADhhdXhDAAAAAHVybjptcGVnOm1wZWdCOmNpY3A6c3lzdGVtczphdXhpbGlhcnk6YWxwaGEAAAAAHmlwbWEAAAAAAAAAAgABBAECgwQAAgQBBYYHAAAOh21kYXQSAAoGGB1qf+VQMq0MEwASYLTB5rOVPGmxvw2OiFp7MGyHtCKxWOksboovxKRMjHHupGWloG5M1vN2nehLeoPxKtcdvQ3yj9yuVJsj6AT/gaHp9MNBhVT8Pzh/SU4+tLPiZbUbw+ZGIMaFyGuldyDSdkdBCjsAA88DBVNMo2tFQFQH96MOTDsQJQgqxkRUWNniJ51XDexzyJ5LSof18cASlDNy1toGCSi1HQD4j++UwOFKMcZk7csichjREVbLKhnetBo3hdYPYBF4yvLzee62SrJJfLm48eUy3E0KvPiGw4mYUdN8zVs2zce3uochyWeDAk7MkQk1GAykHfBAuduS+KU5rHzmOUZG+W4eDL2kNzOVfBqJgarrEvoL4qLTR9xbUQSbP+V3Sd8McQb5wsFDA3yvJVxvzGXl87YgoogC+41we5zP1weIfDQ8shIkOTPmUDloFjS9vv/XvOWnfVrAIZNzVe9tsXbzGuIG2yvY1Q7+fiske0kMxPiqTIrPwX29levprJ1SF5onjQ3Glj0Y0vsj98IRK8FdZomnTxDNCfsUcmalxuFHdtMWat3JQYXE2G8OVcu8Xs90j0NEImu/mJh6G3vz99ACD73SSTKUAXJ5GZ2dRnMRJrj60e2rtzjBXVUXjP9/6b570hA8uFDs4IJ6GWs5uiCqFFjLiPEUBt5YkyYL1EtynzNB7cROdltv08c+VitYQFAx16lbPxVd/tUGzz4+EFogT53OgrzAnCg6MsmS2Hv3CNEYKGsSkfwPNTWCkoiAsorcc1+WDYL3v3cq/GchL7T70YQwD4FhkPE6TWOZmeTT9DvTQXtZLsq2zrIMqbToBdCoVkgUTeQy6i1jQyVS3jEAceN609jOY4fLzu2AIYdtzBUSOR23gWNo3blHaw7cmAO+0fzRZuPs3sCrEUIdZJf4vzzOwOmU/aXPmEwn34qYqhH52sJjq3Egql6XvyRbQiFGfqkw4E4HseDOe74zsCJ7OrPHtH07Ssmjicl/yc7wr3otRx3XP6F727uN5UGwB9GVqKwfKSmU73ibNKGkYDtsbklgJLjYC1RPQUlyQBX6MgClmOGz0V/tB7GH9N+LeKchb5sbsnsN0d0oOfhzPsmS1BjKwzUeH6xBKxDUY9dyGuR1LrVmfmiIb25cbcW35MX5o6A9pT8ou7LrL1wj18srPE9Sz0P431bVckCUmOjpuD7mRXJ9fVEUgA3OVTqLaT5ox01RsK/nKpl014/XBYDAnf/N9t0wkKqLmvbWdmMkSsrnFodg2nPIo4VxrVUZ90WNbFPYWSxeOghuq5+6BTLzv7j2eFZARVblNNOHfACxBXmL168Iz0HEENG7io7NFSPxkQwHuAR2mmFwT+3janeeJNpdfh5k39f9sxxGalzDZn3ABDXsZGyjZvd4bCAAOoWGSTDh94Giob2MQYE+jRRIrYDtBol8y4/sMVS9nqapDSclJAapO0q/kJEKBU3RQ1AUROKoRbYNuI+/eMlP4EkemArZR/MgbZLo34WDJ9Opp4hgJ6TdCfsl1aTLCKnZ5JSg+gWnbHNvDf2UqULAJMiIhC9HlalAaDSzQM3FDsN2pck1SSe+eRov0Zjg+mZ27fsxLpZ+6rgioJ0SbbXicSOEtxPufJGXqKT7YsHdH5+R8qqZrVxwR3uhLeRvjL51LMp6fkorDWiFdcm+3DtfsZibz/9F1tT8OS54B+12N215xIERryh4VO1ordm3Pj40hYucwQDXfNKws+rLveKLVHyGAcdGV93Rf2sAC3fkBkWZx9wTFHNsCSjx0C+lZHOTj9SW778AybcEu0EA/HSD9A85VflndWPULPkNv3Yn2M+Gap6jZLWH2bb8NEN4GZxi9sR9d9XNKBDLQyw1mPW+LqhCt1X4yG3rV38SN14EidlxB7wFfCdVl5/63g6pZIKrbP7x3NBdu/alOVrhXMewCdzdoILt1XIKUbdg/4qURpKPbMo6KfnC0iiO+tb+LFup9k4KXkzZsMaAfT6QBS9GBaRmMZu/9gcx2hFexGsvCT51QempXNCi8ALhx8qoOb5NXyn6nGDstXtMo+VMym7IS6HiTjFbzQlMMf8XE9DbQFp4F/ce+z5GSHK/Batd5f3yq/bAEgAKCTgdan/lAQ0GkDK1EBMABYwAAsEAwfYklLu4s3NRvj1OUCclbysjROq2yha1DWp6MKgZU6nhrYPyj+6yXFF1VEYyxX35cnFpImWwGopX4wi9zA7kjxt5derSNPk/r0grchziQ8jIux4lEmbGn08t/uYUcLtNJAPKe9fxk1VZ4R/od0kYAMTyGAFmungW/Te0DX2TEGbQp3ZOfNMmE9D5Y3jT7e8E9V0RTGJlLaks+hfoy/y1RIaOumg81ibg/kRi1XeWHmPdHMcgv3YiNse6vbGXAIHQaMehGNPjcF0WeL4hN9qMN1TIpaGInYieHQWcJSgRDIWZYSwD99K9fwBV2uGf9V23s0/lGCfD60y5MKlzoS++ZVNSZjrjOb5az/NdoQFjpmCDW121TdxmpnHTZDtTl54KbIc4eZudcZiIJurfoeaZ7ux/QTdeXZ3U3XO1jEDFlqIYOYhmI3yzAFbiE4qbhPlS/6wUbfdpEvsUyDFBlstx+wtxKwaCTFTBjc57IgiNk6rQv3bV5t/JemxApPJxSvy9xovX+inyBF5ay0pyyk9BFFge14T6mjaffEzLiSZOwFCmIwEd2rTVqR+yAtKSS6LPiNX6XQhvrRraKRrF0CCJK4Q+xPAFggvcH9NkYTz5L9xbsOJb/fBdjmEiUaCTnJ3Jyd7WO43OR1zu7oZcEw4oEa51VB5XeH4+ET8UF9W594KNcShgTThHR9uhuqvgVkTLWpk2mIBYnD9oXkowhK/6AXA7B/hN8ba3DCjBcSQeulDqX3PUr1T1KWZf4vG5LZaM21Jv93Yb/FOfYS7tDzhbOiCO2FqvySzHTmRbRddInfS90lidBG0+fW4IUN3//dJR6e69VZcuEWlulj1Fm6EULZiL/lB5WE0/vnekvS7sACv4bkNAEzmDzalj3aERMn0O1/9XX2FQOZaBTNaLyMRZFez03V6MR7jVgd5OPnZ/5thCXwjLqQDO9Dc4SMN0Qpvvy0Cvz7Hb5xwbb5RQVkmb51s6g4v6FH2pRXXIqKx2ide6WWbFhyF+tNxQRmHsDkQTNF+/V07tC716SVcn2DHj/iYnYCq4M0aE/qGTBJy2nIfGW74luIKoJcfyJqgIOHh2nbKRqnpUhH1ZMWn6qvj1JPadl8s+wUWHvlORLpVnrjggO3553uStj7OHmeHewaN3bJ8pIKeJwO3UJQHxs/UxHkEHj0XlFyIo7a0Ze3JaNL6b8Buwcv2HO8CwCoCe8aTtHfBZVN5UDO5e1lT9R1qi2TU4hPn76w1jWF3QZBjoJSpfYxaun1xl4XZaY4Vl3+qvxBFmk1F6NrU6ae9Ai61DUiUb/3zepVgvP84xk6dl2yN7wu+Ykf25TOKc6DOW/sXYBZT9UCpWsZdywW/9IbgNo7npJc9xxl7awgg+UtZDBOUonH1+5FV/jhEtArFJZ3bGAQeiZCZrYx24hAAEdANXIbzRTbT/tK89/hBWBXkpNKQZNl5HNiKsffSbfJZvY+3HFstzoDJQWo/uFQPGHhJzMQ+nN9zKWO0/ekf+ATX9D0uAZRwZvcF3gsKvb11dEjc0KOLkxP2rCIWY7VTJ32TP0QxGLUfWTzOZaaf5MwqHNwOcy3Vbochw4Z+l3X7g1Gg+CS0vaGaPIeQhqH70mXrtYOrpYuscjrtW60lhPDz/CoVzAQ7s+knQYwxbiZub4mJ/7nDwPjLy9abI1IUrNKDrZNeDhxlNWFzHsB4JHjeuNojKNcwokkPNQaMMA44tkKtsUsKlKUvCpNJRh+FBiDyMBFa8P18aerh+h6/nwbA7TwLvREFsIN/kdivJFkswO/MT1Voi7O2rPiu/LJDvDb6RdOJdJPtZjcttnQ6VJpmsLHasN2MLFBMkbedplLS9XT0AIk94Wp0cMmk/GAr3G6yc2hrwOygJ+XlkLPVmpGixfeo+jg9Ky7HN0zL51lnBRiSEF3W89Q3sWkIM8pi2hH2l9SKNBkGq0ti4b68QYkTGpBNdTPuWJ9HWFG2i+7HVNfVI62NMPrOes01OV6GAQihv2/57pieK/QKLniDa72vXgoCc3ci0rsyxcz7j2G+Mqit9Kd6e1Vpgr0FKbNe3wVKMUycDNPjhEik4rZ4kDntOGiY0fpAo4xwOZF7aOvn1up8YDqMGLVqNSftJYvOdHk3d7Iml8jlPg3dxHnOirpMLk7FOXHriwUAKOKVByfup1tkazPiRIlDB94XtmOHUI/V/t1eNN/4WynPGs7mF9UpnBfmDdmp24NaS9BsV2DiYU7TezAYG16yIl3Qwm9Ycm1jplkIbFVY4EHqfH+1C8RQ8mwoPDbAt+VENGY/eB7YU+T7Rw9GpRczZIabbhTvjID7/yIwt5TXgft3ZOiQnkqX6HOKmqPQRNxWe42dm/dd9wZrw90ELkVn6ZYPzZtRB27Ps4+zz0/7k4LDlo44iCpq6h0rKP75wTbHnIRSyQ4V9ArlkWPp9cfY3UtI6rJDcdNGsjuDjSnWDeN/FaH8Qp5+N4HxN4vbEbts4VQwknwkYytKdvIMDCECXET9SBX/uNG7WtjAvDm5RVlkFitILb35kCcXmeYjJj3ic1VDeOVQASSR6lDFFiH4UYGw6oizA8qAEIfFabuykNQxemr6JYhNdY8Oofglp/L8rPnEEyLAxLVkR2GptgsNnXXrtfSbicaFFUdlxz26Y+tztWO2oi0uluU8sOKVJ1g0i8e5Tn1AswhHtElWyhgyhzVRsjMSGsSDqZ99VOZLkRHAo88OiYXBpbUH8zIHTEgbp9mCZ8gN+t5RQwDioEVbANuSXbuQ673L56bV5rcdfatkbWba/eGA=');

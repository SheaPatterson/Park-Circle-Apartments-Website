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
    header('Content-Length: 6090');
    header('X-PHP-Response-Code: 200', true, 200);
    echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAANQAAABQCAQAAADL9pNdAAAXkUlEQVR4Ae18B1iT9/Y/Sd498mbvHQIJSSAgIIhIqGy3vda9rbPLrZ1cO12/W+n037rXve69LVa7rrMLuwfugZMiMs//hlFwEpB6fbg5eVbevOO838/Z5+QbFKAWTQECHvB9n4eTuwA4aJbR4w0Zpn9NuUyyk9wt2qCZ4xjQ0QaCh4C9AAE/m4mONT0tW8F+T5ShgAAKBBDlRAkJGKBAVsq2RKb8F8EKEAgyTCEDlCvokz5A8ErmR+la7TRL71Zt0529TN11PYJbt7L1kX9AX8ZB88EkNihADx6iTKvtKelHRCkGxA3xF5oZrm4pljwM+HcyiQO0ug8RkG/Jph4giwFPNExpHyTbRZYTwJ7ULHT1TNMD0uBViHmRAEJHPRAWAwRobKL6A+YqCVy+Iad18jsM8Py9doiFvCHdG/BUfzlNETuGSQ9RwF7TLo5NX0wDr7EgC79DvgsE7H+psetuNE8TnqVAeihs5HB10xbbBxSeF9Covwyk9GBdDl1EVahWxnkBbfqdntBQ1xUbAhr1l4CUZlbmUDeoYt3b7cPud4kjh2LgHNjsTAZosFz/GlVE3tD+o6sVePd7t5Ukd4w5MZxrZiYD0V3I48wpElTz24cArzl0M/hZBByjG3FJgIAPgpoP786LmhQj+xgH6d64hObyKN5ovFj62Vbcj1MD9BuR6nEM1c2RbGEP4F+TX4k+VS0KGzJScasuBT9Llguv2EcA0nyBvehr4o9UT4MnBgxZ27a6OdwvJOBAAFUkPC89LTnNFpAVODCnw/rWaVYPg2IHDtotfWzN+HRE808E7MPveVKA5lL2gZKDFNAlsr2W7JhOHVzDlEuFuUwu8wbXwxzdW/IjVunpUH1uQrTwN6IieBygzWloLX8XgP69exrRgCY5B3I/UCA9EDpygOHOpmxACFEo2+NLQ9vEUAXMmbgU4DVngO8YioBi10ryf64cGvaYcUJ4lD/nRidIPqVAmRufDui9zlOsEeYDmqphT3Pfd3A0L8eerli56Othyv+hpkKcKaSXZh5zxhesGXMakvpsoX42AdyPUd0aDgmsk5gbOXLjbNm+7rrm5TqmPVFE56fa/kfMlydBN0O1T7fFsQSBIMBL9LNGM/e+JjFW9BUBxlmT/Uovo/oiYMjpYJmLNi/nbb3UFfJ821b/A/lOqk3/PPc9V6TcHJXeoY08FwP59jbxwLv3VaGDyWLmtCcL+P6WdnggOwJI83KfmERfpq7GJrZ4PYpKl62jy4TXdG91Dj7EGafRpdxPrp4NLScg+lcxkOzrZPbf7+nfDwLhqXnsnUA3vGTJapI2pdCX8cLIlBYNUrbI/rjoSwrEv4dOmioFPHyg6CRbaH4uW9jQlXmYZj4K6mXvMI15GnuSKqRKHENv/62jlgBNThN8UyeqEL/mSmvBUV1fnfUF9hQFin9H9gccBHEpsgMMaBd1tTZ89QJCvgIFY07jjFjYCBKyOurepoqTkm81llGPoCCb0dh3iOhHlNIXox5psSB1tOlns9coUG9JTAcEeFke7QYG5PvbtPPH2wCqXIqCbWbjYJpJC3+WHgBBrFn2BVtq+MA2MjG2rrXnHCQAxUuNi05DxmIgzH8ktoWGDe3DtO/TJTTolie39i1UH6PlfbaS+83VH1D/Fkj/TmNh8pFtAgrO3lV3wK0vkOUI4KBaPZyq+XUiHwzPNMazGmejIDnY0dYiQWrjUs4jy+kywwcZ4cD3lTBtLwiv0X+YXswW+d1EmIyBaU5j29ypNvKK6HAOXnuXjNCQJ6Rvql+pDf8trwsguK+/dxsuU6xFQb1mrKQFgtQ6XL6AqKRu6N/p5vCF3bmEc7joOAmqBZnWRvROM3FQL2usNuVh0t1YRUy7u8Ovm4dAeHs/Gxke0dcYmF8FtMWBlByhWkRUksW6OenBPpAAieom+ZIAyZ7oRvWBhinZU9JD09nGPl83XQDGl4F3d3Mq345CgtMfw+voT16jLoc9BvwWBlKaSzWPBOqGISfTWgWSID5JsYcA4Q+Ono3TDOCp36OK051/prsj3fH+XGV/EgHF+kPovTyOKI+4OljecLdJ+z4GogMp7hYW3WWEaueSFXSZ8d1uIVUg8TMjtSsJYC5ZJzVOL3zU0UaVBf/9TwNkJ0C0EHgNCUrsCBzEn44S3+us8TL6CvsdoPd+m9hHRHkY6N+bxLYokHpadXPIEhpM87uEVS/noxbju1QlWaF/q5e+Kfc0Ps9eH66u/aZM4QGxvKEiU/hoAkT/7qG6953TXL6S1b0ClOmsZbpPwCL6tahpvQFa0xt0EQX6ZV091bY8WxaSzVwjQL02JRJ4TTOi4n2KnXWeQdmRD+TSe90LEMuLGEj39lc0dO+Ijgjo3ry70MV5xV+iIN/ZObQFgTReZn2euUSCek16TUIJeMQI0QkcZPvjUpouj4dQOl83o97idheA5P/dHag3ON1iDFT/yhb6k2MJIHjY3QpPltk4ECW2SS0oynuHCX2KPUWCckdyUg1IgrYZ8kM4cMfcfe7vRWfS7AXj83Xf3X0EoHrjbmenR0gP42B9xZ9nAk+7AIU7Vb+BH50pzkNA+nlSDPBaTBU8tJ/wBwLkn8ZkAFK9AF2tmmUEMOeDn2m4eNpwfY8+rZte9900SgCWp+8cQtsfp4qYcxHd/AuhAZF8QVzvpbn1eG+l9j0M8GLr87lEi+nKRnQUHcBB/HXEY4DWlIrCLbOZQrJEP7OfunkmfNhvVKvq5Fr7sgBCO99+XleTYg0B8o3+tz+yRfRF7itAb34jZy/2dwRkuYlRLUSXgB/TRrKNAC7fOTyXqJnjtqs/JCpwUCxLDGuu1wSefCV3DJDab7KlKES7bgUzdChdQBWGjG5Mhub14KBZUJ/PjFDFGhSoAsvoluGXqiFZTAB7OWTqlJpMZbTKMp0sQkGaG+1t3uzd1pu7NIStlXjh52TBcK4+L95o6S4C5FsyGhmbOfug4BhWNzlunUBew0C5tIMlqGXQSIXhdaqYLje9OVhfO6HqHsOdRID7ztmn+WXxSdzZK7OmrDqJpS6IPgZBHS/G/yMr2POhgxvfaNfPIiqTnTXp8SOSgyiIv4rq2ELypZ9wx2j2NAW6VVlu4FXLeEKm7AACTEHI1BzhX/38xDActC/XGjxXf/YECbp5fXVN8a+S/cJffWLVy6SbV1U1mbCYbiGhQ2y65BAJik+9NXkR8DqH6lfgQFQY3+1jfBA8hPTEwZNaFYg7FVsJkB6MS2maoR0rYa6qlwFpm8heIUH/fi9TUMugrBDNChLEv0cNAqz6SI7Q/iJTiIFyc1IM8B+Mb9S/RRRnC3OJ4KnMDfac/Ymf8KbeKzYRBcVh8TESlOvbtgJ+C5nutk6ii+hi67RsSa12xXeTHkNBdNTTFZAHl7OJj+DXwidKvxFeM0wfpLqfmNU8JwgEIP08pqXstwL8VsmiIySoV1U3/nzUOVS7Cq9KaOdSD5KXTk7iBg+4S5pZGSbg3Q/gtkl4CVbmmAzYQ7UFlgCQbKaboq0l2hUSo4hH4oPi2Xh7qyxVg287QKp7iwDuh+gutXK3iQqeQhURlZocnwt/kDRIpdzBA8XuAVp/RSzO4fHcftTjlXzOBx7YZvpj8DqzYX+Wk4F/PzBUA5FLDOf6K1IMXntktMdr7xTczzxG/5x6tnK+dL1oH/sNdRy/jJUiIAAeBEEQ8AED7nJs9D1f1NOB/YkE48zJ3J+N9TTxURwk22OjH2zeDqh9kPhkEOC+BqJf1EWvXCo96ep/czjUtrViLXdBtJfMp4qGGv1rWkrObKqyG8FdFIuA35BGrCSHSjJ1XntMTHh7e3fLEOM4/TRVjmyxaD33EXuQOUbnkxeIP7ByDFBAAfF9fJcBUvUdv4FfoU5TPwmPivaJN8uWqt4yv2wYEdwpjb5HodXwJgGS7+Pb1zI3TKefRwB7xtEfkAcbbXqypJ/LD0W8gILkc/+eHZkiPC3bH+OsD3WrNPkmCsTHoloBKt8u/9gf35TupMrMVSXhPhbqkmQPCKoAQQB7RtRd1z4sLiGiY8hA8wTddOU86QbRfvZb+gR5hSjDAfvzgwMOZAVZRF9g8oXHuIPivbLNyhXqD7SzNS8Zx/8Hhn7Wbq40Z0J0ZEJoiqGb4knhVrwKPb4fypAc4QvELe/8GTyg4UOF5wnQzvUZngdJ7cMUGyhQ/TNbmBlJgPFlv2BqTxapVv9G1NqBIZrQUaLDBNCnLeN8ZeI0O1VmfaphbXpaqfqIKptoAzQlTn40CORfa+YoV0h3cofZX6mLRCkO1XqBVf/P8QZzjvtB8plyg3Ku7nXTJNsIRy9PVlRiu8jk0B6G/gpftApoLQTNYJGA7+5D/yE+Fd+1Vpc6uNQ7SZB+GtdsxaGuJvMYt92PkZJRdDFzOWSYT/pDxuAQ7fUrNjzKXjxN+d4kWxLXWbOUuYYD93Pw2AHSmtmjtwnoHQ68Pz2Hz/agvxFvcE8re5iz3AmJkX+zTdAuFB73eQn2tPgoURoEGFAlRAl5jT4n/Fl8RP6RepX+PfPLtqdd/aIz27buHDpcPY+tAoL/QNwCIKYXKdCtfVJX8x1zTGaLRfmuIYDewS4LAM0lpoiHq7sbu+uGy37CQdDw8lsn0AUkuJMakmjN3+ly7dyupmrxUa6jL08R+2MqpbvJYvcYyxTlRvYiAVS5ckvk3+qqDt111CU+KPcalxkW6Zer16i2yvZKDnLHhPlMAXWdBN+HArLKmaOgzDWuQSAIFJ8nth9iSVcPlWQzgDVgmh4ETNp3mErHxFpQOocr9jPF5mnVIyk+6zyZ6xyckOjsZR2v/4fqX9K94m/Zk/QVqoSoIMqoQi5fvtM88V6thrmo8kM+YOWOAQ29ZuhjwsvhGcCv7dwyBZI9/uU8Hpt0A1cgvML9qPyX/fGu1puvMr/A9610nQOvJIrpAvZ30ZfSPcp/at+0TnT2jkvo7xL+iEDEeED6uvEK6aFs2UOVM2lnMSVtHgVejV8axV6Sf9Y3DLBHjOa/qV+TbRTlMZcpoKqkjilkT3BfifcqNxlX25e7ljqXWVfKtwrz6ErmasjA22EAJFUTFGR5mg9koeuxhueIxJ+Y6k0btU5GwTyjJrri+bG1qDBbBCjwbx9XYU6Ivk5Oiox3xrhbxXhah3Ww9NJki3IJX4hQd35cAl6ue9tnGOXbmAtZITVOIVO10BPzp26qbU85PXfj4RmRq6NpUmREUPNTRDoKurerFzUpWb3Dp/KiHxT7xD8Ji+hytkD0pWyderb5ibAu0bEdLGOkuUSNCaj/QTuHSj5mLtw8XAWodZDm0+gBj7QhiujTMe39GmrZhP+hmx7+aGpaUnJbr2kRH1o9GR4lXSLewCxVzLD1frJJJWBHLwSMz93x7ZOle2xP1i6y8Dv2R19a4hhDQWTn6l6zLgcD7gdvcPU5Uensb3zQvHUHkeR77ZoZzFkC+CD5FAT+K8oC4km5H+cH/424Ls43vah/WfIJBnzAr7N54o3qfxgetyelWKazgPgXTKgX0Vcmc3WPd6ZLD8qOOFKSEulr3Ddel39sR0dyR6pCWyAA9XFT4kmNjBftor/l8snrGHCH25mbUDPfiVRER956NDoyK4S+KKjpT4FAvQgFV8f/6FUUXWJ4zQfFZE62EQf1ezUBicAxFC/mgWS/V3drKBOZpFhGlNNlqsWRnRX76UvZogZSYcEocetwR0/9q9JNzM/0NcXOIWyDAanXbutuXoIAD6QHHcNSbXlY4+O8R2LxEtXq2ut6aJVLRBeMzwLu6kbdkG/rr2jM7HgbjzlN09U2mPueByFvAL9m+xystzLkWQHIt+U2MqPz2rES9tubp2dTLPKPje+6+/JAsaM6S7MPEoBsM/Anc6Jvxd/kEr6+l+wjtMLdo4oDpINDP8/n3cyzs5n6pr1zsOUZ7iAGRJny/YxQ37nqNVTJaNWdtecdxusJGaB5W/QJfRGt8ZjkBfE+0zNP4n7VAAzvIaD78LMm7pswQSH6Bi9NiK6Ru17cGfk+rx0Q6/N0pe7NPKxpBRjtBvK6r01ZRydI5jRZMqyRZSzTVB5oZtY/Eu8WnpJv2oqr38Mq49tXiZacOYWWt44DnuZdFFp3+U8yYRUfDgK0xDBD95Jqnm+PTF/Ybnkd+NVLPpfyeoLHynLJcgzoU8aZafZqc9jHSFwVfr+AuBmgN7i4BNtE2XrmJA4o4ECfl+zXzg1+JrxTvHuoBAT+bTEYIduPgf7/AGnqdJ9qnwDM44FXNWH3obDE+gIg01nVKuaGfbgvc8kw9SAb3zuiC+Qbb9btqVL6EvvTTLpxMa34MwQ8CXVHRom5HyQ7ADmEMvls4UrOtwaeLAFI94DA3h0B0Y9AeL3ccbJSfIw5Rd1gr4i/1cyzT1XlCkC+0zHKMdr0umIDc5wAHJgC5XJHt3omH1dtwkvdXepUIMttf0K5jjmLAQZUmfio/n334OSIyRwgjQr0c4S256jrZGnImKYW/rPc4iM4WCYD3zcxLjkqOuXbJcXrEueJfk/8z/J0MigWU1dNI+ovnT/Pcg7Awd3nlv1SxqL1xsaAF5XoVTVYfTfgxey39bXaOhGFVk9F9XxSqMnGwDU+5AnD4rjHUHCOBZ51PFbJFJg/pIA6m5TsKxoNUmWLqhf1J9zyGnMe8xmrCvaM/CPjtLiUsZL6ojSJ1a8kb4Q/6uNtExWfZJwp+pYAFIgK8RHDmzHde5kAbUIeBgJ3H/F3KIgPJ8Q1tWwaMZL+gzkf0c33+FZu9qT88x4G4DkfFV5RbB2kAl5IT1m+8nOkUjatLgSWHtDPBF6DevApfXGMtP6x1nH4deGxusgyS0WXKGY3xKO5HQ7mx+ubIflWn6zIv5lAZzPSTxEgQfdUVghWpjpozQEkJkW9WnREMz859E7WZ4o42Cq3dTK8w9wubH2Fsq0CaPXy0wZPV/273O9VGndcvcTVv3MwoPeRP+nfxoC6an6+qQOTmWHKLQTId1T/ZTrDJDyl3rKYBoHhJbbY9JLPUxpy5L86MzLa01D9l/92ttEq9aIgkOYBA9gkdqzkbnvdJcRhoJ17M5yadzFwp9R9b2XHQfFuQ5AHWy1P37wpiGU0/Zt8qze4GmzLa6404K3ERId4IF1cG7o0pf4Q3hsFHtAlbAUD7CXpbsvUNvENb8ztB1CmkbpJ/o8u3ppCmn0ms7h2zy7gq9bI9wOWzahXiU9FZgKvh0r1kXJ3D1UnO3dJvdQnfzFJ1GXpd9QF30qIj4vzhQXMVfaYfeDtsgk81UIM2ra++airjatb/dceRISOamNsSpgygb79mW538LCx5H2VkqXWEfoX9ONDeiZGZYsegh4yIOGPCvMwkO9o5649ls3ITqcnxrvlXyr2pOmDgqIT5D/p3zqE2t3Cs8rlPvcPfPXa6qYYcZU7JF+h+3vEONW/+ICCYntMu1t3gsALZXvvo7ESIODHxsu2YcCcDh1SfyGflHMXRYeEBfrXQACIZayowDLKZ0Zsk0wjgO/7XTcTA+KafE1ovwxTbcQDAuNE9gvp6vBb/IFpLAqO1KZzGdgr3KlajANZqp9969/FvClIOR8iXwQ8NlGWy112ZL3BAVINbXqw/lXuPHfJ/Gqq7fZU+nZ/AHzJZzJfYB6gpoDU1ap7iywjKzXz2t80Yw78vrrYjuLfMaAqxSfFPzMg+XeKGxDxEfm26F62pxQ76TK6QDttiMZ/txqemC5pApMBkAaZzLPoIhK0K7yeWyU9eDRVSIBqd7uszpGR7Qyd3O18OcskVnoEARwokOQZJ6Qp/nImAyD1sVhnsX+QoF5bvfvKrWSYQp2zvHh7njBU4kwOy0xxP4DhrEDg0MlumkMXESDfGtPubuFmD6yb9L/W9QwQCBKiNfPJMhzk2+NSAoHyQ/rvDVdH2VYCiHLlP2MTH5Lh3wAB4uzk6FarRykWwyTuBwKYk/rXvPaHJkQOUCuZdB0CzJUubVIiLaOlu5hiplC2zt49W/hQsRkgTwxZxgc+sCApFP+qXh7Ss4cqoEcPZfjdxqV9TNnTldbOthX/r0dvAQpQgAIUoAD9f2pnDAkW3uowAAAAAElFTkSuQmCC');

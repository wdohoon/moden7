<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_PATH.'/head.php');
?>
<style>
    #schedule {
        width: 100%;
        margin: 0 auto;
        padding: 300px 0 170px 0;
        text-align: center;
    }
	#schedule h1{
		font-size: 60px;
	}
    .schedule table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    .schedule th,
    .schedule td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    .schedule th {
        background-color: #f2f2f2;
    }

    .schedule td:hover {
        background-color: #ddd;
    }
</style>

<div id="schedule">
    <h1>SCHEDULE</h1>
    <div class="schedule">
        <?php
            $year = date('Y');
            $month = date('m');

            echo '<h2>'.$year.'. '.$month.'</h2>';

            $firstDayOfMonth = mktime(0,0,0,$month, 1, $year);
            $numberDays = date('t', $firstDayOfMonth);
            $dateComponents = getdate($firstDayOfMonth);
            $monthName = $dateComponents['month'];
            $dayOfWeek = $dateComponents['wday'];

            echo "<table>";
            echo "<tr>";
            echo "<th>SON</th>";
            echo "<th>MON</th>";
            echo "<th>TUE</th>";
            echo "<th>WEN</th>";
            echo "<th>THU</th>";
            echo "<th>FRI</th>";
            echo "<th>SAT</th>";
            echo "</tr><tr>";

            $currentDay = 1;

            if ($dayOfWeek > 0) { 
                echo "<td colspan='$dayOfWeek'>&nbsp;</td>"; 
            }

            $month = str_pad($month, 2, "0", STR_PAD_LEFT);

            while ($currentDay <= $numberDays) {
                if ($dayOfWeek == 7) {
                    $dayOfWeek = 0;
                    echo "</tr><tr>";
                }

                $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
                $date = "$year-$month-$currentDayRel";

                echo "<td>$currentDay</td>";

                $currentDay++;
                $dayOfWeek++;
            }

            if ($dayOfWeek != 7) { 
                $remainingDays = 7 - $dayOfWeek;
                echo "<td colspan='$remainingDays'>&nbsp;</td>"; 
            }

            echo "</tr>";
            echo "</table>";
        ?>
    </div>
</div>


<?php
include_once(G5_PATH.'/tail.php');
?>

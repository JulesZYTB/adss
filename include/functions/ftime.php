<?php
//// دالة الوقت ///
 
function timeago($oldtime) {
 
    $difference = time() - $oldtime;
 
    $seconds = $difference;
    $minutes = round($difference / 60);
    $hours = round($difference / 3600);
    $days = round($difference / 86400);
    $weeks = round($difference / 604800);
    $months = round($difference / 2419200);
    $years = round($difference / 29030400);
 
    if ($seconds <= 59 ) {// a few seconds ago
        $return = "قبل بضع ثواني";
    } elseif ($seconds <= 60) {// Seconds
        echo "$seconds seconds ago";
    } elseif ($minutes <= 60) {//Minutes
        if ($minutes == 1) {
            $return = "منذ دقيقة واحدة";
        } else {
            $return = " منذ $minutes دقيقة";
        }
    } elseif ($hours <= 24) {//Hours
        if ($hours == 1) {
            $return = "منذ ساعة واحدة";
        } else {
            $return = " منذ $hours ساعات";
        }
    } elseif ($days <= 7) {//Days
        if ($days == 1) {
            $return = "قبل يوم واحد";
        } else {
            $return = "منذ $days أيام";
        }
    } elseif ($weeks <= 4) {//Weeks
        if ($weeks == 1) {
            $return = "منذ أسبوع واحد";
        } else {
            $return = "منذ $weeks أسابيع";
        }
    } elseif ($months <= 12) {//Months
        if ($months == 1) {
            $return = "منذ شهر واحد";
        } else {
            $return = " منذ $months أشهر";
        }
    } else {//Years
        if ($years == 1) {
            $return = "منذ سنة واحدة";
        } else {
            $return = "منذ $years سنوات";
        }
    }
     
    return $return;
}
  

 
//// دالة الوقت ///
?>
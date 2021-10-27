<!DOCTYPE html>
<html>
<!--Dumescu Monica-->
<head>
    <style>
        .month {
            padding: 70px 25px;
            width: 100%;
            background: #1abc9c;
            text-align: center;
            margin: 20px 0 0;
            list-style-type: none;
        }

        .month li {
            color: white;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-decoration: none;
        }

        .weekdays {
            margin: 0;
            padding: 20px 0;
            background-color: #ddd;
        }

        .weekdays li {
            display: inline-block;
            width: 13.6%;
            color: #666;
            text-align: center;
        }

        .days {
            padding: 10px 0;
            background: #eee;
            margin: 0;
        }

        .days li {
            list-style-type: none;
            display: inline-block;
            width: 13.6%;
            text-align: center;
            margin-bottom: 5px;
            font-size: 12px;
            color: #777;
        }

        .days li .active {
            padding: 5px;
            background: #1abc9c;
            color: white !important
        }
    </style>
    <title>Events Calendar</title>
</head>
<body>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    Month: <input
        type="number"
        min="0"
        max="11"
        name="month"
        value="<?php //TODO: display the current month or from request parameters?>"
    >
    <input type="submit">
</form>
<?php
//TODO: Write your code here
$luni = array(
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
);
$zile =array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
function number_of_days($x) : int
{
    return cal_days_in_month(CAL_GREGORIAN, $x, 2021);
}
$calendar = array();
foreach ($luni as $index => $luna) {
    $calendar[$luna]=number_of_days($index+1);
}

$u=4;
function display_calendar($x,$y)
{
    $zi =array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
   echo  '<ul class="month"><li>',$x,'</li></ul>';
    for ($day = 1; $day <= $y; $day++) {
        //$date =$day." - ".($index + 1) . " - 2021 =>".$zile[$zi];
        //$calendar[$index][$day]=$date;
        echo '<ul class="weekdays"><li>', $zi[$GLOBALS['u']], '<ul class="days"><li><a href="/{file_name}?day={day_number}&month={month_number}" class ="{active_day}">', $day, '</a></li></ul>', '</li></ul>';
        $GLOBALS['u']++;
        if($GLOBALS['u']==7)
            $GLOBALS['u']=0;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $month = $_POST['month'];
    if (empty($month)) {
        $u = 4;
        display_calendar($luni[0], $calendar[$luni[0]]);
        show_events(1);
    } else {
        switch ($month) {
            case 1:
                $u = 0;
                display_calendar($luni[$month], $calendar[$luni[$month]]);
                show_events(2);
                break;
            case 2:
                $u = 0;
                display_calendar($luni[$month], $calendar[$luni[$month]]);
                show_events(3);
                break;
            case 3:
                $u = 3;
                display_calendar($luni[$month], $calendar[$luni[$month]]);
                show_events(4);
                break;
            case 4:
                $u = 5;
                display_calendar($luni[$month], $calendar[$luni[$month]]);
                show_events(5);
                break;
            case 5:
                $u = 1;
                display_calendar($luni[$month], $calendar[$luni[$month]]);
                show_events(6);
                break;
            case 6:
                $u = 3;
                display_calendar($luni[$month], $calendar[$luni[$month]]);
                show_events(7);
                break;
            case 7:
                $u = 6;
                display_calendar($luni[$month], $calendar[$luni[$month]]);
                show_events(8);
                break;
            case 8:
                $u = 2;
                display_calendar($luni[$month], $calendar[$luni[$month]]);
                show_events(9);
                break;
            case 9:
                $u = 4;
                display_calendar($luni[$month], $calendar[$luni[$month]]);
                show_events(10);
                break;
            case 10:
                $u = 0;
                display_calendar($luni[$month], $calendar[$luni[$month]]);
                show_events(11);
                break;
            case 11:
                $u = 2;
                display_calendar($luni[$month], $calendar[$luni[$month]]);
                show_events(12);
                break;
        }
    }
}
function events() : array
{
    $month=rand(1,12);
    if($month%2==1)
    {
        $day=rand(1,31);
    }
    elseif ($month%2==0 && $month!=2) {
        $day = rand(1, 30);
    }
    elseif ($month==2) {
        $day = rand(1, 28);
    }
    $event=array(
            $month,
            $day,
        array()
    );
    for($i=0;$i<5;$i++)
    {
        $x=rand(0,23);
        $y=rand(0,59);
        $event[2][$i][0]=$x;
        $event[2][$i][1]=$y;
    }
    return $event;
}
function show_events($x)
{
    for ($i=0;$i<100;$i++)
    {
        $event_cal[$i]=events();
    }
    for($i=0;$i<100;$i++)
    {
            if($event_cal[$i][0]==$x)
            {
                for ($j=0;$j<5;$j++)
                  echo "</br>The event is on ", $event_cal[$i][1], " at ",$event_cal[$i][2][$j][0]," and ",$event_cal[$i][2][$j][1]," minutes";
            }
    }
}

/*
 * EX1: Declare 2 global variables that contain
 *      a) Name of months
 *      b) Name of days
 *
 * EX2: Create a function that receive month as an integer and return an associative array as follow for each month:
 *      number of day -> name. Associate the returned array to a global variable called "calendar".
 *
 * EX3: Create a function that display the calendar for given month:
 *      a) display the month name: use template '<ul class="month"><li>{month name}</li></ul>';
 *      b) display the week template with the name of days: each day need to be displayed in <li>{day name}</li>
 *          -before displaying the name of days display <ul class="weekdays">
 *          -after displaying the name of days display </ul>
 *      c) display the days of the given month
 *          -before displaying each day display: <ul class="days">
 *          -after displaying each day display: </ul>
 *          -for displaying the blank days use: <li style="visibility: hidden"><a></a></li>
 *          -each day should displayed using the following template:
 *              <li><a href="/{file_name}?day={day_number}&month={month_number}" class ="{active_day}">{day_number}</a></li>
 *              (active_day= "active" if receive the day in request parameter or "")
 *              (month_number is current date or from request parameters)
 *              *hint: when you use logical statements when displaying, after run logical statement the display will end
 *              (first create the message, then display it)
 *
 * EX4: Create a function named "events" that return an array. In function will iterate 100 times where:
 *      a) initialized a random number between 1 and 12 called month
 *      b) initialized another random number called day
 *         depends on month:
 *          -month is odd => day is between 1 and 31
 *          -month is even => day is between 1 and 30
 *          -month is 2 => day is between 1 and 28
 *      c) add 5 random arrays as follows hour(between 0 and 24, random) -> minute(between 0, 59, random)
 *         for each pair of month->day
 *
 * EX5: Create a function that display the events for a given month and day as follow: "The event is at 14 and 54 minute !"
 *
 * EX6: Check the method of request
 *      -post:  - if month is set display the calendar for given month
 *      -get:   - if day and month is set display the calendar for given month and the events for given month and day
 *              - if none is set display the calendar and events for current date
 *
 */
?>
</body>
</html>
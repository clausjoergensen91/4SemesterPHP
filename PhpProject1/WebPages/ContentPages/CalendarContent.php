<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/calendar.css" rel="stylesheet" type="text/css"/>

        <script>
            var month;
            var year;
            var nextMonth; //+1; //Used to match up the current month with the correct start date.
            var prevMonth;
            var ini = true;



            function createCalendar(change) {
                var htmlContent = "";
                var dateNow = new Date();

                if (ini == true) {
                    month = dateNow.getMonth();
                    year = dateNow.getFullYear();
                    ini = false;
                } else if (ini == false) {
                    month += change;
                    if (month > 11) {
                        month = 0;
                        year += 1;
                    } else if (month < 0) {
                        month = 11;
                        year -= 1;
                    }
                }
                //Set previous and next month
                if (month == 11) {
                    nextMonth = 0; //First month of next year.
                    prevMonth = month - 1;
                } else if (month == 0) {
                    prevMonth = 11; //Last month of last year.
                    nextMonth = month + 1;
                } else {
                    nextMonth = month + 1;
                    prevMonth = month - 1;
                }


                // names of months and week days.
                //var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thrusday", "Friday", "Saturday"];


                var nextDate = new Date(nextMonth + ' 1 ,' + year);
                if (month == 11)
                {
                    nextDate = new Date(12 + ' 1 ,' + year);
                }
                // Build html body
                htmlContent = buildCalendarContent(nextDate);
                htmlContent = buildCalendarBody(htmlContent);

                return htmlContent;

            }

            function buildCalendarContent(nextDate) {
                var htmlContent = "";
                var counter = 1;
                var weekdays = (nextDate.getDay() + 6) % 7; // Week starts with monday instead of sunday.
                var weekdays2 = weekdays;
                var curDate = new Date();

                var dayPerMonth = ["31", "" + deterFebDays(month, year) + "", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31"];
                var numOfDays = dayPerMonth[month];

                // this leave a white space for days of pervious month.
                while (weekdays > 0) {
                    htmlContent += "<td> </td>";
                    // used in next loop.
                    weekdays--;
                }

                // loop to build the calander body.
                while (counter <= numOfDays) {
                    // When to start new line.
                    if (weekdays2 > 6) {
                        weekdays2 = 0;
                        htmlContent += "</tr><tr>";
                    }

                    // if counter is current day.
                    // highlight current day using the CSS defined in header.
                    if ((counter == curDate.getDate()) && (month == curDate.getMonth()) && (year == curDate.getFullYear())) {
                        htmlContent += "<td class='calDay' style='background-color: rgb(172,165,255)' onclick='output(" + counter + "," + month + "," + year + ")'>" + counter + "</td>";
                    } else {
                        htmlContent += "<td class='calDay' onclick='output(" + counter + "," + month + "," + year + ")'>" + counter + "</td>";

                    }
                    weekdays2++;
                    counter++;
                }

                return htmlContent;
            }

            function buildCalendarBody(htmlContent) {
                var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                var calendarBody = "<table> <tr> <div class='tableContainer'>"
                        + "<div style='float:left'><button type='button' class='tablebutton'  onclick='displayCalendar(-1)'>" + "<   " + monthNames[prevMonth].substr(0, 3) + "</button></div>"
                        + "<div style='float:right'> <button type='button' class='tablebutton'  onclick='displayCalendar(1)'>" + monthNames[nextMonth].substr(0, 3) + "   >" + "</button></div>"
                        + "<div class='centertop'>" + monthNames[month] + " " + year + "</div></div></tr>";
                calendarBody += "<tr> <td class='weekday'>Mon</td> <td class='weekday'>Tues</td>" +
                        "<td class='weekday'>Wed</td> <td class='weekday'>Thurs</td> <td class='weekday'>Fri</td>" +
                        "<td class='weekday'>Sat</td> <td class='weekday'>Sun</td> </tr>";
                calendarBody += "<tr>";
                calendarBody += htmlContent;
                calendarBody += "</tr></table>";

                return calendarBody;
            }

            function deterFebDays(month, year) {
                var FebNumberOfDays;
                if (month == 1) {
                    if ((year % 100 != 0) && (year % 4 == 0) || (year % 400 == 0)) {
                        FebNumberOfDays = 29;
                    } else {
                        FebNumberOfDays = 28;
                    }
                }
                return FebNumberOfDays;
            }

            function displayCalendar(change) {
                document.getElementById("calendar").innerHTML = createCalendar(change);
            }

            function output(day, month, year) {
                document.getElementById("day").Value = day;
                document.getElementById("month").Value = month;
                document.getElementById("year").Value = year;
                document.getElementById("output").innerHTML = (document.getElementById("year").Value + " " + document.getElementById("month").Value + " " + document.getElementById("day").Value);

            }
        </script>
        <title>Kalender</title>
    </head>
    <body onload="displayCalendar(0)">
        <div class="jumbotron">
            <div class="container homepage">
                <h1>This is kalender stuff</h1>
                <div id="textBox"></div>
                <form action="Helpers/getDate.php" method="POST">
                    <input type="hidden" id="day" name="day" value=""/>
                    <input type="hidden" id="month" name="month" value=""/>
                    <input type="hidden" id="year" name="year" value=""/>
                    <input type="submit" value="find events">
                </form>
                <p class="lead blog-description text-center">Kalender </p>

            </div>
        </div>
        <div class="container homepage">
            <div class="row">
                <div id="calendar" class="tablestyle">
                </div>
            </div>
        </div>

    </body>
</html>

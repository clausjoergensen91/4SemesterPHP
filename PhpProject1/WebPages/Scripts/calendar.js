/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    var month;
    var year;
    var nextMonth; //+1; //Used to match up the current month with the correct start date.
    var prevMonth;
    var ini = true;
    
function createCalendar(change) {
    var htmlContent = "";
    var dateNow = new Date();
    
    if(ini == true) {
        month = dateNow.getMonth();
        year = dateNow.getFullYear();
        ini = false;
    }
    else if(ini == false) {
        month += change;
        if(month > 11) {
            month = 0;
            year += 1;
        }
        else if (month < 0) {
            month = 11;
            year -= 1;
        }
    }
    //Set previous and next month
    if(month == 11) {
        nextMonth = 0; //First month of next year.
    } else if(month == 0) {
        prevMonth = 11; //Last month of last year.
    } else {
        nextMonth = month + 1;
        prevMonth = month - 1;
    }
    

    // names of months and week days.
    //var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thrusday", "Friday", "Saturday"];

    // days in previous month and next one , and day of week.
    var nextDate = new Date(nextMonth + ' 1 ,' + year);
    
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
        htmlContent += "<td class='monthPre'></td>";
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
            htmlContent += "<td class='dayNow'  onMouseOver='this.style.background=\"green\"; this.style.color=\"#FFFFFF\"' " +
                    "onMouseOut='this.style.background=\"#FFFFFF\"; this.style.color=\"#00FF00\"'>" + counter + "</td>";
        } else {
            htmlContent += "<td class='monthNow' onMouseOver='this.style.background=\"grey\"'" +
                    " onMouseOut='this.style.background=\"#FFFFFF\"'><div class='day'>" + counter + "</div></td>";

        }
        weekdays2++;
        counter++;
    }
    
    return htmlContent;
}

function buildCalendarBody(htmlContent) {
    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    var calendarBody = "<table class='calendar'> <tr class='monthNow'>" 
            + "<td><button type='button' onclick='displayCalendar(-1)'>" + monthNames[prevMonth].substr(0, 3) + "</button> </td>"
            + "<th colspan='5'>" + monthNames[month] + " " + year + "</th>"
            + "<td> <button type='button' onclick='displayCalendar(1)'>" + monthNames[nextMonth].substr(0, 3) + "</button> </td></tr>";
    calendarBody += "<tr class='dayNames'> <td>Mon</td> <td>Tues</td>" +
            "<td>Wed</td> <td>Thurs</td> <td>Fri</td> <td>Sat</td> <td>Sun</td> </tr>";
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
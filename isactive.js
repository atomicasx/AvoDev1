//alert("I am Here...");
    //The number of seconds that have passed
    //since the user was active.
	
	var d = new Date();
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
	if(dd<10) {
	  dd='0'+dd
	} 

	if(mm<10) {
	  mm='0'+mm
	} 

	today = dd+'/'+mm+'/'+yyyy;
	$(document).ready(function(){
		$("#toolbar > ul").append("<li class=\"topnav\"><span class=\"notCurrentTabLeft\">&nbsp;</span><span class=\"notCurrentTab\">                         <a href=\"#\" id=\"curr_date\" class=\"dropdown-toggle grouptab\">Current Date</a> <a href=\"#\" id=\"curr_dateTime\" class=\"dropdown-toggle grouptab\">Current Date</a><span class=\"notCurrentTabRight\">&nbsp;</span>                    </span></li>");
		
		//$("#curr_dateTime").
		document.getElementById("curr_date").innerHTML = today;
	});
	
    var secondsSinceLastActivity = 0;
 
    //Five minutes. 60 x 5 = 300 seconds.
    var maxInactivity = (60 * 5);
 
    //Setup the setInterval method to run
    //every second. 1000 milliseconds = 1 second.
	
    setInterval(function(){
		
        secondsSinceLastActivity++;
        console.log(secondsSinceLastActivity + ' seconds since the user was last active');
        //if the user has been inactive or idle for longer
        //then the seconds specified in maxInactivity
        if(secondsSinceLastActivity > maxInactivity){
            console.log('User has been inactive for more than ' + maxInactivity + ' seconds');
            //Redirect them to your logout.php page.
            location.href = 'index.php?module=Users&action=Logout&flag=3';
        }
		var d = new Date();
		//document.getElementById("curr_dateTime").innerHTML = today;
		document.getElementById("curr_dateTime").innerHTML = d.toLocaleTimeString();
    }, 1000);
 
    //The function that will be called whenever a user is active
    function activity(){
        //reset the secondsSinceLastActivity variable
        //back to 0
        secondsSinceLastActivity = 0;
    }
 
    //An array of DOM events that should be interpreted as
    //user activity.
    var activityEvents = [
        'mousedown', 'mousemove', 'keydown',
        'scroll', 'touchstart'
    ];
 
    //add these events to the document.
    //register the activity function as the listener parameter.
    activityEvents.forEach(function(eventName) {
        document.addEventListener(eventName, activity, true);
    });
 


activityWatcher();
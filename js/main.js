var monthtext=['01','02','03','04','05','06','07','08','09','10','11','12'];

function populatedropdown(dayfield, monthfield, yearfield){
	var today=new Date()
	var dayfield=document.getElementById(dayfield)
	var monthfield=document.getElementById(monthfield)
	var yearfield=document.getElementById(yearfield)
	for (var i=0; i<32; i++)
	dayfield.options[i]=new Option(i, i+1)
	dayfield.options[today.getDate()]=new Option(today.getDate(), today.getDate(), true, true) //select today's day
	for (var m=0; m<12; m++)
	monthfield.options[m]=new Option(monthtext[m], monthtext[m])
	monthfield.options[today.getMonth()]=new Option(monthtext[today.getMonth()], monthtext[today.getMonth()], true, true) //select today's month
	var thisyear=today.getFullYear()
	for (var y=0; y<50; y++){
	yearfield.options[y]=new Option(thisyear, thisyear)
	thisyear-=1
	}
	yearfield.options[0]=new Option(today.getFullYear(), today.getFullYear(), true, true) //select today's year
}


//populatedropdown(id_of_day_select, id_of_month_select, id_of_year_select)
window.onload=function(){
	populatedropdown("daydropdown", "monthdropdown", "yeardropdown")
}
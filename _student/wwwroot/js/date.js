// date

function updateDate(){
    const now = new Date();
    const dateNow = now.getDay(),
        month = now.getMonth(), 
        dateNumber = now.getDate(), 
        year = now.getFullYear() 
        
        const months = [
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
            "December",
        ];

        const week = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday",];

        var ids = ["dayname","month","daynum","year"];
        var values =[week[dateNow], months[month], dateNumber, year];

        for(var i = 0; i < ids.length; i++)
        document.getElementById(ids[i]).firstChild.nodeValue = values[i];

}


updateDate();



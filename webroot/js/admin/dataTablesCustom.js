$(document).ready(function () {
    $('.datatable').dataTable({
        "language": {
            "url": "Portuguese-Brasil.lang"
        }
    });
});

function convertDateTime(data, type, full, meta, limit)
{
    if (type === 'display') {
        var fullDate = new Date(data);
        
        var twoDigitMonth = fullDate.getMonth() + "";
        if (twoDigitMonth.length == 1)
            twoDigitMonth = "0" + twoDigitMonth;
        
        var twoDigitDate = fullDate.getDate() + "";
        if (twoDigitDate.length == 1)
            twoDigitDate = "0" + twoDigitDate;
        
        var currentDate = twoDigitDate + "/" + twoDigitMonth + "/" + fullDate.getFullYear() + ' ' + fullDate.getHours() + ':' + fullDate.getMinutes();
        
        return currentDate;
    }
}
/*
 * webroot/js/ready.js
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
$(function () {

    /* list events types
     -----------------------------------------------------------------*/
    listEventsTypes();

    /* initialize the external events
     -----------------------------------------------------------------*/

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    let date = new Date()
    let d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear();

    $('#calendar-events').fullCalendar({
        //Random default events
        header    : {
            left  : 'prev,next today',
            center: 'title',
            right : 'month,agendaWeek,agendaDay'
        },
        buttonText: {
            today: "Hoje",
            month: "Mês",
            week: "Semana",
            day: "Dia"
        },
        timezone: 'local',
        events    : urlFeed,
        defaultView: 'agendaWeek',
        firstHour : 8,
        weekMode  : 'variable',
        aspectRatio: 2,
        editable  : true,
        droppable : true, // this allows things to be dropped onto the calendar !!!
        drop      : function (date, allDay) { // this function is called when something is dropped
            // retrieve the dropped element's stored Event Object
            let originalEventObject = $(this).data('eventObject');
            // we need to copy it, so that multiple events don't have a reference to the same object
            let copiedEventObject = $.extend({}, originalEventObject)

            // assign it the date that was reported
            copiedEventObject.start           = date
            copiedEventObject.allDay          = allDay
            copiedEventObject.backgroundColor = $(this).css('background-color')
            copiedEventObject.borderColor     = $(this).css('border-color')
            copiedEventObject.event_type_id     = $(this).data('event-id')

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar-events').fullCalendar('renderEvent', copiedEventObject, true);
            saveEvent(copiedEventObject);
        },
        eventDrop: function(event) {
            saveEvent(event);
        },
        eventResizeStart: function(event) {
            saveEvent(event);
        },
        eventResize: function(event) {
            saveEvent(event);
        },
        dayClick: function(date, jsEvent, view) {

        },
        eventRender: function(event, element) {
            if(window.eventScrolling) {
                return;
            }
            element.popover({
                title: event.title,
                content: event.details,
                html: true,
                trigger: 'hover',
                placement: 'top',
                container: 'body'
            });
        },
        eventDragStart: function(event) {
            $(".popover").remove();
        },
    })

    /* ADDING EVENTS */
    let currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
        e.preventDefault()
        //Save color
        currColor = $(this).css('color')
        //Add color effect to button
        $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    });
    $('#add-new-event').click(function (e) {
        e.preventDefault()
        //Get value and make sure it is not null
        let val = $('#new-event').val()
        if (val.length == 0) {
            alert('Selecione uma cor e digite o nome');
            $('#new-event').focus();
            return
        }
        $.ajax({
            url: addEventTypeCustom,
            type: 'post',
            data: {
                name: val,
                color: currColor
            },
            beforeSend: function(xhr){
                xhr.setRequestHeader("X-CSRF-Token", _csrfToken);
            },
            success: function(response){
                console.log(response)
            }
        });
        //Create events
        let event = $('<div />')
        event.css({
            'background-color': currColor,
            'border-color'    : currColor,
            'color'           : '#fff'
        }).addClass('external-event')
        //Add draggable funtionality
        init_events(event)

        //Remove event from text input
        $('#new-event').val('');

        listEventsTypes();
    })
});
function listEventsTypes() {

    $.ajax({
        url: urlListEventsTypes,
        type: 'GET',
        beforeSend: function(xhr){
            xhr.setRequestHeader("X-CSRF-Token", _csrfToken);
        },
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){
            console.log(response);
            let html = '';
            $.each(response.data, function (i, e) {
                html += `<div class="external-event ui-draggable ui-draggable-handle" style="position: relative; background-color: ${e.color};" data-event-id="${e.id}">
                    ${e.name}
                </div>`;
            });
            $("#external-events").html(html);
        }
    }).done(function(){
        init_events($('#external-events div.external-event'));
    });
}

function init_events(ele) {
    ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        let eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex        : 1070,
            revert        : true, // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        })

    })
}
function saveEvent(event) {
    let eventId = event.id ? event.id : '';
    let eventTypeId = event.event_type_id !== undefined ? event.event_type_id : '';
    let start = buildDate(event.start);
    let end = buildDate(event.end);
    $.ajax({
        url: urlUpdateEvent + '/' + eventId,
        type: 'post',
        data: {
            id: eventId,
            title: event.title,
            start: start,
            event_type_id: eventTypeId,
            end: end,
            all_day: event.allDay == true ? 1 : 0
        },
        beforeSend: function(xhr){
            xhr.setRequestHeader("X-CSRF-Token", _csrfToken);
        },
        success: function(response){
            console.log(response);
        }
    });
    $(".popover").remove();
}

function buildDate(str) {
    if (str == undefined || str == '') {
        return '';
    }
    let date = new Date(str);
    let year = date.getFullYear();

    let month = date.getMonth()+1;
    month = ('0' + month).slice(-2);

    let day = date.getDate();
    day = ('0' + day).slice(-2);

    let hours = date.getHours();
    hours = ('0' + hours).slice(-2);

    let minutes = date.getMinutes();
    minutes = ('0' + minutes).slice(-2);

    return `${day}/${month}/${year} ${hours}:${minutes}`;
}

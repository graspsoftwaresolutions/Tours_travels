$(document).ready(function() {		
	
	var calendar = $('#calendar').fullCalendar({
		header: {
			left: 'month,agendaWeek,agendaDay',
			center: 'prev, title, next',
			right: 'today',
		},
		defaultDate: '2016-04-12',
		businessHours: true, // none business hours	will be grey
      	editable: true,
        selectable: true,
		select: function(start, end, allDay) {
			$('#createEventModal').modal('show');			
			$('#createEventModal #apptStartTime').val(start);
			$('#createEventModal #apptEndTime').val(end);
			$('#createEventModal #apptAllDay').val(allDay);
		},
		events: [
				{
					title: 'Business Lunch',
					start: '2016-04-04T13:00:00',
					constraint: 'businessHours'
				},
				{
					title: 'Meeting',
					start: '2016-04-13T11:00:00',
					constraint: 'availableForMeeting', // defined below
					color: '#ff9800'
				},
				{
					title: 'Conference',
					start: '2016-04-18',
					end: '2016-04-20'
				},
				{
					title: 'Party',
					start: '2016-04-29T20:00:00'
				}
			]
    });

	$('#submitButton').on('click', function(e){
    	e.preventDefault();
    	addEvent();
	});

	function addEvent(){
	    $("#createEventModal").modal('hide');     
    	$("#calendar").fullCalendar('renderEvent',
        {
            title: $('#eventTitle').val(),
            start: $('#apptStartTime').val(),
            end: $('#apptEndTime').val(),
            allDay: ($('#apptAllDay').val() == "true"),
			backgroundColor: '#ff9800'         
        },
        true);
        $('#eventTitle').val('');
	}

	// functions to underline the active tab
	$('.fc-left .fc-button-group').append('<div class="btn-active-indicator"></div>');       

    function changePos() {    
        var activeButton = $('.fc-button-group').find('.fc-state-active').position();

        $('.btn-active-indicator').stop().css({
            left: activeButton.left
        });
    }

    setTimeout(changePos, 50);

    $(window).on('resize', function () {
        changePos();
    });

    $('.fc-button-group').on('click', 'button', function(e){
        e.preventDefault();
        setTimeout(changePos, 10);
    });
	
});



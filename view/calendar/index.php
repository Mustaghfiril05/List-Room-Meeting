<style>
    html, body {
    margin: 0;
    font-family: Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.1;
    color: #000000;
    text-align: left;
    background-color: #fff;
    }
    #calendar {
    margin: auto;
    height: 40rem;
    width: auto;
    }
    .fc {
    display: flex;
    flex-direction: column;
    font-size: 14px;
    }
    .fc-daygrid-dot-event {
    display: flex;
    align-items: center;
    padding: 2px 0;
    flex-direction: row;
    flex-wrap: wrap;
    }
    .modal-content{
    border-radius: 1.3000000000000007rem;
    }
    .fc-direction-ltr .fc-daygrid-event.fc-event-end, .fc-direction-rtl .fc-daygrid-event.fc-event-start {
    margin-right: 2px;
    color: black; 
    cursor: pointer;  
    }
    

    .form-control:disabled, .form-control[readonly] {
    background-color: #ffffff;
    opacity: 1;
    }

    textarea.form-control1 {
    height: 80px;
    }
    textarea.form-control {
    height: 80px;
    }

    .form-control1 {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #6e707e;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ffffff;
    border-radius: 0.35rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }

    .fc-daygrid-event {
    white-space: pre-line;
    }

    .fc-day-sat { 
        color:red;  
    }
    .fc-day-sun { 
        color:red;  
    }

    .fc-day-fri { 
        color:mediumseagreen;  
    }
</style>
<style>
        .btn1 {
        padding: 10px 15px;
        font-size: 10px;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: #fff;
        background-color: #aa0404;
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px #999;
        }

        .btn1:hover {background-color: #aa0404}

        .btn1:active {
        background-color: #aa0404;
        box-shadow: 0 5px #666;
        transform: translateY(7px);
        }
</style>
<style>
        .btn2 {
        padding: 10px 15px;
        font-size: 10px;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: #fff;
        background-color: #449abb;
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px #999;
        }

        .btn2:hover {background-color: #449abb}

        .btn2:active {
        background-color: #449abb;
        box-shadow: 0 5px #666;
        transform: translateY(7px);
        }
</style>
<style>
    .btn3 {
        padding: 10px 15px;
        font-size: 10px;
        text-align: center;
        cursor: pointer;
        outline: none;
        color: #fff;
        background-color: #bda116;
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px #999;
        }

        .btn3:hover {background-color: #bda116}

        .btn3:active {
        background-color: #bda116;
        box-shadow: 0 5px #666;
        transform: translateY(7px);
        }
</style>
<!-- header calendar -->
<div class="container-fluid" style="background-color: white;">
    <ol class="breadcrumb" style="background-color: #3a3a3a;" >
            <li class="breadcrumb-item">
              <a href="" style="color: white;">Calendar View</a>
            </li>
            <li class="breadcrumb-item active" style="color: white;">Overview</li>
    </ol>

    <?= $this->session->flashdata('message'); ?>
    
    <div class="card shadow mb-4">
        <div class="card-header py-1" style="background-color:#000000;">
        </div>
        <div class="card-body" style="height:46rem; width:auto;">
        <div id='calendar'></div>
        </div>
    </div>    
</div>
<!-- new Event -->
<div class="modal fade" id="newEvent" tabindex="-1" role="dialog" aria-labelledby="newInventarisModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 20rem;">
            <div class="modal-header">
                <p class="modal-title" id="newInventarisModalLabel"><b>Add New Event</b></p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <form action="<?= base_url('calendar/add_event'); ?>" method="post">
        <div class="modal-body" >

            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder=".:: Title Event ::.">   
            </div>
            <div class="form-group">
                <input type="datetime-local" class="form-control" id="start_date" name="start_date">   
            </div>
            <div class="form-group">
                <input type="datetime-local" class="form-control" id="end_date" name="end_date">   
            </div>
            <div class="form-group">
                <select name="ruangan_meeting" id="ruangan_meeting" class="form-control">
                    <option value="">.:: Pilih Ruangan ::.</option>
                    <option value="Big Meeting Room">Big Meeting Room - Merah</option>
                    <option value="Medium Meeting Room">Medium Meeting Room - Hijau</option>
                    <option value="Small Meeting Room">Small Meeting Room - Biru</option>
                    <option value="Refinery Meeting Room">Refinery Meeting Room - Orange</option>
                </select>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="link_url" name="link_url" placeholder="Paste your link here...."></textarea>
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-secondary btn-sm" value="save" name="save">
            </div>
        </form>
        </div>
    </div>
</div>
<!-- detail events -->
<div class="modal fade" id="modalElimina" tabindex="-1" role="dialog" aria-labelledby="newInventarisModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 27rem;">
            <div class="modal-header">
                <p class="modal-title" id="newInventarisModalLabel"><b>Detail Event Calendar</b></p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
         
        <form id="frmSomething" method="post">

        <div class="modal-body" >
        <div class="col-lg-16 col-md-12">
            <div class="form-group row">
                <a style="color: black;"><b style="font-size: 12px;"> Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b></a>
                
                    &nbsp;<input type="text" class="form-control1" style="font-size: 12px; width:20rem;" id="event_title" disabled>
				
            </div>

            <div class="form-group row">
                <a style="color: black;"><b style="font-size: 12px;"> Start date : </b></a>
                
                    &nbsp;<input type="text" class="form-control1" style="font-size: 12px; width:20rem;" id="event_start_date" disabled>
				
            </div>
            <div class="form-group row">
                <a style="color: black;"><b style="font-size: 12px;"> End date &nbsp;&nbsp;: </b></a>
               
                    &nbsp;<input type="text" class="form-control1" style="font-size: 12px; width:20rem;" id="event_end_date" disabled>
				
            </div>
            <div class="form-group row">
                <a style="color: black;"><b style="font-size: 12px;"> Location &nbsp;&ensp;: </b></a>
               
                    &nbsp;<input type="text" class="form-control1" style="font-size: 12px; width:20rem;" id="event_location" disabled>
				
            </div>
            <div class="form-group row">
                <a style="color: black;"><b style="font-size: 12px;"> Link URL &nbsp;&nbsp;: </b></a>
                
                &nbsp;<a class="form-control1" style="font-size: 12px; width:20rem;" id="event_linkurl" disabled></a>
			
            </div>
        </div>
        </div>
            <div class="modal-footer">
            <div class="col text-left">
                <button type="button" class="btn2 btn-secondary btn-sm" data-dismiss="modal" id="myBtn">Edit</button>
            </div>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <input id="btnSubmit" onclick="return confirm('Remove This Event?');" type="submit" class="btn1 btn-secondary btn-sm" value="delete" name="delete">
            </div>
        </form>
           
        </div>
    </div>
</div>
<!-- edit event -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="newInventarisModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 27rem;">
            <div class="modal-header">
                <p class="modal-title" id="newInventarisModalLabel"><b>Edit Event Calendar</b></p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
         
        <form id="linkcontroller" method="post">

        <div class="modal-body" >
        <div class="col-lg-16 col-md-12">

                <input type="hidden" class="form-control" style="font-size: 12px; width:20rem;" id="id_calendar" name="id_calendar" >

            <div class="form-group row">
                <a style="color: black;"><b style="font-size: 12px;"> Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b></a>
                    &nbsp;<input type="text" class="form-control" style="font-size: 12px; width:20rem;" id="title_event" name="title_event" >
            </div>

            <div class="form-group row">
                <a style="color: black;"><b style="font-size: 12px;"> Start date : </b></a>
                    &nbsp;<input type="datetime-local" class="form-control" style="font-size: 12px; width:20rem;" id="start_date_event" name="start_date_event">	
            </div>
            <div class="form-group row">
                <a style="color: black;"><b style="font-size: 12px;"> End date &nbsp;&nbsp;: </b></a>
               
                    &nbsp;<input type="datetime-local" class="form-control" style="font-size: 12px; width:20rem;" id="end_date_event" name="end_date_event">
				
            </div>
            <div class="form-group row">
                <a style="color: black;"><b style="font-size: 12px;"> Location &nbsp;&ensp;: </b></a>
                &nbsp;<select class="form-control" style="font-size: 12px; width:20rem;" id="location_event" name="location_event">
                        <option value="Big Meeting Room">Big Meeting Room - Merah</option>
                        <option value="Medium Meeting Room">Medium Meeting Room - Hijau</option>
                        <option value="Small Meeting Room">Small Meeting Room - Biru</option>
                        <option value="Refinery Meeting Room">Refinery Meeting Room - Orange</option>
                    </select>
                    <!-- &nbsp;<input type="text" class="form-control" style="font-size: 12px; width:20rem;" id="location_event"> -->
				
            </div>
            <div class="form-group row">
                <a style="color: black;"><b style="font-size: 12px;"> Link URL &nbsp;&nbsp;: </b></a>
                
                &nbsp;<textarea class="form-control" style="font-size: 12px; width:20rem;" id="linkurl_event" name="linkurl_event"></textarea>
			
            </div>
        </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <input id="Submitbtn" type="submit" class="btn3 btn-secondary btn-sm" value="simpan" name="simpan">
            </div>
        </form>
           
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url('assets/'); ?>/vendor/jquery/jquery.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.4.2/main.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.4.2/main.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js"></script> -->
<script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var FEED_URL = "<?= base_url('/calendar/load_data')?>";
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: new Date(), 
    
        headerToolbar: {
        left: 'Add prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listDay',
        },

        editable: false,
        customButtons: {
            Add: {
            text: 'New Event',
            click: function() {
                $("#newEvent").modal("show");
            }
            },
        },
        displayEventEnd: {
                    month: false,
                    basicWeek: true,
                    "default": true
                },
                
        events: {
                    url: FEED_URL,
                    method: 'GET',
                    dateType:'json', 
                }, 
    // eventClick: function(info) {
        //   var eventObj = info.event;
        //   if (eventObj.url) {
        //     alert(
        //       'Clicked ' + eventObj.title + '.\n' +
        //       'Will open ' + eventObj.url + ' in a new tab'
        //     );
        //     window.open(eventObj.url);
        //     info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
        //   } else {
        //     alert('Clicked ' + eventObj.title);
        //   }
    // },

    eventClick: function(info) {
      var eventObj = info.event;
      $('#id_calendar').val(eventObj.id);
      $('#event_title').val(eventObj.title);
      $('#event_start_date').val(moment(eventObj.start).format('YYYY-MM-D, h:mm:ss a'));
      $('#event_end_date').val(moment(eventObj.end).format('YYYY-MM-D, h:mm:ss a'));
      $('#event_location').val(eventObj.extendedProps.location);
      $('#event_linkurl').html(eventObj.extendedProps.link_url);
      $("#modalElimina").modal(); //show modal

        var frmSomething= $("#frmSomething");
        var linkcontroller= $("#linkcontroller");
        var btnSubmit= $("#btnSubmit");
        var Submitbtn= $("#Submitbtn");
        var myBtn= $("#myBtn");
        var custNum = eventObj.id;

        btnSubmit.click(function()
        {
            frmSomething.attr("action", "<?= base_url('/calendar/delete/')?>" + custNum);

            btnSubmit.submit();
        });

        Submitbtn.click(function()
        {
            linkcontroller.attr("action", "<?= base_url('/calendar/edit_event/')?>" + custNum);

            Submitbtn.submit();
        });


        myBtn.click(function()
        {
            $('#id_calendar').val(eventObj.id);
            $('#title_event').val(eventObj.title);
            $('#start_date_event').val(moment(eventObj.start).format('YYYY-MM-DDTHH:mm'));
            $('#end_date_event').val(moment(eventObj.end).format('YYYY-MM-DDTHH:mm'));
            $('#location_event').val(eventObj.extendedProps.location);
            $('#linkurl_event').html(eventObj.extendedProps.link_url);

            $('#myModal').modal();
        });
     
    },
           
    });
    calendar.render();
    });
    // });  

</script> 

@extends('admin.master')
@section('style')
    <style type="text/css">

    </style>
@stop
@section('content')

<!-- Daterange picker -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Daterange picker</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <p class="mb-15">This date range picker component for <code>Bootstrap</code> creates a dropdown menu from which a user can select a range of dates. If invoked with no options, it will present two calendars to choose a start and end date from. Optionally, you can provide a list of date ranges the user can select from instead of choosing dates from the calendars.</p>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Basic date range picker: </label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                        <input type="text" class="form-control daterange-basic" value="01/01/2015 - 01/31/2015"> 
                    </div>
                </div>

                <div class="form-group">
                    <label>Display week numbers: </label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                        <input type="text" class="form-control daterange-weeknumbers" value="03/18/2013 - 03/23/2013"> 
                    </div>
                </div>

                <div class="form-group">
                    <label>Display time picker: </label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                        <input type="text" class="form-control daterange-time" value="03/18/2013 - 03/23/2013"> 
                    </div>
                </div>

                <div class="form-group">
                    <label>Basic single date picker: </label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                        <input type="text" class="form-control daterange-single" value="03/18/2013">
                    </div>
                </div>

                <div class="form-group">
                    <label>Simple text field attachment: </label>
                    <input type="text" class="form-control daterange-basic" value="03/18/2013 - 03/23/2013"> 
                </div>

                <div class="form-group">
                    <label>Button class options: </label>
                    <input type="text" class="form-control daterange-buttons" value="03/18/2013 - 03/23/2013"> 
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Show calendars on left: </label>
                    <div class="input-group">
                        <input type="text" class="form-control daterange-left" value="03/18/2013 - 03/23/2013"> 
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                    </div>
                </div>

                <div class="form-group">
                    <label>Display date dropdowns: </label>
                    <div class="input-group">
                        <input type="text" class="form-control daterange-datemenu" value="03/18/2013 - 03/23/2013"> 
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                    </div>
                </div>

                <div class="form-group">
                    <label>10 minute increments: </label>
                    <div class="input-group">
                        <input type="text" class="form-control daterange-increments" value="08/01/2013 1:00 PM - 08/01/2013 1:30 PM">
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                    </div>
                </div>

                <div class="form-group">
                    <label>Localization (ru): </label>
                    <div class="input-group">
                        <input type="text" class="form-control daterange-locale" value="08/01/2013 1:00 PM - 08/01/2013 1:30 PM">
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="display-block">Pre-defined ranges &amp; callback: </label>
                    <button type="button" class="btn btn-default daterange-predefined">
                        <i class="icon-calendar22 position-left"></i>
                        <span></span>
                        <b class="caret"></b>
                    </button>
                </div>

                <div class="form-group">
                    <label class="display-block">Date picker inside button: </label>
                    <button type="button" class="btn btn-danger daterange-ranges">
                        <i class="icon-calendar22 position-left"></i> <span></span> <b class="caret"></b>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /daterange picker -->


<!-- Pickadate picker -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Pick-a-Date picker</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <p class="mb-15">Pickadate.js is a very powerful, mobile-friendly, responsive, and lightweight jQuery date &amp; time input picker. The basic setup requires targetting an input element and invoking the picker. Basically this plugin includes 2 main parts: date picker and time picker. Time picker examples demonstrated below.</p>

        <div class="row">
            <div class="col-md-6">
                <div class="content-group-lg">
                    <h6 class="text-semibold">Basic options</h6>
                    <p>The basic setup requires targetting an input element and invoking the picker.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Strings</h6>
                    <p>Change the month and weekday labels as you find suitable.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate-strings" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Buttons</h6>
                    <p>Change the text or hide a button completely by passing a false-y value.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate-buttons" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Formats</h6>
                    <p>Display a human-friendly format and use an alternate one to submit to the server.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate-format" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Year selector</h6>
                    <p>You can also specify the number of years to show in the dropdown using an even integer.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate-year" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">First weekday</h6>
                    <p>The first day of the week can be set to either Sunday or Monday.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate-weekday" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group">
                    <h6 class="text-semibold">Date limits</h6>
                    <p>Set the minimum and maximum selectable dates on the picker.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate-limits" placeholder="Try me&hellip;">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="content-group-lg">
                    <h6 class="text-semibold">Accessibility labels</h6>
                    <p>Change the <code>title</code> attributes to several elements within the picker</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate-accessibility" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Editable input</h6>
                    <p>By default, typing into the input is disabled by giving it a <code>readOnly</code> attribute.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate-editable" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Dropdown selectors</h6>
                    <p>Display <code>select</code> menus to pick the month and year.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate-selectors" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Translations</h6>
                    <p>The picker supports translations for 39 languages, available out of the box.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate-translated" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Disable ranges</h6>
                    <p>Enable dates that fall within a range of disabled dates by adding the <code>inverted</code> parameter.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate-disable-range" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Events</h6>
                    <p>Fire off events as the user interacts with the picker.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate-events" placeholder="Open your console and try me&hellip;">
                    </div>
                </div>

                <div class="content-group">
                    <h6 class="text-semibold">Disable dates</h6>
                    <p>Disable a specific or arbitrary set of dates selectable on the picker.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar5"></i></span>
                        <input type="text" class="form-control pickadate-disable" placeholder="Try me&hellip;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /pickadate picker -->


<!-- Pickatime picker -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Pick-a-Time time picker</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <div class="content-group-lg">
                    <h6 class="text-semibold">Basic options</h6>
                    <p>The basic setup requires targetting an <code>input</code> element and invoking the picke.r</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" class="form-control pickatime" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Clear button</h6>
                    <p>Change the text or hide the button completely by passing a <code>false-y</code> value.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" class="form-control pickatime-clear" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Timepicker formats</h6>
                    <p>Display a human-friendly label and <code>input</code> format and use an alternate one to submit.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" class="form-control pickatime-format" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Send the hidden value only</h6>
                    <p>Sometimes the value that needs to be sent to the server is just the hidden value – and not the visible one.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" class="form-control pickatime-hidden" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Time limits</h6>
                    <p>Set the minimum and maximum selectable times on the picker.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" class="form-control pickatime-limits" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group">
                    <h6 class="text-semibold">Using integers as hours</h6>
                    <p>Set the minimum and maximum selectable times on the picker using integers as hours.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" class="form-control pickatime-limits-integers" placeholder="Try me&hellip;">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="content-group-lg">
                    <h6 class="text-semibold">Disable times</h6>
                    <p>Disable a specific or arbitrary set of times selectable on the picker</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" class="form-control pickatime-disabled" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Disabling ranges</h6>
                    <p>Enable times that fall within a range of disabled times by adding the <code>inverted</code> parameter.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" class="form-control pickatime-range" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Editable input</h6>
                    <p>By default, text input has a <code>readOnly</code> attribute to hide virtual keyboards on touch devices.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" class="form-control pickatime-editable" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Timepicker events</h6>
                    <p>Fire off events as the user interacts with the picker</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" class="form-control pickatime-events" placeholder="Open your console and try me&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Disabling all with exeptions</h6>
                    <p>Enable only a specific or arbitrary set of times by setting true as the first item in the collection.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" class="form-control pickatime-disableall" placeholder="Try me&hellip;">
                    </div>
                </div>

                <div class="content-group">
                    <h6 class="text-semibold">Timepicker intervals</h6>
                    <p>Choose the minutes interval between each time in the list.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-alarm"></i></span>
                        <input type="text" class="form-control pickatime-intervals" placeholder="Try me&hellip;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /pickadate picker -->


<!-- Anytime picker -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Anytime pickers</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <p class="mb-15">The <code>Any+Time™</code> JavaScript Library includes a highly-customizable, jQuery-compatible datepicker/ timepicker (calendar/ clock widget) and a powerful Date/String parse/format utility. Anytime allows you to create a date/time picker with advanced features and options not found in other calendar/clock widgets, also to format dates and times in different ways.</p>

        <div class="row">
            <div class="col-md-6">
                <div class="content-group-lg">
                    <h6 class="text-semibold">Basic usage</h6>
                    <p>Basic text field specifies that the week begins with Monday.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                        <input type="text" class="form-control" id="anytime-date" value="Sunday, July 30th in the Year 1967 CE">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Month and day</h6>
                    <p>Month and day only picker format</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                        <input type="text" class="form-control" id="anytime-month-day" value="4th of June">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Time picker</h6>
                    <p>Current example displays hours and minutes only. Seconds can be added via plugin <code>options</code>.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-watch2"></i></span>
                        <input type="text" class="form-control" id="anytime-time" value="12:34">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Display hours only</h6>
                    <p>Current example demonstrates simple time picker with hours only in <code>AM/PM</code> format.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-watch2"></i></span>
                        <input type="text" class="form-control" id="anytime-time-hours" value="9 PM">
                    </div>
                </div>

                <div class="content-group">
                    <h6 class="text-semibold">Date and time pickers</h6>
                    <p>The first field specifies that the week begins with Monday. The second field demonstrates a time picker.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                        <input type="text" class="form-control" id="anytime-both" value="June 4th 08:47">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="content-group-lg">
                    <h6 class="text-semibold">Custom display format</h6>
                    <p>Custom display format can be specified via plugin <code>options</code></p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                        <input type="text" class="form-control" id="anytime-weekday" value="Wednesday, 4th of June, 2014">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Numeric date</h6>
                    <p>Current example demonstrates custom <code>DD/MM/YYYY</code> date format</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                        <input type="text" class="form-control" id="anytime-month-numeric" value="04/06/2014">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Date range</h6>
                    <p>In the following example, <code>AnyTime.Converter</code> and jQuery work together to provide date-range selection. The value for the second ("Finish") field must be at least one day after the date in the first ("Start") field, but no more than 90 days later.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <p><input type="text" class="form-control" id="rangeDemoStart" placeholder="Start date"></p>
                        </div>

                        <div class="col-md-6">
                            <p><input type="text" class="form-control" id="rangeDemoFinish" placeholder="Finish date" disabled="disabled"></p>
                        </div>
                    </div>

                    <input type="button" id="rangeDemoToday" class="btn btn-primary" value="today">
                    <input type="button" id="rangeDemoClear" class="btn btn-default" value="clear">
                </div>

                <div class="content-group">
                    <h6 class="text-semibold">On-Demand Picker</h6>
                    <p>The following example shows how to create a field that initially does not have a picker, followed by a button that creates a picker for the field. This would be useful if you want to allow manual entry into the field, but it does not prevent the user from entering a value in the wrong format.</p>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-icon" id="ButtonCreationDemoButton"><i class="icon-calendar3"></i></button>
                        </span>
                        <input type="text" class="form-control" id="ButtonCreationDemoInput" placeholder="Select a date">
                    </div>
                    <span class="help-block">Format must be YYYY-MM-DD HH:MM:SS</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /anytime picker -->


<!-- jQuery UI picker -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">jQuery UI date picker</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <p class="mb-15">The datepicker is tied to a standard form input field. Focus on the input (click, or use the tab key) to open an interactive calendar in a small overlay. Choose a date, click elsewhere on the page (blur the input), or hit the <kbd>Esc</kbd> key to close. If a date is chosen, feedback is shown as the input's value.</p>

        <div class="row">
            <div class="col-md-6">
                <div class="content-group-lg">
                    <h6 class="text-semibold">Default functionality</h6>
                    <p>The datepicker is tied to a standard form input field</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                        <input type="text" class="form-control datepicker" placeholder="Pick a date&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Dates in other months</h6>
                    <p>The datepicker can show dates that come from other than the main month being displayed.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                        <input type="text" class="form-control datepicker-dates" placeholder="Pick a date&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Button bar</h6>
                    <p>Display a button for selecting <code>Today's</code> date and a <code>Done</code> button for closing the calendar.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                        <input type="text" class="form-control datepicker-button-bar" placeholder="Pick a date&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Month &amp; year menu</h6>
                    <p>Show month and year dropdowns in place of the static month/year header.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                        <input type="text" class="form-control datepicker-menus" placeholder="Pick a date&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Show week number</h6>
                    <p>The datepicker can show the week of the year. The default calculation follows the ISO 8601 definition.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                        <input type="text" class="form-control datepicker-weeks" placeholder="Pick a date&hellip;">
                    </div>
                </div>

                <div class="content-group">
                    <h6 class="text-semibold">Format date</h6>
                    <p>Display date feedback in a variety of ways.</p>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                <input type="text" class="form-control datepicker-format" placeholder="Pick a date&hellip;">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <select class="form-control" id="format">
                                <option value="mm/dd/yy">Default - mm/dd/yy</option>
                                <option value="yy-mm-dd">ISO 8601 - yy-mm-dd</option>
                                <option value="d M, y">Short - d M, y</option>
                                <option value="d MM, y">Medium - d MM, y</option>
                                <option value="DD, d MM, yy">Full - DD, d MM, yy</option>
                                <option value="&apos;day&apos; d &apos;of&apos; MM &apos;in the year&apos; yy">With text - 'day' d 'of' MM 'in the year' yy</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="content-group-lg">
                    <h6 class="text-semibold">Icon trigger</h6>
                    <p>Click the icon next to the input field to show the datepicker.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                        <input type="text" class="form-control datepicker-icon" placeholder="Pick a date&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Populate alternate field</h6>
                    <p>Populate an alternate field with its own date format using the <code>altField</code> and <code>altFormat</code> options.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control datepicker-alternate" placeholder="Pick a date&hellip;">
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" id="alternate" placeholder="Alternate field">
                        </div>
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Restrict date range</h6>
                    <p>Restrict the range of selectable dates with the <code>minDate</code> and <code>maxDate</code> options.</p>
                    <div class="input-group">
                        <span class="input-group-addon" id="onee"><i class="icon-calendar"></i></span>
                        <input type="text" class="form-control datepicker-restrict" placeholder="Pick a date&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Multiple months</h6>
                    <p>Set the <code>numberOfMonths</code> option to an integer of 2 or more to show multiple months in a single datepicker.</p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                        <input type="text" class="form-control datepicker-multiple" placeholder="Pick a date&hellip;">
                    </div>
                </div>

                <div class="content-group-lg">
                    <h6 class="text-semibold">Date range</h6>
                    <p>Select the date range to search for.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="range-from" placeholder="Date from:">
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="form-control" id="range-to" placeholder="Date to:">
                        </div>
                    </div>
                </div>

                <div class="content-group">
                    <h6 class="text-semibold">Datepicker animations</h6>
                    <p>Use different animations when opening or closing the datepicker.</p>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                <input type="text" class="form-control datepicker-animation" placeholder="Pick a date&hellip;">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <select class="form-control" id="anim">
                                <option value="show">Show (default)</option>
                                <option value="slideDown">Slide down</option>
                                <option value="fadeIn">Fade in</option>
                                <option value="blind">Blind (UI Effect)</option>
                                <option value="bounce">Bounce (UI Effect)</option>
                                <option value="clip">Clip (UI Effect)</option>
                                <option value="drop">Drop (UI Effect)</option>
                                <option value="fold">Fold (UI Effect)</option>
                                <option value="slide">Slide (UI Effect)</option>
                                <option value="">None</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /jQuery UI picker -->

@stop
@section('script')
<!-- Theme JS files -->
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/core/libraries/jquery_ui/datepicker.min.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/core/libraries/jquery_ui/effects.min.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/pickers/anytime.min.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/plugins/pickers/pickadate/legacy.js"></script>

    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/core/app.js"></script>
    <script type="text/javascript" src="{!! url('lib/theme') !!}/assets/js/pages/picker_date.js"></script>
    <!-- /theme JS files -->
<script type="text/javascript">
    $(document).ready(function(){

    });
</script> 
@stop
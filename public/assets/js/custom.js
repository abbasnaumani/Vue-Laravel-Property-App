// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
//
// $(function () {
//     var currentIntervalRef = setInterval(function () {
//         if ($('#current-timer').length > 0) {
//             document.getElementById("current-timer").innerHTML = new Date();
//         } else {
//             clearInterval(currentIntervalRef);
//         }
//     });
//     if (typeof isUserCheckin != 'undefined' && isUserCheckin) {
//         startCheckinTimer(userLastCheckinTime);
//     }
// });
//
//
// function validateFieldsByFormId(e) {
//     event.preventDefault();
//     //event.preventDefault();
//     const formId = $(e).closest('form').attr('id');
//     const formURL = $(e).closest('form').attr('action');
//     const modalId = $(e).closest('form').data('modal-id');
//     const validationSpanId = $(e).data('validation');
//     var error = validateFields(formId);
//     var errorMsg = '';
//     var flag = true;
//     if (error.length > 0) {
//         showErrors(error);
//         flag = false;
//
//     }
//     if (flag) {
//
//         e.disabled = true;
//         const buttonHtml = $(`#` + validationSpanId).html();
//         $(`#` + validationSpanId).html(loadingImage());
//         var formData = new FormData($('#' + formId)[0])
//         $.ajax({
//             type: "POST",
//             url: formURL,
//             data: formData,
//             dataType: "json",
//             processData: false,
//             contentType: false,
//             success: function (data) {
//                 e.disabled = false;
//                 // console.log(data.redirect_to);
//                 if (typeof data.html != 'undefined' && typeof data.html_section_id != 'undefined' && data.html != '') {
//                     $('#' + data.html_section_id).html(data.html);
//                 }
//                 console.log('before', data);
//                 if (data.status == 'success') {
//                     notificationAlert('success', data.message, 'Success!');
//                     if (data.redirect_to != '' && typeof (data.redirect_to) != "undefined") {
//                         setTimeout(function () {
//                             reload_page(data.redirect_to)
//                         }, 2000);
//                     }
//                     if (typeof data.html != 'undefined' && typeof data.html_section_id != 'undefined') {
//                         $('#' + data.html_section_id).html(data.html);
//                     }
//                     if (typeof data.checkin_history_html != 'undefined' && typeof data.html_history_section_id != 'undefined' && data.checkin_history_html != '') {
//                         $('#' + data.html_history_section_id).html(data.checkin_history_html);
//                         console.log(data.checkin_history_html, "saddique");
//                     }
//                     if ($('body').hasClass('modal-open') && typeof modalId != 'undefined' && modalId != '') {
//                         closeModalById(modalId);
//                     }
//                 } else {
//                     errorMsg = typeof data.message != "undefined" ? data.message : '';
//                     if (typeof data.errors != 'undefined') {
//                         var errors = data.errors;
//                         $.each(errors, function (i, val) {
//                             if (errors[i] != 'undefined' && errors[i] != null) {
//                                 let nowErrorMessage = errors[i];
//                                 if (i == 'errors') {
//                                     let newErrors = errors[i];
//                                     $.each(newErrors, function (index, value) {
//                                         nowErrorMessage = newErrors[index][0] ? newErrors[index][0] : '';
//                                     });
//                                 }
//                                 errorMsg += nowErrorMessage + '<br>';
//                             }
//                         });
//                     }
//                     notificationAlert('error', errorMsg, 'Inconceivable!');
//                 }
//                 if (typeof data.show_modal != 'undefined' && typeof data.modal_id != 'undefined' && data.html != '') {
//                     showModelById(data.modal_id, data);
//                 }
//                 $(`#` + validationSpanId).html(buttonHtml);
//             },
//             error: function (data) {
//                 $(`#` + validationSpanId).html(buttonHtml);
//                 e.disabled = false;
//                 // Error...
//                 console.log("erorrr");
//                 var errors = $.parseJSON(data.responseText);
//                 $.each(errors, function (i, val) {
//                     if (errors[i] != 'undefined' && errors[i] != null) {
//                         let nowErrorMessage = errors[i];
//                         if (i == 'errors') {
//                             let newErrors = errors[i];
//                             $.each(newErrors, function (index, value) {
//                                 nowErrorMessage = newErrors[index][0] ? newErrors[index][0] : '';
//                             });
//                         }
//                         errorMsg += nowErrorMessage + '<br>';
//                     }
//                 });
//                 notificationAlert('error', errorMsg, 'Inconceivable!');
//                 //  bsAlert(errorMsg, 'alert-danger', 'alert_placeholder');
//             }
//         });
//     }
// }
//
// function validateFields(formId) {
//     var fields = $("#" + formId + " :input").serializeArray();
//     var error = [];
//     $("#" + formId + " :file").each(function () {
//         const fileInputName = $(this)[0].name;
//         let fileInputNameValue = '';
//         const myFiles = $(this)[0].files;
//         Object.keys(myFiles).map(function (key, index) {
//             const file = myFiles[key];
//             fileInputNameValue = file.name;
//             console.log(file);
//         });
//         fields.push({ name: fileInputName, value: fileInputNameValue })
//     });
//     console.log(fields, formId);
//     var skipArray = ['action', 'date_range', 'date'];
//     var emailArray = ['email'];
//     var phoneNumberArray = ['phone_number'];
//     var skipforEmpty = [];
//     var fname = 'no_name';
//     var passwordArray = ['new_password', 'confirm_password'];
//
//     var regexy = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     var regexp_number = /^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/
//     $.each(fields, function (i, field) {
//         fname = field.name;
//         let elementObj = $("textarea[name='" + fname + "']");
//         if (elementObj) {
//             if (elementObj.hasClass('tinymce-editor-cls')) {
//                 field.value = tinyMCE.activeEditor.getContent();
//                 elementObj.val(field.value);
//             }
//         }
//
//         if ($.inArray(fname, skipArray) == -1) {
//             if ($.trim(field.value) == '') {
//                 if ($.inArray(fname, skipforEmpty) == -1) {
//
//                     var myregexp = /\[(.*?)\]/;
//                     var match = myregexp.exec(fname);
//                     if (match != null) {
//                         fname = match[1];
//                     }
//                     error[i] = 'Please enter ' + fname;
//                 }
//             } else if ($.inArray(fname, emailArray) > -1) {
//                 if (!regexy.test(field.value)) {
//                     error[i] = 'Please enter correct format of email (example@example.com)';
//                 }
//             } else if ($.inArray(fname, phoneNumberArray) > -1) {
//                 if (!regexp_number.test(field.value)) {
//                     error[i] = 'Please enter correct format of Phone number (+923123456789)';
//                 }
//             } else if ($.inArray(fname, passwordArray) > -1) {
//                 if ((field.value.length < 8)) {
//                     error[i] = 'Please enter at least 8 Characters for the password';
//                 }
//             }
//         }
//
//     });
//
//     return error;
// }
//
// function showErrors(errors) {
//     var msg = '';
//     var error = '';
//     $.each(errors, function (i, val) {
//         if (errors[i] != '' && typeof (errors[i]) != "undefined") {
//             error = errors[i] + '<br>';
//             msg += error.replace(/_/g, ' ').toLowerCase().replace(/\b[a-z]/g, function (letter) {
//                 return letter.toUpperCase();
//             });
//         }
//     });
//     if (msg != '') {
//         notificationAlert('error', msg);
//         //bsAlert(msg, 'alert-danger', 'alert_placeholder');
//     }
// }
//
// /*
//  * ## Type can be either error, success, warning Or info
//  * ## Content will show the Message to display
//  * ## Title is the heading of Message if any
//  * ## TimeOut in seconds
//  * */
// function notificationAlert(type, content, title, timeOut) {
//     if (type == '' || typeof (type) == "undefined") {
//         type = 'error';
//     }
//     if (content == '' || typeof (content) == "undefined") {
//         content = 'You Got Error';
//     }
//     if (title == '' || typeof (title) == "undefined") {
//         title = '';
//     }
//     if (timeOut == '' || typeof (timeOut) == "undefined") {
//         timeOut = 5; // in seconds
//     }
//     timeOut = timeOut * 1000;
//
//     /*// by Default Toastr accept time in Micro Seconds so multiplying by 1000*/
//
//     content = content.replace(/_/g, ' ');
//     toastr.options = {
//         "closeButton": true,
//         "debug": false,
//         "newestOnTop": false,
//         "progressBar": true,
//         "positionClass": "toast-top-right",
//         "preventDuplicates": true,
//         "onclick": null,
//         "showDuration": "300",
//         "hideDuration": "1000",
//         "timeOut": timeOut,
//         "extendedTimeOut": timeOut,
//         "showEasing": "swing",
//         "hideEasing": "linear",
//         "showMethod": "fadeIn",
//         "hideMethod": "fadeOut"
//     };
//     switch (type) {
//         case 'success':
//             toastr.success(content, title, { timeOut: timeOut });
//             break;
//         case 'error':
//             toastr.error(content, title, { timeOut: timeOut });
//             break;
//         case 'info':
//             toastr.info(content, title, { timeOut: timeOut });
//             break;
//         case 'warning':
//             toastr.warning(content, title, { timeOut: timeOut });
//             break;
//     }
// }
//
// function loadingImage() {
//     var html = '<img src="' + baseURL + '/assets/images/loading.gif" >';
//     return html;
// }
//
// function reload_page(url) {
//     location.href = baseURL + url;
// }
//
// /**
//  * Created by Abbas Naumani on 2/5/2018.
//  */
// function commonAjaxModel(route, id, containerId) {
//     event.preventDefault();
//     if (typeof (containerId) == "undefined" || containerId == '') {
//         containerId = 'common_popup_modal';
//     }
//     if (typeof (id) == "undefined" || id == '') {
//         id = 0;
//     }
//     if (typeof (route) == "undefined" || route == '') {
//         route = '';
//     }
//     if (route != '') {
//         var url = baseURL + '/' + route;
//         var dataToPost = { "containerId": containerId, "id": id };
//         $.ajax({
//             type: "POST",
//             url: url,
//             data: dataToPost,
//             dataType: "json",
//             success: function (data) {
//                 if (data.status == 'success') {
//                     showModelById(containerId, data)
//                 }
//                 if (data.status == 'error') {
//
//                     notificationAlert('error', data.message, 'Inconceivable!');
//                 }
//             }, error: function (data) {
//                 console.log('error', data);
//                 notificationAlert('error', data.responseJSON.message, 'Inconceivable!');
//             }
//         });
//     } else {
//         notificationAlert('error', 'Route is not defined', 'Inconceivable!');
//     }
//     //  tinymce.remove('.tinymce-editor-cls');
// }
//
// /**
//  * Created by Abbas Naumani on 2/5/2018.
//  */
// function showModelById(containerId, data) {
//     if (typeof (containerId) == "undefined" || containerId == '') {
//         containerId = 'common_popup_modal';
//     }
//     /*If Modal Div not defined*/
//     if ($('#' + containerId + '_mp').length == 0) {
//         $("body").append('<div id="' + containerId + '_mp"></div>');
//     }
//     /*Put Modal HTML in Modal Placeholder*/
//     $('#' + containerId + '_mp').html(data.html);
//     /*Show Modal*/
//     $('#' + containerId).modal('show');
//
//
// }
//
// /*
//  * TO CLOSE SPECIFIC MODAL
//  */
// function closeModalById(id) {
//     //$('#' + id + '_close').click();
//     $('#' + id).modal('hide');
//     setTimeout(function () {
//         $('#' + id + '_mp').html('');
//     }, 1000);
//     uploadedFilesData = [];
//
// }
//
//
// function ajaxCallOnclick(route, extraData) {
//     // console.log(extraData+"asadasd");
//     console.log(extraData);
//     /*var today = new Date();
//     if(today.getDay() == 6 || today.getDay() == 0) alert('Weekend!');*/
//     if (route != '') {
//         const url = baseURL + '/' + route;
//         console.log(url);
//         var el = this;
//         let dataToPost = typeof extraData != 'undefined' ? extraData : {};
//         console.log(url);
//         $.ajax({
//             type: "POST",
//             url: url,
//             data: dataToPost,//dataToPost,
//             dataType: "json",
//             success: function (data) {
//                 console.log(data.html);
//                 // console.log('RN',data)
//                 if (typeof data.html != 'undefined' && typeof data.html_section_id != 'undefined' && data.html != '') {
//                     $('#' + data.html_section_id).html(data.html);
//                 }
//                 if (typeof data.show_modal != 'undefined' && typeof data.modal_id != 'undefined' && data.html != '') {
//                     showModelById(data.modal_id, data);
//                 }
//                 if (typeof data.checkin_history_html != 'undefined' && typeof data.html_history_section_id != 'undefined' && data.checkin_history_html != '') {
//                     $('#' + data.html_history_section_id).html(data.checkin_history_html);
//
//                 }
//                 if (data.status == 'success') {
//                     notificationAlert('success', data.message, 'Success!');
//                     if (typeof dataToPost.method_to_execute != 'undefined' && dataToPost.method_to_execute != '') {
//                         window[extraData.method_to_execute]();
//                     }
//                 } else {
//                     notificationAlert('error', data.message, 'Inconceivable!');
//                 }
//                 const containerId = typeof extraData.containerId != "undefined" ? extraData.containerId : false;
//                 if ($('body').hasClass('modal-open') && containerId) {
//                     closeModalById(containerId);
//                     //$(this).closest('tr').css('background','tomato');
//                     // $(this).closest('tr').fadeOut(800,function(){
//                     //    $(this).remove();
//                     //    });
//                 }
//                 if (data.status == 'error') {
//
//                     notificationAlert('error', data.message, 'Inconceivable!');
//                 }
//             }, error: function (data) {
//                 console.log('error');
//             }
//         });
//
//     } else {
//         notificationAlert('error', 'Route is not defined', 'Inconceivable!');
//     }
// }
//
// var startCheckinTimer = function (startTime) {
//     const startDateTime = (typeof startTime != "undefined" && startTime != '' && startTime != null) ? startTime : null;
//     var countDownDate = startDateTime ? new Date(startDateTime).getTime() : new Date().getTime(); //"Jan 8, 2021 6:37:25"
//     // Update the count down every 1 second
//     const intervalRef = setInterval(function () {
//
//         // Get today's date and time
//         var now = new Date().getTime();
//
//         // Find the distance between now and the count down date
//         var distance = now - countDownDate;
//
//         // Time calculations for days, hours, minutes and seconds
//         var days = Math.floor(distance / (1000 * 60 * 60 * 24));
//         var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//         var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//         var seconds = Math.floor((distance % (1000 * 60)) / 1000);
//         // Output the result in an element with id="demo"
//         let DaysTimer = ((days > 1) ? days + ' Days, ' : ((days > 0) ? days + 'Day, ' : ''));
//         if ($('#checkin-timer').length > 0) {
//             document.getElementById("checkin-timer").innerHTML = DaysTimer + hours + "h "
//                 + minutes + "m " + seconds + "s ";
//             // If the count down is over, write some text
//             if (distance < 0) {
//                 clearInterval(intervalRef);
//                 document.getElementById("checkin-timer").innerHTML = "EXPIRED";
//             }
//         } else {
//             clearInterval(intervalRef);
//         }
//     }, 1000);
// }
//
//
// /*jQuery(function() {
//                 jQuery('input[name="date_range"]').daterangepicker({
//                     autoApply: true,
//                     timePicker: true,
//                     locale: {
//                         cancelLabel: 'Clear'
//                     }
//                 });
//                 jQuery('input[name="date_range"]').on('apply.daterangepicker', function(ev, picker) {
//                     jQuery(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
//                 });
//                 jQuery('input[name="date_range"]').on('cancel.daterangepicker', function(ev, picker) {
//                     jQuery(this).val('');
//                 });
//                 jQuery('input[name="date"]').daterangepicker({
//                     "singleDatePicker": true,
//                     "locale": {
//                         "format": "DD-MM-YYYY",
//                     }
//                 });
//             });
// */
//
// /*jQuery(document).ready(function() {
//
// $(function() {
//     $('input[name="date_range"]').daterangepicker({
//         autoApply: true,
//         timePicker: true,
//         locale: {
//             cancelLabel: 'Clear'
//         }
//     });
//     $('input[name="date_range"]').on('apply.daterangepicker', function(ev, picker) {
//         $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
//     });
//     $('input[name="date_range"]').on('cancel.daterangepicker', function(ev, picker) {
//         $(this).val('');
//     });
//     $('input[name="date"]').daterangepicker({
//         "singleDatePicker": true,
//         "locale": {
//             "format": "DD-MM-YYYY",
//         }
//     });
// });
// // $(function() {
// //     $('input[name="date_range"]').daterangepicker({
// //         autoApply: true,
// //         timePicker: true,
// //         locale: {
// //             cancelLabel: 'Clear'
// //         }
// //     });
// //     $('input[name="date_range"]').on('apply.daterangepicker', function(ev, picker) {
// //         $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
// //     });
// //     $('input[name="date_range"]').on('cancel.daterangepicker', function(ev, picker) {
// //         $(this).val('');
// //     });
// //     $('input[name="date"]').daterangepicker({
// //         "singleDatePicker": true,
// //         "locale": {
// //             "format": "DD-MM-YYYY",
// //         }
// //     });
// // });
//
// /*$(document).ready(function() {
//
//     if ("geolocation" in navigator) {
//         console.log("gl available");
//         navigator.geolocation.getCurrentPosition(position => {
//             console.log(position.coords.latitude + "," + position.coords.longitude);
//
//             $.post("attendance_get_location",
//             {
//                 lat: position.coords.latitude,
//                 lon: position.coords.longitude,
//                 '_token': $('meta[name=csrf-token]').attr('content'),
//             }
//             , function(data) {
//                 console.log(!'{{ $registered_attendance }}')
//                 console.log("data is"+ data);
//                     $('#entry_loc').val(data);
//                     $('#entry_location').val(data);
//                     if('{{ $attendance_mark }}') {
//                         $('#exit_loc').val(data);
//                         $('#exit_location').val(data);
//                     }
//             });
//         }, function() {
//             $('#address').val('Denied Permission to retreive location');
//         });
//     } else {
//         $('#address').html("Location not available");
//     }
// });*/
//
// /*jQuery(function() {
//     jQuery('input[name="date_range"]').daterangepicker({
//         autoApply: true,
//         timePicker: true,
//         locale: {
//             cancelLabel: 'Clear'
//         }
//     });
//     jQuery('input[name="date_range"]').on('apply.daterangepicker', function(ev, picker) {
//         jQuery(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
//     });
//     jQuery('input[name="date_range"]').on('cancel.daterangepicker', function(ev, picker) {
//         jQuery(this).val('');
//     });
//     jQuery('input[name="date"]').daterangepicker({
//         "singleDatePicker": true,
//         "locale": {
//             "format": "DD-MM-YYYY",
//         }
//     });
// });*/
//
// /*$(document).ready(function() {
//     console.log("welcome");
//     $('#date_range').daterangepicker({
//         "locale": {
//             "format": "DD-MM-YYYY",
//         }
//     });
//     $('#date').daterangepicker({
//         "singleDatePicker": true,
//         "locale": {
//             "format": "DD-MM-YYYY",
//         }
//     });
//
//
//     console.log("Bye");
// });*/
//
// //  $('#date_range').daterangepicker();
//
// function showDate() {
//     $('#range-group').toggleClass('hide-input');
//     $('#date-group').toggleClass('hide-input');
//     $('#half-day').toggleClass('hide-input');
// }
//
// //$(document).off('.datepicker.data-api');
// /*$('.datepicker').datepicker({
//     format: 'mm/dd/yyyy',
//     startDate: '-3d'
// });*/
//
//
// $(function () {
//     $('#email').blur(function () {
//         // $('#result').text('test');
//         var email = $("#email").val();
//         $("#result").val('');
//         if (!EmailMask($("#email").val())) {
//             $('#result').text('Please enter valid email');
//         } else {
//             $.ajax({
//                 url: "check_email",
//                 type: "POST",
//                 data: { email: email },
//                 success: function (data) {
//                     console.log(data);
//                     if (data.status == 'success') {
//                         $('#result').text('Email Already Exist');
//                     } else if (data.status == 'error') {
//                         $('#result').text('');
//                     }
//                 }
//             });
//         }
//     });
// });
//
// $(function () {
//     $('#current_password').blur(function () {
//         // $('#result').text('test');
//         var current_password = $("#current_password").val();
//         var base_url = window.location.origin;
//         base_url = base_url + "/check/current/password";
//         $("#password_result").val('');
//         $.ajax({
//             url: base_url,
//             type: "POST",
//             data: { current_password: current_password },
//             success: function (data) {
//                 console.log(data);
//                 if (data.status == 'success') {
//                     $('#isValid').removeClass('notvalid');
//                     $('#isValid').addClass('isvalid');
//                     // $('#password_result').text('');
//                 } else if (data.status == 'error') {
//                     $('#isValid').removeClass('isvalid');
//                     $('#isValid').addClass('notvalid');
//                     //$('#password_result').text(data.message.data);
//                 }
//             }
//         });
//     });
// });
//
// function EmailMask(email) {
//     var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
//     return expr.test(email);
// }
//
// function updateFormAction(id) {
//     let el = $(`#${id}`);
//     const formURL = el.closest('form').attr('action');
//     console.log('sad', formURL);
//     el.closest('form').attr('action', formURL + '/1');
//     console.log('updated', el.closest('form').attr('action'));
//     validateFieldsByFormId(el);
// }

/**
 * Created by PhpStorm.
 * User: mfarid
 * Date: 15/02/19
 * Time: 03.28
 */



var active_modal = "";
var modal_delay = 300;
var baseURL = "";
var fnPositiveButton, fnNegativeButton;
var csrfParam = '_token';

function ajaxTransfer(url, data, callback, asJson,hide=true){
    asJson = typeof asJson == 'undefined' ? false : true;


    if(asJson){
        ajaxAsJson(url, data, callback,hide);
    } else{
        ajaxAsXhr(url, data, callback,hide);
    }
}

function ajaxAsJson(url, data, callback,hide=true){
    var response, csrfToken;
    url = baseURL + url;
    if(url.substring(0,2) == '//'){
        url = url.substring(1, url.length);
    }

    if((data instanceof FormData)){
        data = Object.toFormData(data);
        data = data.serializeArray();
    }

    csrfToken = $('input[name='+csrfParam+']').val();
    data = {
        json_data: JSON.stringify(data)
    }
    data[csrfParam] = csrfToken;

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function(response){
            if(typeof callback == 'string'){
                $(callback).html(response);
            } else{
                callback(response);
            }

            setInputPlaceholder();
            validateRequiredInput();
            if(hide)
                hideLoading();
        },
        error: function(e){
            if(typeof callback == 'string'){
                $(callback).html(response);
            }

            console.log(e);
            if(hide)
                hideLoading();
        }
    })
}

function ajaxAsXhr(url, data, callback,hide = true){
    var response, csrfToken;
    url = baseURL + url;
    if(url.substring(0,2) == '//'){
        url = url.substring(1, url.length);
    }

    if(!(data instanceof FormData)){
        data = Object.toFormData(data);
    }

    csrfToken = $('input[name='+csrfParam+']').val();
    data.append(csrfParam, csrfToken);

    showLoading();
    var xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.onload = function () {
        response = xhr.responseText;
        if (xhr.status === 200) {
            if(typeof callback == 'string'){
                $(callback).html(response);
            } else{
                callback(response);
            }

            setInputPlaceholder();
            validateRequiredInput();
        } else {
            if(typeof callback == 'string'){
                $(callback).html(response);
            }

            console.log('ajax error! status : ' + xhr.status);
            console.log(xhr);
        }
        if(hide)
            hideLoading();
    };
    xhr.send(data);
}

function modalAlert(title, message){
    $('.modal-backdrop, #modal-target.modal').remove();

    var modal_box = "";
    modal_box += "<div aria-hidden='true' aria-labelledby='myModalLabel' role='dialog' tabindex='-1' id='modal-target' class='modal fade' style='display: none;'>";
    modal_box += "<div class='modal-dialog'>";
    modal_box += "<div class='modal-content'>";
    modal_box += "<div class='modal-header'>";
    modal_box += "<button aria-hidden='true' data-dismiss='modal' class='close' onclick='removeModal(this)' rel='modal-target' type='button'>&#215;</button>";
    modal_box += "<h4 class='modal-title'>" + title + "</h4>";
    modal_box += "</div>";
    modal_box += "<div id='modal-output' class='modal-body'>"+message+"</div>";
    modal_box += "</div>";
    modal_box += "</div>";
    modal_box += "</div>";

    $('html').append(modal_box);
    $('#modal-target').modal('show');
}

function modalConfirm(title, message, positiveButton, negativeButton){
    if(typeof(positiveButton) == 'function'){
        fnPositiveButton = positiveButton;
    }
    if(typeof(negativeButton) == 'function'){
        fnNegativeButton = negativeButton;
    }

    $('.modal-backdrop, #modal-target.modal').remove();

    var modal_box = "";
    modal_box += "<div aria-hidden='true' aria-labelledby='myModalLabel' role='dialog' tabindex='-1' id='modal-target' class='modal fade' style='display: none;'>";
    modal_box += "<div class='modal-dialog'>";
    modal_box += "<div class='modal-content'>";
    modal_box += "<div class='modal-header'>";
    modal_box += "<h4 class='modal-title'>" + title + "</h4>";
    modal_box += "<button aria-hidden='true' data-dismiss='modal' class='close' onclick='removeModal(this)' rel='modal-target' type='button'><span aria-hidden='true'>&times;</span></button>";
    modal_box += "</div>";
    modal_box += "<div id='modal-output' class='modal-body'>"+message+"<div id='confirm-button-action'><a onclick='negativeButtonClick()' class='btn btn-danger'>Cancel</a><a onclick='positiveButtonClick()' class='btn btn-primary'>Ok</a></div></div>";
    modal_box += "</div>";
    modal_box += "</div>";
    modal_box += "</div>";

    $('html').append(modal_box);
    $('#modal-target').modal('show');
}

function positiveButtonClick(){
    if(typeof(fnPositiveButton) != 'function'){
        return false;
    } else{
        fnPositiveButton();
    }
}

function negativeButtonClick(){
    if(typeof(fnNegativeButton) != 'function'){
        closeModal();
    } else{
        fnNegativeButton();
    }
}

function loadModal(t){
    t.setAttribute('href', '#modal-target');
    t.setAttribute('data-toggle', 'modal');

    var title = t.getAttribute('title');
    if(title == null) title = t.innerHTML;
    $('.modal-backdrop, #modal-target.modal').remove();

    var modal_box = "";
    modal_box += "<div aria-hidden='true' aria-labelledby='myModalLabel' role='dialog'  id='modal-target' class='modal fade' style='display: none;'>";
    modal_box += "<div class='modal-dialog modal-lg'>";
    modal_box += "<div class='modal-content'>";
    modal_box += "<div class='modal-header'>";
    modal_box += "<h4 class='modal-title'>" + title + "</h4>";
    modal_box += "<button aria-hidden='true' data-dismiss='modal' class='close' onclick='removeModal(this)' rel='modal-target' type='button'><span aria-hidden='true'>&times;</span></button>";
    modal_box += "</div>";
    modal_box += "<div id='modal-output' class='modal-body'></div>";
    modal_box += "</div>";
    modal_box += "</div>";
    modal_box += "</div>";

    $('html').append(modal_box);

    var data = t.getAttribute('data');
    var ajaxData = new FormData();
    var ajaxUrl = t.getAttribute('target');

    if(data == null){
        data = [];
    } else{
        data = data.split(';');
    }

    for(var i=0; i<data.length; i++){
        if(data[i].length == 0) continue;
        else{
            var temp  = data[i].split('=');
            var key   = temp[0];
            var value = temp[1];

            ajaxData.append(key, value);
        }
    }
    ajaxTransfer(ajaxUrl, ajaxData, '#modal-output');
}

function removeModal(t){
    var modal_id = t.getAttribute('rel');
    $('.modal, .modal-overlay, .modal-backdrop').animate({opacity: 0}, modal_delay);
    setTimeout(function(){
        $('#modal-target.modal, .modal-overlay, .modal-backdrop').remove();
        $('body').removeClass('modal-open');
    }, modal_delay);
}

function closeModal(timeout){
    if(timeout == undefined) $('.modal-header .close').click();
    else{
        timeout = parseInt(timeout);
        setTimeout(function(){
            $('.modal-header .close').click();
        }, timeout);
    }
}

function showLoading(){
    $('#loading-screen').css({display: 'block'});
    $('#loading-screen').animate({opacity: '1'}, 100);
}

function hideLoading(){
    $('#loading-screen').animate({opacity: '0'}, 100);
    setTimeout(function(){
        $('#loading-screen').css({display: 'none'});
    }, 100);
}

function reload(timeout){
    if(timeout == undefined) location.reload();
    else{
        timeout = parseInt(timeout);
        setTimeout(function(){
            location.reload();
        }, timeout);
    }
}

function initiateLoadingBar(){
    var new_element = "";
    new_element += "<div id='loading-screen'>";
    new_element += "<div id='loading-box'>";
    new_element += "<span>Sedang mengolah data, mohon tunggu...</span>";
    new_element += "</div>";
    new_element += "</div>";
    new_element += "<div id='global-temp'></div>";

    $(document).ready(function(){
        $('body').append(new_element);
    });
}

function getFormData(formId, asObject){
    if(typeof asObject == 'boolean' && asObject){
        var $form = $("#"+formId);
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};

        $.map(unindexed_array, function(n, i){
            indexed_array[n['name']] = n['value'];
        });

        return indexed_array;
    }

    var formData = new FormData();
    var input = $('#'+formId+' input');
    var select = $('#'+formId+' select');
    var textarea = $('#'+formId+' textarea');
    var ignored = ['submit', 'button', 'reset'];
    var i, j, inputType, inputName, inputValue, file, files;

    for(i=0; i<input.length; i++){
        inputType = input[i].getAttribute('type');
        inputName = input[i].getAttribute('name');
        inputValue = input[i].value;

        if(ignored.indexOf(inputType) != -1){
            continue;
        } else if(inputType == 'checkbox'){
            if(!input[i].checked){
                inputValue = null;
            }
            formData.append(inputName, inputValue);
        } else if(inputType == 'radio'){
            inputValue = $('input[name="'+inputName+'"]:checked').val();
            formData.append(inputName, inputValue);
        } else if(inputType == 'file'){
            files = input[i].files;
            for (j=0; j<files.length; j++) {
                file = files[j];
                formData.append(inputName, file, file.name);
            }
        } else{
            formData.append(inputName, inputValue);
        }
    }

    for(i=0; i<select.length; i++){
        inputName = select[i].getAttribute('name');
        inputValue = select[i].value;
        formData.append(inputName, inputValue);
    }

    for(i=0; i<textarea.length; i++){
        inputName = textarea[i].getAttribute('name');
        inputValue = textarea[i].value;
        formData.append(inputName, inputValue);
    }

    return formData;
}

function setInputPlaceholder(){
    var labels = $('label');
    var label, placeholder;

    for(var i=0; i<labels.length; i++){
        label = $(labels[i]).attr('for');
        placeholder = $(labels[i]).html();
        $(labels[i]).parents('form').find('*[name='+label+']').attr('placeholder', placeholder);
    }
}

function validateRequiredInput(){
    var required = $(':required');
    for(var i=0; i<required.length; i++){
        $(required[i]).blur(function(t){
            var element = t.currentTarget;
            var value = $(element).val();
            var parent = $(element).parent();

            if(value.length == 0){
                $(parent).addClass('has-error');
            } else{
                $(parent).removeClass('has-error');
            }
        });
    }
}

function scrollToTop(){
    $('html, body').animate({
        scrollTop: 0
    }, 'slow');
}

/*function chevronActive(classname){
    $('.chevron-shapes li').removeClass('active');
    $('.chevron-shapes li.'+classname).addClass('active');
}*/

function isValidDate(dateString){
    // First check for the pattern
    if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
        return false;

    // Parse the date parts to integers
    var parts = dateString.split("/");
    var day = parseInt(parts[0], 10);
    var month = parseInt(parts[1], 10);
    var year = parseInt(parts[2], 10);

    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12)
        return false;

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];
};

function pad(n, width, z) {
    z = z || '0';
    n = n + '';
    return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

function getCsrfToken(){
    return $('input[name='+csrfParam+']').val();
}


function redirect(timeout, url){
    if(timeout == undefined) location.reload();
    else{
        timeout = parseInt(timeout);
        setTimeout(function(){
            window.location= baseURL+url;
        }, timeout);
    }
}


$(document).ready(function(){
    initiateLoadingBar();
    setInputPlaceholder();
    validateRequiredInput();
})

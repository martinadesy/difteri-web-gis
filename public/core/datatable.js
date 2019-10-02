var csrfParam = '_token';

function ajaxDataTable(selector, url, collumn, defaultOrder){
    $.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings ) {
        return {
            "iStart":         oSettings._iDisplayStart,
            "iEnd":           oSettings.fnDisplayEnd(),
            "iLength":        oSettings._iDisplayLength,
            "iTotal":         oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
            "iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
        };
    };

    if(typeof defaultOrder == 'undefined'){
        defaultOrder = [ 1, "asc" ];
    }

    csrfToken = $('input[name='+csrfParam+']').val();
    $(selector).DataTable({
        language:{paginate:{previous:"<i class='fas fa-angle-left'>",next:"<i class='fas fa-angle-right'>"}},
        processing: true,
        serverSide: true,
        iDisplayLength: 25,
        stateSave:true,
        ajax: {
            url: baseURL + url,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        },
        columns: collumn,
        order: [defaultOrder],
        fnDrawCallback: function(x) {
            var currentPage = this.fnPagingInfo().iPage;
            var displayLength = this.fnPagingInfo().iLength;
            var page = (currentPage * displayLength) + 1;
            rearrangeDataTableNumbering(selector, page);
        }
    });
}

function dataTable(selector){
    $(document).ready(function(){
        $.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings ) {
            return {
                "iStart":         oSettings._iDisplayStart,
                "iEnd":           oSettings.fnDisplayEnd(),
                "iLength":        oSettings._iDisplayLength,
                "iTotal":         oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
                "iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
            };
        }

        $(selector).DataTable({
            'iDisplayLength': 25,
            order: [[ 1, "asc" ]],
            'fnDrawCallback': function(x) {
                var currentPage = this.fnPagingInfo().iPage;
                var displayLength = this.fnPagingInfo().iLength;
                var page = (currentPage * displayLength) + 1;
                rearrangeDataTableNumbering(selector, page);
            }
        });
    });
}


function rearrangeDataTableNumbering(selector, page){
    var firstField = $(selector).find('th:first-child').html().toLowerCase();
    if(firstField == 'no'){
        var trList = $(selector).find('tbody tr');
        for(var i=0; i<trList.length; i++){
            $(trList[i]).find('td:first-child').html(page+i);
        }
    }
}


$(function () {
    account = ()=> {
        $("#allAccount").dataTable().fnClearTable();
        $("#allAccount").dataTable().fnDraw();
        $("#allAccount").dataTable().fnDestroy();
        $("#allAccount").dataTable({
            responsive: true,
            sortable: true,
            searchable: true,
            order: [],
            // columnDefs: [{f
            //     "orderable": true,
            //     "targets": [3]
            // }],
            columns: [
                {
                    data: null,
                    name: "user_type",
                    width: "15%",
                    className: "align-middle",
                    render: function(aData, type, row) {
                        let user_type = "";
                        user_type +=
                            aData.user_type
                            return user_type; }
                },
                {
                    data: null,
                    width: "20%",
                    render: function (aData, type, row) {
                        let fullname = "";
                        fullname +=
                            aData.first_name + " " + aData.last_name
                        return fullname;
                    },
                    className: "align-middle",
                },
                {
                    data: null,
                    name: "username",
                    width: "15%",
                    className: "align-middle",
                    render: function(aData, type, row) {
                        let username = "";
                        username +=
                            aData.username
                            return username; }
                },
                {
                    data: null,
                    name: "status",
                    width: "10%",
                    className: "align-middle",
                    render: function(aData, type, row) {
                        let status = "";
                        if (aData.status == "Active") {
                            status +=
                                '<span class="badge badge-success badge-pill px-3">Active</span>';
                        }
                        if (aData.status == "Inactive") {
                            status +=
                                '<span class="badge badge-danger badge-pill">Inactive</span>';
                        }
                    
                        return status;
                    }
                },
                {
                    data: null,
                    width: "10%",
                    render: function (aData, type, row) {
                        let buttons = "";
                        buttons +=
                            '<div class="text-center dropdown"> <div class="btn btn-sm btn-default" data-toggle="dropdown" role="button"> <i class="fas fa-ellipsis-v"></i> </div>' +

                            '<div class="dropdown-menu dropdown-menu-right">' +
                            ' <div class="dropdown-item d-flex" role="button" id="view_details" onClick="return editData(\'' +
                            aData["id"] +
                            '\',0)">' +
                            '<div style="width: 2rem">' +
                            ' <i class="fas fa-list mr-1"></i>' +
                            '</div>' +
                            '<div>View Details</div>' +
                            '</div>';
                        buttons +=
                            '<div class="dropdown-item d-flex" role="button"  onClick="return editData(\'' +
                            aData["id"] +
                            '\',1)">' +
                            '<div style="width: 2rem">' +
                            '<i class="fas fa-edit mr-1"></i>' +
                            ' </div>' +
                            '<div>Edit Details</div>' +
                            '</div>'
                        if (aData.status == "Active") {
                            buttons +=
                                '<div class="dropdown-item d-flex" role="button" onClick="return reset(\'' +
                                aData["id"] +
                                '\',0)">' +
                                '<div style="width: 2rem">' +
                                '<i class="fas fa-clock mr-1"></i>' +
                                ' </div>' +
                                '<div>Reset</div>' +
                                '</div>'

                            buttons +=
                                '<div class="dropdown-divider"></div>' +
                                '<div class="dropdown-item d-flex" role="button" onClick="return deleteData(\'' +
                                aData["id"] +
                                '\',0)">' +
                                '<div style="width: 2rem">' +
                                '<i class="fas fa-archive mr-1"></i>' +
                                ' </div>' +
                                '<div>Archive</div>' +
                                '</div>'
                        }
                        if (aData.status == "Inactive") {
                            buttons +=
                                '<div class="dropdown-divider"></div>' +
                                '<div class="dropdown-item d-flex" role="button" onClick="return retriveData(\'' +
                                aData["id"] +
                                '\',0)">' +
                                '<div style="width: 2rem">' +
                                '<i class="fas fa-clock mr-1"></i>' +
                                ' </div>' +
                                '<div>Retrieve</div>' +
                                '</div>'
                        }
                        
                        return buttons;
                    }
                },

            ],
            ajax: {
                url: "get/account",
                type: "GET",
            },

        });
    }
    account();
})

$('#accountForm').on('submit', function (event) {
	event.preventDefault();
    if($('#uuid').val() == ''){
        //Add data
        $.ajax({
            url: "add/account",
            method: "POST",
            data: {
                user_type: $('#user_type').val(),
                first_name: $('#firstname').val(),
                last_name: $('#lastname').val(),
            },
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
               if(data.response == 'success'){
                    account()
                    toastr.success('Successful')
                    $("#modal-lg").modal('hide');

               }
            }
        })
    }else{
        //update data
        $.ajax({
            url: "update/account/" + $('#uuid').val(),
            method: "PUT",
            data: {
                user_type: $('#user_type').val(),
                first_name: $('#firstname').val(),
                last_name: $('#lastname').val(),
            },
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
               if(data.response == 'success'){
                    account()
                    toastr.success('Successful')
                    $("#modal-lg").modal('hide');
               }
            }
        })
    }

})



editData = (id, type) => {
    console.log(id)
	$.ajax({
		url: "get/account/"+ id,
		type: "GET",
		dataType: "json",
		success: function (data) {
			if (data) {
				$(".modal-body #account_type").val(data.user_type).trigger('change')
                $(".modal-body #firstname").val(data.first_name)
                $(".modal-body #lastname").val(data.last_name)
                $(".modal-body #uuid").val(data.id)
                $("#modal-lg").modal('show');
				// if data is for viewing only
				if (type == 0) {
                    $(".title").text('View account')
					$("#accountForm input, select, textarea").prop("disabled", true);
					$("#accountForm button").prop("disabled", false);
					$(".submit").hide();
				} else if (type == 1) {
					$(".title").text('Update account')
					$("#accountForm input, select, textarea").prop("disabled", false);
					$(".submit").show();
				}
			} else {
				toastr.error('failed')
			}
		},
		error: function (data) {},
	});
};


$( ".clickClose" ).click(function() {
    $('#accountForm').trigger("reset");
    $(".submit").show();
    $("#accountForm input, select, textarea").prop("disabled", false);
  });
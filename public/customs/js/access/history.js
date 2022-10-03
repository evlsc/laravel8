$(function () {
    $("#history").dataTable().fnClearTable();
    $("#history").dataTable().fnDraw();
    $("#history").dataTable().fnDestroy();
    $("#history").dataTable({
        responsive: true,
        sortable: true,
        searchable: true,
        order: [],
        // columnDefs: [{f
        //     "orderable": true,
        //     "targets": [3]
        // }],
        columns: [{
                data: null,
                width: "15%",
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
                name: "category",
                width: "15%",
                className: "align-middle",
                render: function(aData, type, row) {
                    let category = "";
                    category +=
                        aData.category
                        return category; }
            },
            {
                data: null,
                name: "description",
                width: "20%",
                className: "align-middle",
                render: (data) => {
                    var description = data.description
                    return description }
            },
            {
                data: null,
                width: "15%",
                render: function (aData, type, row) {
                    let date_created = "";
                    date_created +=
                        moment(aData.created_at).format('MMMM D,YYYY | hh:mm:ss A')
                    return date_created;
                },
                className: "align-middle",
            },

        ],
        ajax: {
            url: "history",
            type: "GET",
        },

    });

})

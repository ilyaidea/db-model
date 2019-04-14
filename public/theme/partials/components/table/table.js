var dataSet = [
    [ "اسید", "$320,800","ff","dd","$320,800" ],
    [ "سولفات", "$170,750","fd","gd","$320,800" ],
    [ "منیزیم", "$86,000","dd","df","$320,800" ],
    [ "اسید", "$320,800","gf","gf","$320,800"],
    [ "سولفات", "$170,750","df","ddd","$320,800" ],
    [ "منیزیم", "$86,000","fs","sf","$320,800"],
];


$('#example tfoot th#title').each(function () {
    var title = $(this).text();
    $(this).html('<input type="text" placeholder=" جستجو در ' + title + '" />');
});

var table = $('#example').DataTable({

    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.modal({
                header: function (row) {
                    var data = row.data();
                    return 'Details for ' + data[0] + ' ' + data[1];
                }
            }),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll(),
        }
    },
    columnDefs: [
        { className: 'none',
            targets:   -1,
        },
    ],
    fixedColumns: true,
    scrollY: "250",
    deferRender: true,
    scroller: {
        srowHeight: 40,
    },
    dom: "<<'table't>>",
    data: dataSet,
    columns: [
        {title: "عنوان",
            width:"15%",
            className:"dt-center",
        },
        {title: "قیمت",
            width:"30%",
            className:"dt-center"},
        {title: "تغیرات",
            width:"10%",
            className:"dt-center",
        },
        {title: "حداقل",
            width:"20%",className: "none"},
        {title: "حداکثر",
            width:"20%",className: "none"},
    ],
});

table.columns().every(function () {
    var that = this;

    $('input', this.footer()).on('keyup change', function () {
        if (that.search() !== this.value) {
            that
                .search(this.value)
                .draw();
        }
    });
});
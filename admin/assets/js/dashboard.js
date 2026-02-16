$(document).ready(function () {
    //------------------------------------------------------------------------------------------------------------------
    // Sales Analytics Chart
    //------------------------------------------------------------------------------------------------------------------
    if ($('#saleAnalytics').length) {
        var saleAnalyticsoptions = {
            series: [{
                name: 'Stock',
                color: '#0D99FF',
                data: [31, 40, 28, 51, 42, 109, 100]
            }, {
                name: 'Order',
                color: '#a9b4cc',
                data: [11, 32, 45, 32, 34, 52, 41]
            }],
            chart: {
                height: 354,
                type: 'area',
                toolbar: {
                    show: false
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 1,
                curve: 'smooth'
            },
            xaxis: {
                fill: '#FFFFFF',
                type: 'datetime',
                categories: ["2022-12-19T00:00:00.000Z", "2022-12-20T00:00:00.000Z", "2022-12-21T00:00:00.000Z", "2022-12-22T00:00:00.000Z", "2022-12-23T00:00:00.000Z", "2022-12-24T00:00:00.000Z", "2022-12-25T00:00:00.000Z"],
                labels: {
                    format: 'dddd',
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            grid: {
                borderColor: '#334652',
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: true,
                    }
                },
                padding: {
                    bottom: 15
                }
            },
            responsive: [{
                breakpoint: 479,
                options: {
                    chart: {
                        height: 250,
                    },
                },
            }]
        };
        var saleAnalytics = new ApexCharts(document.querySelector("#saleAnalytics"), saleAnalyticsoptions);
        saleAnalytics.render();
    }
    if ($('#balanceOverview').length) {
        var balanceOverviewoptions = {
            series: [{
                name: 'Stock',
                color: '#0D99FF',
                data: [31, 40, 28, 51, 42, 109, 100, 40, 28, 51, 42, 109]
            }, {
                name: 'Order',
                color: '#a9b4cc',
                data: [11, 32, 45, 32, 34, 52, 41, 32, 45, 32, 34, 52]
            }],
            chart: {
                height: 396,
                type: 'bar',
                stacked: true,
                toolbar: {
                    show: false
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 0,
                curve: 'smooth'
            },
            xaxis: {
                fill: '#FFFFFF',
                type: 'datetime',
                categories: ["2022-12-19T00:00:00.000Z", "2022-12-20T00:00:00.000Z", "2022-12-21T00:00:00.000Z", "2022-12-22T00:00:00.000Z", "2022-12-23T00:00:00.000Z", "2022-12-24T00:00:00.000Z", "2022-12-25T00:00:00.000Z", "2022-12-26T00:00:00.000Z", "2022-12-27T00:00:00.000Z", "2022-12-28T00:00:00.000Z", "2022-12-29T00:00:00.000Z", "2022-12-30T00:00:00.000Z"],
                labels: {
                    datetimeFormatter: {
                        month: 'MMMM',
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            grid: {
                borderColor: '#334652',
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: true,
                    }
                },
                padding: {
                    bottom: 15
                }
            },
            responsive: [{
                breakpoint: 1199,
                options: {
                    chart: {
                        height: 365,
                    },
                },
            }, {
                breakpoint: 991,
                options: {
                    chart: {
                        height: 300,
                    },
                },
            }, {
                breakpoint: 479,
                options: {
                    chart: {
                        height: 250,
                    },
                },
            }]
        };
        var balanceOverview = new ApexCharts(document.querySelector("#balanceOverview"), balanceOverviewoptions);
        balanceOverview.render();
    }
    if ($('#audienceOverview').length) {
        var audienceOverviewoptions = {
            series: [{
                name: 'Stock',
                color: '#1490e3',
                data: [31, 40, 28, 51, 42, 109, 100, 40, 28, 51, 42, 109]
            }, {
                name: 'Order',
                color: '#37c3ed',
                data: [51, 19, 55, 56, 54, 42, 54, 198, 64, 71, 21, 52]
            }],
            chart: {
                height: 410,
                type: 'area',
                stacked: true,
                toolbar: {
                    show: false
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 0,
                curve: 'straight'
            },
            markers: {
                size: 2,
                strokeWidth: 0
            },
            xaxis: {
                fill: '#FFFFFF',
                type: 'datetime',
                categories: ["2022-12-19T00:00:00.000Z", "2022-12-20T00:00:00.000Z", "2022-12-21T00:00:00.000Z", "2022-12-22T00:00:00.000Z", "2022-12-23T00:00:00.000Z", "2022-12-24T00:00:00.000Z", "2022-12-25T00:00:00.000Z", "2022-12-26T00:00:00.000Z", "2022-12-27T00:00:00.000Z", "2022-12-28T00:00:00.000Z", "2022-12-29T00:00:00.000Z", "2022-12-30T00:00:00.000Z"],
                labels: {
                    datetimeFormatter: {
                        month: 'MMMM',
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            grid: {
                borderColor: '#334652',
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: true,
                    }
                },
                padding: {
                    bottom: 15
                }
            },
            responsive: [{
                breakpoint: 1199,
                options: {
                    chart: {
                        height: 365,
                    },
                },
            }, {
                breakpoint: 991,
                options: {
                    chart: {
                        height: 300,
                    },
                },
            }, {
                breakpoint: 479,
                options: {
                    chart: {
                        height: 250,
                    },
                },
            }]
        };
        var audienceOverview = new ApexCharts(document.querySelector("#audienceOverview"), audienceOverviewoptions);
        audienceOverview.render();
    }

    //------------------------------------------------------------------------------------------------------------------
    // Dashboard Breadcrumb Date Picker
    //------------------------------------------------------------------------------------------------------------------
    $('#dashboardFilter').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
    });



    //------------------------------------------------------------------------------------------------------------------
    // Recent Order Data Table
    //------------------------------------------------------------------------------------------------------------------
    function getFormattedDate(date) {
        if ($('#myTable').length) {
            var dataTable = $('#myTable').DataTable({
                dom: 'lfrtip',
                responsive: true,
                select: true,
                scrollX: true,
            });
            $('#myTable_filter input').addClass('form-control').attr("placeholder", "Search...").addClass('form-control-sm');
            $('.dataTables_length').hide();
            $('.dataTables_filter').prependTo('#tableSearch');
            $('.dataTables_info, .paging_simple_numbers').prependTo('.table-bottom-control');
            $('#myTable tr').on('click', function () {
                $(this).toggleClass('selected');
                $(this).siblings().removeClass('selected');
            })
        }
    }

    getAllProjects();
    function getAllProjects() {
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: JSON.stringify({
                method: 'getAllProject'
            }),
            contentType: "application/json",
            beforeSend: function () {
                $(".preloader").show();
            },
            complete: function () {
                $(".preloader").hide();
            },
            success: function (response) {
                // console.log(response);
                let status = response.status;
                if (status == 1) {
                    let html = "";
                    if (response.data.length > 0) {
                        const year = new Date().getFullYear();
                        $.each(response.data, function (index, item) {
                            let bg = '';
                            if (item.name.toLowerCase() == 'live') {
                                bg = 'bg-success';
                            } else if (item.name.toLowerCase() == 'github') {
                                bg = 'bg-info';
                            } else if (item.name.toLowerCase() == 'frontend') {
                                item.name = 'GitHub';
                                bg = 'bg-info';
                            } else {
                                item.name = 'Progress';
                                bg = 'bg-warning';
                            }
                            html += `<tr>
                                        <td class="text-primary">PROJ/${year}/${item.id}</td>
                                        <td>${item.project_name}</td>
                                        <td>Atlanta</td>
                                        <td>01-01-2025</td>
                                        <td>5 Year</td>
                                        <td>25-01-2025</td>
                                        <td><span class="badge ${bg}">${item.name}</span></td>
                                        <td>
                                            <div class="btn-box">
                                                <button data-id="${item.id}" class="see_project"><a href="${item.link}" target="_blank"><i class="fa-solid fa-eye text-info"></i></a></button>
                                                <button data-id="${item.id}" class="edit_project"><i class="fa-solid fa-pen text-primary"></i></button>
                                                <button data-id="${item.id}" class="delete_project"><i class="fa-solid fa-trash text-danger"></i></button>
                                            </div>
                                        </td>
                                    </tr>`;
                        });
                        $("#project_container").html(html);
                        getFormattedDate();
                        formatIcon();
                    }
                }
            },
            error: function () {
                console.log("Something went wrong, while geting data of educations!");
            }
        });
    };

    getAllCounts();
    function getAllCounts() {
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: JSON.stringify({
                method: 'getAllCounts'
            }),
            contentType: "application/json",
            beforeSend: function () {
                $(".preloader").show();
            },
            complete: function () {
                $(".preloader").hide();
            },
            success: function (response) {
                // console.log(response);
                let status = response.status;
                if (status == 1) {
                    let html = "";
                    if (response.data.length > 0) {
                        $.each(response.data, function (index, item) {
                            $("#totalMessages").text(item.total_messages);
                            $("#totalFeedbacks").text(item.total_feedbacks);
                            $("#totalBlogs").text(item.total_blogs);
                            $("#totalProjects").text(item.total_projects);
                        });
                    } else {
                        console.log("No data found!");
                    }
                }
            },
            error: function () {
                console.log("Something went wrong, while geting data of educations!");
            }
        });
    };

    function timeAgo(dateTime) {
        const createdAt = new Date(dateTime).getTime();
        const now = new Date().getTime();
        const diff = Math.floor((now - createdAt) / 1000); // seconds

        if (diff < 60) {
            return diff + " s ago";
        } else if (diff < 3600) {
            return Math.floor(diff / 60) + " m ago";
        } else if (diff < 86400) {
            return Math.floor(diff / 3600) + " h ago";
        } else if (diff < 172800) {
            return "1 day ago";
        } else {
            return Math.floor(diff / 86400) + " d ago";
        }
    }

    function formatIcon() {
        $("body .fa-light").addClass("fa-solid").removeClass("fa-light");
    }
    
    setTimeout(function () {
        getAllTestimonials();
    }, 500);
    // getAllTestimonials();
    function getAllTestimonials() {
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: JSON.stringify({
                method: 'getAllTestimonials'
            }),
            contentType: "application/json",
            beforeSend: function () {
                $(".preloader").show();
            },
            complete: function () {
                $(".preloader").hide();
            },
            success: function (response) {
                // console.log(response);
                let status = response.status;
                if (status == 1) {
                    let html = "";
                    if (response.data.length > 0) {
                        $.each(response.data, function (index, item) {
                            html += `<tr>
                                        <td class="p-2">
                                            <div class="new-customer">
                                                <div class="part-img">
                                                    <img src="../assets/user_images/${item.photo == null || item.photo == '' ? 'unknown.jpg' : item.photo}" alt="Image">
                                                </div>
                                                <div class="part-txt">
                                                    <p class="customer-name mb-2 fs-6">${item.full_name}</p>
                                                    <span><small class="text-nowrap">${item.subject}</small></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="small_description p-2">${item.description}</td>
                                        <td class="p-2">${timeAgo(item.created_at)}</td>
                                        <td>
                                            <div class="btn-box text-center d-flex justify-content-center align-items-center gap-1">
                                                <div data-id="${item.id}" class="see_testimonial me-1"><i class="fa-solid fa-eye text-info"></i></div>
                                                <div data-id="${item.id}" class="edit_testimonial me-1"><i class="fa-solid fa-pen text-primary"></i></div>
                                                <div data-id="${item.id}" class="delete_testimonial"><i class="fa-solid fa-trash text-danger"></i></div>
                                            </div>
                                        </td>
                                    </tr>`;
                        });
                        $("#testimonial_container").html(html);
                        $('#myTable3').DataTable({
                            dom: 'frtip',
                            pageLength: 10,   // fixed rows
                            lengthChange: false, // extra safety
                            responsive: true,
                            select: true,
                            scrollX: true
                        });
                        $('#myTable3_filter input').addClass('form-control').attr("placeholder", "Search...").addClass('form-control-sm');
                        formatIcon();
                    }
                }
            },
            error: function () {
                console.log("Something went wrong, while geting data of educations!");
            }
        });
    };

    setTimeout(function () {
        getUserMessages();
    }, 1000);
    // getUserMessages();
    function getUserMessages() {
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: JSON.stringify({
                method: 'getUserMessages'
            }),
            contentType: "application/json",
            beforeSend: function () {
                $(".preloader").show();
            },
            complete: function () {
                $(".preloader").hide();
            },
            success: function (response) {
                // console.log(response);
                let status = response.status;
                if (status == 1) {
                    let html = "";
                    // console.log(response.data);
                    if (response.data.length > 0) {
                        $.each(response.data, function (index, item) {
                            html += `<tr>
                                        <td style="width: 220px !important;">
                                            <div class="d-flex align-items-center gap-2">
                                                <div>
                                                    <div class="p-2 border rounded-1 bg-light text-center">
                                                        <i class="fa-solid fa-comments text-primary"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    ${item.full_name}<br><span class="text-muted"><small>${item.email}</small></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="small_description">${item.message}</td>`;
                                        if (item.file != '' && item.file != null && item.file != 'null') {
                                            html += `<td class="text-center w-25"><a href="../../uploads/${item.file}" download class="pdf-card">
                                                            <i class="fa-solid fa-circle-down me-1 text-info" id="download" style="cursor: pointer" title="Download Attachement"></i>
                                            </a></td>`} else {
                                            html += `<td class="text-center w-25">-</td>`; 
                                        };
                            html += `<td>
                                        <div class="btn-box text-center d-flex justify-content-center align-items-center gap-1">
                                            <div data-id="${item.id}" class="see_message me-1"><i class="fa-solid fa-eye text-info"></i></div>
                                            <div data-id="${item.id}" class="edit_message me-1"><i class="fa-solid fa-pen text-primary"></i></div>
                                            <div data-id="${item.id}" class="delete_message"><i class="fa-solid fa-trash text-danger"></i></div>
                                        </div>
                                    </td>`;
                            html += `</tr>`;
                        });
                        $("#message_container").html(html);
                        $('#myTable2').DataTable({
                            dom: 'frtip',
                            pageLength: 10,   // fixed rows
                            lengthChange: false, // extra safety
                            responsive: true,
                            select: true,
                            scrollX: true
                        });
                        $('#myTable2_filter input').addClass('form-control').attr("placeholder", "Search...").addClass('form-control-sm');
                        formatIcon();
                    }
                }
            },
            error: function () {
                console.log("Something went wrong, while geting data of messages!");
            }
        });
    };
});
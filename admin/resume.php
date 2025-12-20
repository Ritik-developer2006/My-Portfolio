<?php
require_once("header.php");
?>
<link rel="stylesheet" href="assets/css/jquery.uploader.css">
<link rel="stylesheet" href="assets/css/dropzone.min.css">

<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-25">
        <h2>Resume Section</h2>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <!-- All Educations -->
            <div class="panel mb-25">
                <div class="panel-header d-flex justify-content-between">
                    <div><h5 class="fw-bold">Educations</h5></div>
                    <div><i class="fa-solid fa-circle-plus" id="add_education" style="cursor: pointer"></i></div>
                </div>
                <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="education_container">
                    <!-- data come through ajax -->
                     <div class="d-flex flex-column justify-content-center align-items-center">
                        <div>
                            <i class="fa-solid fa-circle-info fs-1"></i>
                        </div>
                        <div>
                            <h5>Data Not Available!</h5>
                        </div>
                     </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
             <!-- All Experinces -->
            <div class="panel mb-25">
                <div class="panel-header d-flex justify-content-between">
                    <div><h5 class="fw-bold">Experinces</h5></div>
                    <div><i class="fa-solid fa-circle-plus"></i></div>
                </div>
                <div class="panel-body">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>Diploma</div>
                            <div><i class="fa-solid fa-pen-to-square"></i></div>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="inputWithIcon" class="form-label">Input with icon</label>
                                    <div class="input-group-with-icon">
                                        <span class="input-icon">
                                            <i class="fa-light fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control ps-0" id="inputWithIcon" placeholder="example@info.com">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="inputWithIcon" class="form-label">Input with icon</label>
                                    <div class="input-group-with-icon">
                                        <span class="input-icon">
                                            <i class="fa-light fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control ps-0" id="inputWithIcon" placeholder="example@info.com">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <label for="inputDate" class="form-label">Input date</label>
                                    <input type="date" class="form-control" id="inputDate">
                                </div>

                                <div class="col-sm-6">
                                    <label for="inputDate" class="form-label">Input date</label>
                                    <input type="date" class="form-control" id="inputDate">
                                </div>
                                
                                <div class="col-sm-12">
                                    <label for="exampleTextarea" class="form-label">Example textarea</label>
                                    <textarea class="form-control" id="exampleTextarea"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
             <!-- All Skills -->
            <div class="panel mb-25">
                <div class="panel-header d-flex justify-content-between">
                    <div><h5 class="fw-bold">Skills</h5></div>
                    <div><i class="fa-solid fa-circle-plus"></i></div>
                </div>
                <div class="panel-body">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>HTML/CSS</div>
                            <div><i class="fa-solid fa-pen-to-square"></i></div>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="inputWithIcon" class="form-label">Input with icon</label>
                                    <div class="input-group-with-icon">
                                        <span class="input-icon">
                                            <i class="fa-light fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control ps-0" id="inputWithIcon" placeholder="example@info.com">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="range4" class="form-label">Example range</label>
                                    <div class="input-group-with-icon">
                                        <span class="input-icon">
                                            <output for="range4" id="rangeValue" aria-hidden="true"></output>%
                                        </span>
                                        <input type="range" class="form-range" min="0" max="100" value="50" id="range4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer start -->
    <div class="footer">
        <p>© <script>
                document.write(new Date().getFullYear())
            </script> RITIK KUMAR | All Rights Reserved | Personal Portfolio Website Design <span class="text-primary">Digiboard</span></p>
    </div>
    <!-- footer end -->
</div>
<!-- main content end -->

<?php
require_once("footer.php");
?>
<script src="assets/js/jquery.uploader.min.js"></script>
<script src="assets/js/dropzone.min.js"></script>
<script src="assets/js/ckeditor.js"></script>
<script src="assets/js/dropzone-init.js"></script>
<script>
    // This is an example script, please modify as needed
  const rangeInput = document.getElementById('range4');
  const rangeOutput = document.getElementById('rangeValue');

  // Set initial value
  rangeOutput.textContent = rangeInput.value;

  rangeInput.addEventListener('input', function() {
    rangeOutput.textContent = this.value;
  });

  getAlleducation();
  function getAlleducation() {
        $.ajax({
            type: 'POST',
            url: '/Ritik Portfolio/API/adminApi.php',
            dataType: 'JSON',
            data: JSON.stringify({
                method: 'getAlleducation'
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
                    if(response.data.length > 0){
                        $.each(response.data, function (index, item){
                            html += `<div class="card ${item.id != 1 ? 'mt-3' : ''}">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>${item.education_name}</div>
                                            <div>
                                            <i class="fa-solid fa-pen-to-square edit_education" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-trash delete_education" style="cursor: pointer;"></i>
                                            </div>
                                            <input type="hidden" value="${item.id}" class="edu_id">
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#">
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label for="university${item.id}" class="form-label">Input with icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon">
                                                                <i class="fa-light fa-envelope"></i>
                                                            </span>
                                                            <input type="text" readonly name='university' value="${item.university}" class="form-control ps-0" id="university${item.id}" placeholder="Your university">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="college${item.id}" class="form-label">Input with icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon">
                                                                <i class="fa-light fa-envelope"></i>
                                                            </span>
                                                            <input type="text" readonly name='college' value="${item.college_name}" class="form-control ps-0" id="college${item.id}" placeholder="Your college">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6">
                                                        <label for="from_year${item.id}" class="form-label">Input date</label>
                                                        <input type="date" readonly name='from_year' value="${item.from_year}" class="form-control" id="from_year${item.id}">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="to_year${item.id}" class="form-label">Input date</label>
                                                        <input type="date" readonly name='to_year' value="${item.to_year}" class="form-control" id="to_year${item.id}">
                                                    </div>
                                                    
                                                    <div class="col-sm-12">
                                                        <label for="description${item.id}" class="form-label">Example textarea</label>
                                                        <textarea class="form-control" readonly name="description" id="description${item.id}">${item.description}</textarea>
                                                    </div>

                                                    <div class="col-sm-12 d-none">
                                                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>`;
                        });
                        $("#education_container").html(html);
                    }
                }
            },
            error: function () {
                console.log("Something went wrong, while geting data of educations!");
            }
        });
    };

</script>
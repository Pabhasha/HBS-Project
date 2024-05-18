<div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <h5 class="mt-2 text-light">Admin panel</h5>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#admindropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="admindropdown">
                <ul class="nav nav-pills flex-column">


                    <li class="nav-item">
                        <a class="nav-link text-white" href="user_quries.php">User communication</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="dashboard.php">Add Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="add_warden.php">Add Warden</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="add_landlords.php">Add Landlord</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="Features_Facilities.php">Features & Facilities</a>
                    </li>

            </div>
        </div>

    </nav>
</div>


<!-- model facilitie -->


<div class="modal fade" id="facilitiesModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="addFacilityForm" action="Features_Facilities.php" enctype="multipart/form-data" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 d-flex align-items-center">
                        <i class="bi bi-file-earmark-plus-fill"></i> Add Facilities
                    </h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 md-3 mt-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control shadow-none" required name="title">
                            </div>

                            <div class="col-md-12 ps-0 md-3 mt-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control shadow-none" rows="4" required name="description"></textarea>
                            </div>

                            <div class="col-md-6 ps-0 md-3 mt-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control shadow-none" required name="image">
                            </div>
                        </div>
                    </div>
                    <div class="text-center my-1 mt-3">
                        <button type="submit" class="btn btn-outline-dark shadow-none me-lg-3 me-2 mb-4 custom-bg border-0">Add</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- add student model -->
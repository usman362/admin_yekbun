
<style>
        .modal-content {
            border-radius: 15px;
            font-family: 'Segoe UI', sans-serif;
        }

        .bg-tropy-column {
            border: 1px dashed #d1d1d1;
            border-radius: 12px;
            background: #f9f9f9;
        }

        .trophy-count {
            font-weight: 700;
            font-size: 18px;
            color: #333;
        }

        .trophy-card {
            flex: 1;
            text-align: center;
        }

        .mini-stat-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px 10px;
            background-color: #fff;
            border-radius: 10px;
            margin-bottom: 5px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
            font-size: 14px;
        }

        .age-bar {
            height: 8px;
            border-radius: 5px;
            margin-bottom: 5px;
            background-color: #eee;
            position: relative;
        }

        .age-bar .male {
            background: #3d2dd6;
            height: 100%;
            width: 50%;
            border-radius: 5px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            position: absolute;
            z-index: 11111;
        }

        .age-bar .female {
            background: #cc8ff5;
            height: 100%;
            width: 50%;
            left: 15%;
            position: absolute;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .province-2 {}

        .province-item {
            color: white;
            padding: 5px 10px;
            border-radius: 8px;
            /* margin-bottom: 5px; */
            display: flex;
            justify-content: space-between;
            font-weight: 600;
        }

        .province-1 {
            background: #ec1a82;
            width: 90%;
        }

        .province-2 {
            background: #a032ff;
            border-top-left-radius: 0px !important;
            border-top-right-radius: 0px !important;
            width: 85%;
        }

        .province-3 {
            background: #fc6bbc;
            border-top-left-radius: 0px !important;
            border-top-right-radius: 0px !important;
            width: 80%;
        }

        .province-4 {
            background: #4f2bc8;
            border-top-left-radius: 0px !important;
            border-top-right-radius: 0px !important;
            width: 70%;
        }
    </style>
<div class="vote-detail-modal">
     
      <div class="modal fade" id="exampleModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content p-3">
                <div class="modal-header flex-column align-items-start border-bottom-0 pb-0">
                    <h5 class="modal-title">Vote Title</h5>
                    <p class="text-muted mb-0">Category Name</p>
                </div>
                <div class="modal-body pt-0">
                    <div class="bg-tropy-column p-3">
                        <!-- Top Trophy Section -->
                        <div class="d-flex justify-content-between mb-3">
                            <div class="trophy-card">
                                <div class="spinner-border text-success" style="width: 110px; height: 110px;"
                                    role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="images/img-04.svg" class="d-flex justify-content-center position-absolute"
                                        width="50" style="transform: translate(3px, -55px);">
                                </div>

                                <div class="trophy-count">10,258</div>
                            </div>
                            <div class="trophy-card">
                                <div class="spinner-border text-warning" style="width: 110px; height: 110px;"
                                    role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="images/img-05.svg" class="d-flex justify-content-center position-absolute"
                                        width="50" style="transform: translate(3px, -55px);">
                                </div>
                                <div class="trophy-count">5,258</div>

                            </div>
                            <div class="trophy-card">
                                <div class="spinner-border text-info" style="width: 110px; height: 110px;"
                                    role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="images/img-05.svg" class="d-flex justify-content-center position-absolute"
                                        width="50" style="transform: translate(3px, -55px);">
                                </div>
                                <div class="trophy-count">15,258</div>
                            </div>
                        </div>

                        <!-- Medal Bars -->
                        <div class="mini-stat-box">
                            <div class="d-flex">
                                <img src="images/img-03.svg" width="35">
                                <div class="detail-progress mx-2">
                                    <span><img src="images/img-02.svg" width="18" alt="">&nbsp; 1258</span>
                                    <div class="progress mt-1" style="width: 60px; height: 8px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-progress ">
                                    <span><img src="images/img-02.svg" width="18" alt="">&nbsp; 1258</span>
                                    <div class="progress mt-1" style="width: 60px; height: 8px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 90%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            <div class="detail-progress">
                                    <span><img src="images/img-02.svg" width="18" alt="">&nbsp; 1258</span>
                                    <div class="progress mt-1" style="width: 60px; height: 8px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 90%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                        </div>
                        <div class="mini-stat-box">
                            <div class="d-flex">
                                <img src="images/img-01.svg" width="35">
                                <div class="detail-progress mx-2">
                                    <span><img src="images/img-02.svg" width="18" alt="">&nbsp; 1258</span>
                                    <div class="progress mt-1" style="width: 60px; height: 8px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-progress">
                                    <span><img src="images/img-02.svg" width="18" alt="">&nbsp; 1258</span>
                                    <div class="progress mt-1" style="width: 60px; height: 8px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 90%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            <div class="detail-progress">
                                    <span><img src="images/img-02.svg" width="18" alt="">&nbsp; 1258</span>
                                    <div class="progress mt-1" style="width: 60px; height: 8px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 90%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                        </div>
                        

                       

                        <!-- Age and Gender Stats -->
                        <div>
                            <h6 class="text-muted fw-bold">Statistics</h6>
                            <p class="fw-bold">Age and gender</p>
                            <div class="d-flex justify-content-end mb-2">
                                <small class="me-3"><span class="me-1" style="color:#3d2dd6">●</span>Male</small>
                                <small><span class="me-1" style="color:#cc8ff5">●</span>Female</small>
                            </div>
                            <!-- Bar 1 -->
                            <div class="d-flex align-items-center mb-2">
                                <span class="me-2" style="width: 50px;">18–24</span>
                                <div class="flex-grow-1 age-bar">
                                    <div class="male" style="width: 40%"></div>
                                    <div class="female" style="width: 60%"></div>
                                </div>
                                <span class="ms-2">12.7%</span>
                            </div>
                            <!-- Repeat for more bars -->
                            <div class="d-flex align-items-center mb-2">
                                <span class="me-2" style="width: 50px;">18–24</span>
                                <div class="flex-grow-1 age-bar">
                                    <div class="male" style="width: 30%"></div>
                                    <div class="female" style="width: 70%"></div>
                                </div>
                                <span class="ms-2">12.7%</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="me-2" style="width: 50px;">18–24</span>
                                <div class="flex-grow-1 age-bar">
                                    <div class="male" style="width: 45%"></div>
                                    <div class="female" style="width: 55%"></div>
                                </div>
                                <span class="ms-2">12.7%</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="me-2" style="width: 50px;">18–24</span>
                                <div class="flex-grow-1 age-bar">
                                    <div class="male" style="width: 60%"></div>
                                    <div class="female" style="width: 40%"></div>
                                </div>
                                <span class="ms-2">12.7%</span>
                            </div>
                        </div>

                        <!-- Province List -->
                        <div class="mt-3">
                            <h6 class="fw-bold">List of Provinces</h6>
                            <div class="province-item province-1">
                                <span>Kurdistan – Rojava</span>
                                <span>1,200</span>
                            </div>
                            <div class="province-item province-2">
                                <span>Kurdistan – Bakûr</span>
                                <span>1,200</span>
                            </div>
                            <div class="province-item province-3">
                                <span>Kurdistan – Rojhilat</span>
                                <span>1,200</span>
                            </div>
                            <div class="province-item province-4">
                                <span>Kurdistan – Başûr</span>
                                <span>950</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center border-top-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

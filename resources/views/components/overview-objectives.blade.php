<section style="background-color:rgba(216, 236, 252, 0.48); padding-top: 50px; padding-bottom: 20px;">
    <div class="container">
        <h2 class="workshop-title text-center">Key Objectives</h2>

        <div class="row justify-content-center g-4 mt-4">
            <!-- Objective Cards -->
            <div class="col-md-4 col-sm-6">
                <div class="card objectives-item h-100 d-flex flex-column">
                    <div class="card-body flex-grow-1">
                        <span class="rank">#1</span>
                        <strong>Regional Healthcare Impact</strong><br>
                        Improve the management of bladder exstrophy and expand access to high-quality medical care.
                    </div>
                    <img src="{{ asset('storage/images/8.jpg') }}" class="objective-img img-fluid"
                        alt="Regional Healthcare Impact">
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card objectives-item h-100 d-flex flex-column">
                    <div class="card-body flex-grow-1">
                        <span class="rank">#2</span>
                        <strong>Clinical Protocol Standardization</strong><br>
                        Develop and implement unified clinical protocols.
                    </div>
                    <img src="{{ asset('storage/images/9.jpg') }}" class="objective-img img-fluid"
                        alt="Clinical Protocol">
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card objectives-item h-100 d-flex flex-column">
                    <div class="card-body flex-grow-1">
                        <span class="rank">#3</span>
                        <strong>Professional Development</strong><br>
                        Deliver advanced training and workshops.
                    </div>
                    <img src="{{ asset('storage/images/7.jpg') }}" class="objective-img img-fluid"
                        alt="Professional Development">
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card objectives-item h-100 d-flex flex-column">
                    <div class="card-body flex-grow-1">
                        <span class="rank">#4</span>
                        <strong>Research & Collaboration</strong><br>
                        Promote continuous education and expand research.
                    </div>
                    <img src="{{ asset('storage/images/10.jpg') }}" class="objective-img img-fluid"
                        alt="Research & Collaboration">
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card objectives-item h-100 d-flex flex-column">
                    <div class="card-body flex-grow-1">
                        <span class="rank">#5</span>
                        <strong>Awareness & Sustainability</strong><br>
                        Build long-term support and host educational events.
                    </div>
                    <img src="{{ asset('storage/images/11.jpg') }}" class="objective-img img-fluid"
                        alt="Awareness & Sustainability">
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card objectives-item h-100 d-flex flex-column">
                    <div class="card-body flex-grow-1">
                        <span class="rank">#6</span>
                        <strong>Future Goals</strong><br>
                        Foster innovation and expand patient-focused initiatives.
                    </div>
                    <img src="{{ asset('storage/images/12.jpg') }}" class="objective-img img-fluid" alt="Future Goals">
                </div>
            </div>
        </div>

        <style>
            .container {
                .objectives-item {
                    background: #ffffff;
                    border-left: 5px solid #d271a6;
                    border-radius: 10px;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                    overflow: hidden;
                }

                .objectives-item:hover {
                    transform: translateY(-4px);
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
                }

                .objectives-item strong {
                    color: #d271a6;
                    font-size: 1.1rem;
                    font-weight: 600;
                    display: block;
                    margin-top: 5px;
                }

                .rank {
                    position: absolute;
                    top: 15px;
                    right: 20px;
                    background-color: #d271a6;
                    color: #fff;
                    font-weight: 600;
                    padding: 5px 14px;
                    border-radius: 30px;
                    font-size: 0.85rem;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
                }

                .objective-img {
                    height: 200px;
                    width: 100%;
                    object-fit: cover;
                    border-bottom-left-radius: 10px;
                    border-bottom-right-radius: 10px;
                }

                @media (max-width: 767px) {
                    .objective-img {
                        height: 150px;
                    }
                }
        </style>
    </div>
</section>

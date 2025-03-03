<style>
    .uni-apply-container {
        padding: 3.8rem !important;
        background-color: var(--primary_background);
        border-radius: 8px;
    }

    @media screen and (max-width: 768px) {
        .uni-apply-container {
            padding: 1rem !important;
        }
    }

    .uni-apply-container .uni-apply-subtitle {
        position: relative;
        display: flex;
        align-items: center;
        color: white;
        font-family: 'Manrope', sans-serif;
        letter-spacing: 3px;
    }

    .uni-apply-container .uni-apply-subtitle .line {
        width: 30px;
        height: 1px;
        background-color: white;
        margin: 0px 10px;
    }

    .uni-apply-container .uni-apply-subtitle .text-uppercase {
        font-weight: 500;
    }

    .uni-apply-container .ca-card-title {
        font-family: 'DM Sans', sans-serif;
        font-size: clamp(1.875rem, 1.4525rem + 2.3313vw, 4.25rem) !important;
        color: white !important;
    }

    .uni-apply-cards-container {
        display: flex;
        justify-content: space-between;
    }

    .uni-apply-card {
        position: relative;
        flex: 1;
        padding: 20px;
    }

    @media screen and (min-width:768px) {
        .uni-apply-card:not(:last-child)::after {
            content: "";
            position: absolute;
            top: 50%;
            right: 0px;
            width: 1px;
            height: 10%;
            background-color: white;
            transform: translateY(-300%) rotate(90deg);
        }
    }

    @media screen and (min-width:992px) {
        .uni-apply-card:not(:last-child)::after {
            right: -10px;
            height: 20%;
            transform: translateY(-160%) rotate(90deg);
        }
    }

    @media screen and (min-width:1200px) {
        .uni-apply-card:not(:last-child)::after {
            transform: translateY(-150%) rotate(90deg);
        }
    }

    .uni-apply-cards-container .uni-apply-card {
        color: white !important;
        transition: 0.4s;
    }

    .uni-apply-icon-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        /* border: 1px solid white; */
        overflow: hidden;
    }

    .icon-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;
        padding: 60px;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        transition: 0.4s;
    }

    .uni-apply-cards-container .uni-apply-card:hover .uni-apply-icon-container .icon-wrapper {
        scale: 0.85;
    }

    .icon-wrapper i {
        font-size: 48px;
        line-height: 1;
    }

    .uni-apply-cards-container .uni-apply-card .icon-wrapper i {
        font-size: 3rem;
        color: var(--primary_background);
    }

    .uni-apply-cards-container .uni-apply-card .steps-description p {
        font-size: 0.95rem !important;
        color: white !important;
        font-family: 'DM Sans', sans-serif;
    }

    .uni-apply-container .uni-apply-card .uni-apply-step-container .uni-apply-step {
        width: 100%;
        max-width: clamp(2.5rem, 2.3888rem + 0.6135vw, 3.125rem);
        height: clamp(2.5rem, 2.3888rem + 0.6135vw, 3.125rem);
        font-size: clamp(1rem, 0.9555rem + 0.2454vw, 1.25rem);
        background-color: white;
        color: var(--primary_background) !important;
        display: flex;
        align-items: center;
        justify-content: center;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        margin: auto;
        font-weight: 500;
    }
</style>

<div class="container uni-apply-container border" style="margin-top: 5rem;">
    <div class="text-center">
        <div class="uni-apply-subtitle d-flex justify-content-center align-items-center">
            <span class="line"></span>
            <span class="text-uppercase">Application Process</span>
            <span class="line"></span>
        </div>

        <h3 class="ca-card-title d-block text-center mt-3 mt-md-4">3 Steps To Apply University's</h3>
    </div>
    <div class="row text-center uni-apply-cards-container">
        <div class="col-12 col-md-4 mb-sm-5 mb-md-0 uni-apply-card">
            <div class="pt-5 pb-3 px-lg-4">
                <div class="row text-center">
                    <div class="col-3 mx-auto uni-apply-icon-container">
                        <div class="icon-wrapper">
                            <i class="far fa-file-alt" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="mt-5 steps-description">
                    <h4 class="mb-3" style="font-weight: 700">Application Materials​</h4>
                    <p class="px-lg-2">
                        For step 1, need to prepare application documents for submission​
                    </p>
                </div>
            </div>
            <div class="d-flex justify-content-center uni-apply-step-container">
                <div class="uni-apply-step">1</div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-sm-5 mb-md-0 uni-apply-card">
            <div class="pt-5 pb-3 px-4">
                <div class="row text-center">
                    <div class="col-3 mx-auto uni-apply-icon-container">
                        <div class="icon-wrapper">
                            <i class="fas fa-file-upload" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="mt-5 steps-description">
                    <h4 class="mb-3" style="font-weight: 700">Application Submission​​</h4>
                    <p class="px-lg-2">
                        We will proceed for next step with your application materials for review​
                    </p>
                </div>
            </div>
            <div class="d-flex justify-content-center uni-apply-step-container">
                <div class="uni-apply-step">2</div>
            </div>
        </div>
        <div class="col-12 col-md-4 mb-sm-5 mb-md-0 uni-apply-card">
            <div class="pt-5 pb-3 px-4">
                <div class="row text-center">
                    <div class="col-3 mx-auto uni-apply-icon-container">
                        <div class="icon-wrapper">
                            <i class="fas fa-star" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="mt-5 steps-description">
                    <h4 class="mb-3" style="font-weight: 700">Admission Result​​</h4>
                    <p class="px-lg-2">
                        You will get admission result with a very short period of time after review​
                    </p>
                </div>
            </div>
            <div class="d-flex justify-content-center uni-apply-step-container">
                <div class="uni-apply-step">3</div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Frontend/layouts/parts/universities-apply.blade.php ENDPATH**/ ?>
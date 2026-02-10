<div class="w-full mx-auto p-8 flex flex-wrap items-center justify-center" style="background-color: white;">
    <!-- Text Content -->
    <div class="max-w-2xl md:w-1/2 pr-4 mb-6 md:mb-0 mob md:text-left">
        <h2 class="workshop-title text-2xl font-bold text-gray-800 mb-4">Nile of Hope Initiative for Bladder Exstrophy Management</h2>
        <p class="text-lg text-gray-700 mb-4">
            The Nile of Hope Initiative for Bladder Exstrophy Management is a collaborative effort led by 
            <strong class="font-semibold text-blue-600">Professor Peter Cuckow</strong> and 
            <strong class="font-semibold text-blue-600">Professor Saber Waheeb</strong>, uniting experts from around the globe.
        </p>
        <p class="text-lg text-gray-700 mb-4">
            During <strong class="font-semibold text-blue-600">two visits</strong> to the Nile of Hope Hospital, Professor Cuckow performed thorough examinations on 
            <strong class="font-semibold text-blue-600">57 children</strong> and provided over 
            <strong class="font-semibold text-blue-600">60 hours</strong> of practical training to the medical staff, greatly advancing local expertise in managing bladder exstrophy.
        </p>
        <p class="text-lg text-gray-700">
            This initiative is dedicated to enhancing patient care and improving outcomes through specialized treatment protocols and the sharing of expert knowledge.
        </p>
    </div>

    <!-- Styled Carousel -->
    <div class="max-w-2xl md:w-1/2">
        <div id="imageCarousel" class="carousel slide my-8 rounded-lg overflow-hidden shadow-lg" data-bs-ride="carousel">
            <div class="carousel-inner">
                @for ($i = 1; $i <= 6; $i++)
                    <div class="carousel-item @if($i == 1) active @endif">
                        <img src="{{ asset('storage/images/' . $i . '.jpg') }}" class="d-block w-100 object-cover" alt="Image {{ $i }}">
                    </div>
                @endfor
            </div>

            <!-- Custom Prev/Next Controls -->
            <button class="carousel-control-prev custom-carousel-btn" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev" aria-label="Previous">
                <span class="carousel-control-prev-icon rounded-full p-2" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next custom-carousel-btn" type="button" data-bs-target="#imageCarousel" data-bs-slide="next" aria-label="Next">
                <span class="carousel-control-next-icon rounded-full p-2" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</div>

<style>
.custom-carousel-btn {
    background-color: rgba(0, 0, 0, 0.5);
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s ease;
    z-index: 10;
}
.custom-carousel-btn:hover {
    background-color: rgba(54, 83, 177, 0.4);
}

@media (max-width: 768px) {
    .mob {
        text-align: center;
    }
    #imageCarousel ,.carousel-inner{
        padding: 0 !important; 
    }
    .carousel-control-prev, .carousel-control-next {
        top: 50%;
        transform: translateY(-50%);
    }
    .w-full {
        padding: 5px 15px 0 15px;
    }
}
</style>

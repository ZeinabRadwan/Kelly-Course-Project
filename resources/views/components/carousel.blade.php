<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <!-- Indicator Circles -->
    <div class="carousel-indicators">
        @for ($i = 0; $i < 9; $i++)
            <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="{{ $i }}"
                class="@if ($i == 0) active @endif"
                aria-current="@if ($i == 0) true @endif"
                aria-label="Slide {{ $i + 1 }}"></button>
        @endfor
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
        @for ($i = 1; $i <= 9; $i++)
            <div class="carousel-item @if ($i == 1) active @endif">
                <img src="{{ asset('storage/images/banner/' . $i . '.jpg') }}" class="d-block w-100"
                    alt="Slide {{ $i }}">
            </div>
        @endfor
    </div>

    <!-- Prev/Next Buttons -->
    <button class="carousel-control-prev custom-carousel-btn" type="button" data-bs-target="#carouselExampleInterval"
        data-bs-slide="prev" aria-label="Previous">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next custom-carousel-btn" type="button" data-bs-target="#carouselExampleInterval"
        data-bs-slide="next" aria-label="Next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>

<style>
    .custom-carousel-btn {
        background-color: rgba(0, 0, 0, 0.5);
        border: none;
        width: 60px;
        height: 60px;
        top: 50%;
        transform: translateY(-50%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        transition: all 0.3s ease;
        opacity: 1;
    }

    .carousel-control-prev.custom-carousel-btn {
        left: 10px;
    }

    .carousel-control-next.custom-carousel-btn {
        right: 10px;
    }

    .custom-carousel-btn:hover {
        background-color: rgba(54, 83, 177, 0.4);
        transform: translateY(-50%) scale(1.1);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    @media (max-width: 576px) {
        .custom-carousel-btn {
            width: 40px;
            height: 40px;
        }
    }

    .carousel-indicators {
        bottom: 10px;
    }

    .carousel-indicators [data-bs-target] {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: #555;
        opacity: 0.7;
        margin: 0 5px;
    }

    .carousel-indicators .active {
        background-color: #fff;
        opacity: 1;
    }
</style>

@php
    use App\Models\Course;
    $courses = Course::all();
@endphp

<style>
    html {
        scroll-behavior: smooth;
    }

    .wid {
        width: 48%;
    }

    #countdown1,
    #countdown2 {
        font-size: 3rem;
        font-weight: bold;
        color: #fff;
        text-align: center;
        margin-top: 10px;
    }

    .sidebar {
        position: fixed;
        top: 25%;
        left: 20px;
        z-index: 1000;
        background: linear-gradient(135deg, #F79B3A, #F8B400);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        padding: 5px;
        border-radius: 12px;
        transition: all 0.3s ease;
        width: 240px;
        max-width: 100%;
        transform: translateX(-250px);
        animation: slideIn 0.5s ease-in-out forwards;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar ul li {
        margin: 5px 0;
    }

    .sidebar ul li a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #fff;
        font-weight: 500;
        font-size: 16px;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        padding: 10px 15px;
        border-radius: 8px;
    }

    .sidebar ul li a span.rank {
        margin-right: 5px;
    }

    .sidebar ul li a .rank {
        font-size: 15px;
        font-weight: bold;
        color: #fff;
        background-color: #F79B3A;
        border-radius: 50%;
        padding: 5px;
        margin-right: 5px;
        width: 30px;
        height: 30px;
        text-align: center;
    }

    .sidebar ul li a:hover {
        background-color: #fff;
        color: #F79B3A;
        transform: translateX(10px);
    }

    .sidebar ul li a.active {
        background-color: #fff;
        color: #F79B3A;
        font-weight: 700;
    }

    html {
        scroll-behavior: smooth;
    }

    @keyframes slideIn {
        from {
            transform: translateX(-250px);
        }

        to {
            transform: translateX(0);
        }
    }

    .sidebar.scrolled {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
    }

    :root {
        --flourescent-blue: #00f9ef;
        --heliotrope-gray: #aba6bd;
        --russian-violet: hsl(252, 80%, 16%);
        --dark-violet: #0c003d;
        --space-cadet: #221d48;
        --blue-ryb: #0052ff;
        --white: #ffffff;

        --gradient: linear-gradient(to right, var(--flourescent-blue), var(--blue-ryb));

        --fs-1: 25px;
        --fs-2: 18px;
        --fs-3: 17px;
        --fs-4: 15px;

        --transition: 0.25s ease-in-out;
    }

    body {
        background-color: var(--dark-violet);
        color: var(--white);
    }

    .btn {
        color: var(--white);
        font-size: var(--fs-4);
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
        padding: 9px 10px;
        border-radius: 4px;
    }

    .btn-primary {
        background: var(--gradient);
        background-size: 500%;
        background-position: right;
        padding: 15px 25px;
        gap: 8px;
        transition: background var(--transition);
    }

    .btn-primary:is(:hover, :focus) {
        background-position: left;
    }

    .btn-primary>ion-icon {
        font-size: 18px;
    }

    .btn-primary>span {
        margin-top: 3px;
    }

    .container {
        padding: 0 15px;
    }

    .h3 {
        color: var(--white);
        font-size: var(--fs-2);
        line-height: 1.5;
    }


    .newsletter {
        padding: var(--section-padding) 0;
    }

    .newsletter-card,
    #welcome {
        background: url('https://i.postimg.cc/Qt21Vf8N/newsletter-bg.jpg') no-repeat center / cover;
        padding: 60px 20px;
        border-radius: 12px;
    }

    .newsletter-card .card-title {
        font-size: var(--fs-1);
        line-height: 1.3;
        margin-bottom: 10px;
    }

    .newsletter-card .card-text {
        font-size: var(--fs-4);
        line-height: 1.5;
        margin-bottom: 20px;
    }

    .newsletter-card .input-field {
        padding: 18px 15px;
        border-radius: 4px;
        background: hsla(0, 0%, 100%, .3);
        color: var(--white);
        font-size: var(--fs-4);
        border: 1px solid var(--white);
        margin-bottom: 20px;
    }

    .newsletter-card .input-field:focus {
        outline: none;
    }

    .newsletter-card .input-field::placeholder {
        color: inherit;
        transition: var(--transition);
    }

    .newsletter-card .input-field:focus::placeholder {
        opacity: 0;
    }

    .newsletter-card .btn-primary {
        font-size: var(--fs-3);
        width: 100%;
        padding-block: 18px;
    }

    .newsletter-card .btn-primary:disabled {
        cursor: not-allowed;
        background-position: right;
    }

    @media(min-width: 768px) {
        :root {
            --fs-1: 30px;
            --fs-2: 20px;
            --fs-3: 18px;
        }

        .newsletter-card {
            padding: 50px;
        }

        .newsletter-card .btn-primary {
            position: absolute;
            top: 4px;
            right: 4px;
            bottom: 4px;
            width: 140px;
        }

        .newsletter-card .input-field {
            padding-right: 155px;
        }

        .card-form {
            position: relative;
        }

    }

    @media(min-width: 1024px) {
        .newsletter-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
        }

        .newsletter-card .card-content,
        .card-form {
            width: 50%;
        }

        .newsletter-card .card-text,
        .newsletter-card .input-field {
            margin-bottom: 0;
        }
    }

    @media(min-width: 1200px) {
        :root {
            --section-padding: 60px;
        }

        .container {
            max-width: 1200px;
        }

        header {
            padding-block: 25px;
        }

        header .container {
            max-width: 1300px;
        }

        .navbar {
            gap: 30px;
        }

        .navbar-actions .btn {
            margin-left: 20px;
        }

        .hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 30px;
            padding-top: 160px;
        }

        .hero-content {
            width: 95%;
            margin-inline: 0;
        }

        .hero-title {
            width: 100%;
            margin-bottom: 30px;
        }

        .hero-text {
            margin-bottom: 25px;
        }

        .hero-btn-group {
            flex-wrap: wrap-reverse;
            gap: 35px;
        }

        .hero :is(.btn-primary, .btn-title, .btn-link) {
            --fs-4: 17px;
        }

        .hero-banner {
            display: block;
            width: 100%;
            padding-top: 100%;
            background: url('https://i.postimg.cc/s2GVFVnW/hero-banner.png') no-repeat;
            background-size: cover;
            border-radius: 100px;
        }

        .podcast-list {
            grid-template-columns: repeat(4, 1fr);
        }

        .footer-link-title {
            --fs-2: 22px;
            margin-bottom: 30px;
        }

        .social-title {
            margin-left: auto;
            margin-bottom: 35px;
        }

        .social-link {
            width: 45px;
            height: 45px;
            font-size: 22px;
        }

    }
</style>

<section id="welcome" class="relative overflow-hidden text-white rounded-3xl shadow-xl p-10 mb-12 max-w-7xl mx-auto">
    <div class="relative z-10" data-aos="fade-right" data-aos-duration="1000">
        <h2 class="text-4xl font-bold tracking-tight sm:text-5xl mb-6">
            Welcome to the <strong class="text-[#f4ad20]">HoPBE Learning Platform</strong>
        </h2>
        <p class="text-lg text-white/90 leading-relaxed mb-6">
            Join a vibrant community of healthcare professionals committed to enhancing the care of children with
            bladder exstrophy.
        </p>
        <p class="text-lg text-white/90 leading-relaxed mb-6">
            Whether you are an aspiring medical student, a fellow, or an experienced clinician, our platform provides
            access to state-of-the-art surgical training, expert insights, and collaborative tools designed to improve
            clinical outcomes across Egypt, Africa, and the Middle East.
        </p>
        <a href="#courses"
            class="inline-block bg-[#F79B3A] text-[#982FC1] py-3 px-6 rounded-full shadow-lg transform hover:scale-105 hover:bg-[#F18718] transition duration-300 ease-in-out hover:animate-pulse">
            Explore Our Courses
        </a>
    </div>
</section>

<div id="upcoming_session" class="text-center mb-12" data-aos="fade-up" data-aos-duration="1000">
    <h2 class="text-4xl sm:text-5xl font-bold text-gray-800 mb-3 tracking-tight">
        🎥 Upcoming Live Surgical Session
    </h2>
    <p class="text-lg text-gray-500 mx-auto">
        Join us for an exclusive live-streamed session showcasing the <strong class="text-[#F79B3A]">Kelly
            Operation</strong> — a groundbreaking pediatric urology procedure.
        Watch expert surgeons demonstrate key techniques, share insights, and engage in a live Q&A for a deeper
        understanding.
        <br>
        <strong>Don't miss this chance to learn from the best!</strong>
    </p>
</div>

<section>
    <div class="flex justify-between">
        <!-- Session 1 Card -->
        <div
            class="bg-gradient-to-br from-[#622D9A] via-[#982FC1] to-[#DD40D5] text-white p-6 rounded-3xl shadow-lg wid hover:transform hover:translate-y-1 hover:shadow-xl transition-all duration-300 mb-8 flex flex-col items-center">
            <h2 class="text-2xl font-bold tracking-tight mb-6 text-center">
                Kelly Operation (Session 1)
            </h2>
            <p class="text-lg text-gray-200 mb-4 text-center">
                🗓️ <strong>Date:</strong> April 29, 2025
            </p>
            <div id="countdown1" class="text-center"></div>
            <a href="https://us06web.zoom.us/j/9605072232?pwd=TnpORWZoNXpTM01QMVg1ellLcFFlUT09&omn=81257466947"
                target="_blank"
                class="inline-block bg-[#F79B3A] text-[#982FC1] py-3 px-6 rounded-full shadow-lg transform hover:scale-105 hover:bg-[#F18718] transition duration-300 ease-in-out hover:animate-pulse text-center">
                Join Zoom Meeting (Session 1)
            </a>
        </div>

        <!-- Session 2 Card -->
        <div
            class="bg-gradient-to-br from-[#622D9A] via-[#982FC1] to-[#DD40D5] text-white p-6 rounded-3xl shadow-lg wid hover:transform hover:translate-y-1 hover:shadow-xl transition-all duration-300 mb-8 flex flex-col items-center">
            <h2 class="text-2xl font-bold tracking-tight mb-6 text-center">
                Kelly Operation (Session 2)
            </h2>
            <p class="text-lg text-gray-200 mb-4 text-center">
                🗓️ <strong>Date:</strong> April 30, 2025
            </p>
            <div id="countdown2" class="text-center"></div>
            <a href="https://us06web.zoom.us/j/9605072232?pwd=TnpORWZoNXpTM01QMVg1ellLcFFlUT09&omn=81257466947"
                target="_blank"
                class="inline-block bg-[#F79B3A] text-[#982FC1] py-3 px-6 rounded-full shadow-lg transform hover:scale-105 hover:bg-[#F18718] transition duration-300 ease-in-out hover:animate-pulse text-center">
                Join Zoom Meeting (Session 2)
            </a>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
    AOS.init();

    // Countdown for Session 1 (April 29, 2025)
    const countDownDate1 = new Date("April 29, 2025 09:00:00").getTime();

    const countdownFunction1 = setInterval(function() {
        const now = new Date().getTime();
        const distance = countDownDate1 - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown1").innerHTML =
            days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

        if (distance < 0) {
            clearInterval(countdownFunction1);
            document.getElementById("countdown1").innerHTML = "Session Started!";
        }
    }, 1000);

    // Countdown for Session 2 (April 30, 2025)
    const countDownDate2 = new Date("April 30, 2025 09:00:00").getTime();

    const countdownFunction2 = setInterval(function() {
        const now = new Date().getTime();
        const distance = countDownDate2 - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown2").innerHTML =
            days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

        if (distance < 0) {
            clearInterval(countdownFunction2);
            document.getElementById("countdown2").innerHTML = "Session Started!";
        }
    }, 1000);
</script>

<section id="courses" class="max-w-7xl mx-auto px-4">
    <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-4xl sm:text-5xl font-bold text-gray-800 mb-3 tracking-tight">
            📚 Explore Specialized Learning Paths
        </h2>
        <p class="text-lg text-gray-500 max-w-2xl mx-auto">
            Enhance your clinical expertise with our thoughtfully curated courses, specifically designed to advance
            pediatric urology care for professionals at all levels of experience.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-8">
        @foreach ($courses as $course)
            <a href="{{ route('courses.show', $course->id) }}" class="group" data-aos="fade-up"
                data-aos-delay="{{ $loop->index * 100 }}">
                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
                    @if ($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}"
                            class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110">
                    @else
                        <div
                            class="w-full h-56 bg-gray-100 flex items-center justify-center text-gray-400 text-sm font-medium">
                            No Image Available
                        </div>
                    @endif
                    <div class="p-5">
                        <h3
                            class="text-xl font-semibold text-gray-800 mb-1 group-hover:text-indigo-600 transition duration-300">
                            {{ $course->title }}
                        </h3>
                        <p class="text-sm text-gray-600">
                            Instructor: <span class="font-medium text-indigo-500">{{ $course->instructor }}</span>
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</section>

<section id="future_courses" class="max-w-7xl mx-auto px-4">
    <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-4xl sm:text-5xl font-bold text-gray-800 mb-3 tracking-tight" style="margin-top:40px;">
            🚀 Premium Courses
        </h2>
        <p class="text-lg text-gray-500 max-w-2xl mx-auto">
            Register now to unlock exclusive access to premium courses that will enhance your skills and knowledge!!
        </p>
    </div>

    <!-- Adjusted grid to display cards in 2 columns -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
        <!-- Course 2: Anatomy & Pathophysiology -->
        <div
            class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
            <img src="{{ asset('storage/images/banner/2.jpg') }}" alt="Anatomy & Pathophysiology"
                class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110">
            <div class="p-5">
                <h3
                    class="text-xl font-semibold text-gray-800 mb-1 group-hover:text-indigo-600 transition duration-300">
                    Anatomy & Pathophysiology</h3>
                <a href="mailto:info@nileofhope.org?subject=Registration for Anatomy & Pathophysiology Course&body=I would like to register for the Anatomy & Pathophysiology course. Please provide more information."
                    class="mt-4 inline-block bg-[#F79B3A] text-white py-2 px-6 rounded-xl text-center transition duration-300 hover:bg-[#F79B3A]">Contact
                    to Register</a>
            </div>
        </div>

        <!-- Course 3: Diagnosis & Imaging -->
        <div
            class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
            <img src="{{ asset('storage/images/banner/3.jpg') }}" alt="Diagnosis & Imaging"
                class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110">
            <div class="p-5">
                <h3
                    class="text-xl font-semibold text-gray-800 mb-1 group-hover:text-indigo-600 transition duration-300">
                    Diagnosis & Imaging</h3>
                <a href="mailto:info@nileofhope.org?subject=Registration for Diagnosis & Imaging Course&body=I would like to register for the Diagnosis & Imaging course. Please provide more information."
                    class="mt-4 inline-block bg-[#F79B3A] text-white py-2 px-6 rounded-xl text-center transition duration-300 hover:bg-[#F79B3A]">Contact
                    to Register</a>
            </div>
        </div>

        <!-- Course 6: Postoperative Care & Long-Term Follow-Up -->
        <div
            class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
            <img src="{{ asset('storage/images/banner/6.jpg') }}" alt="Postoperative Care & Long-Term Follow-Up"
                class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110">
            <div class="p-5">
                <h3
                    class="text-xl font-semibold text-gray-800 mb-1 group-hover:text-indigo-600 transition duration-300">
                    Postoperative Care & Long-Term Follow-Up</h3>
                <a href="mailto:info@nileofhope.org?subject=Registration for Postoperative Care & Long-Term Follow-Up Course&body=I would like to register for the Postoperative Care & Long-Term Follow-Up course. Please provide more information."
                    class="mt-4 inline-block bg-[#F79B3A] text-white py-2 px-6 rounded-xl text-center transition duration-300 hover:bg-[#F79B3A]">Contact
                    to Register</a>
            </div>
        </div>

        <!-- Course 7: Multidisciplinary Management -->
        <div
            class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
            <img src="{{ asset('storage/images/banner/7.jpg') }}" alt="Multidisciplinary Management"
                class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110">
            <div class="p-5">
                <h3
                    class="text-xl font-semibold text-gray-800 mb-1 group-hover:text-indigo-600 transition duration-300">
                    Multidisciplinary Management</h3>
                <a href="mailto:info@nileofhope.org?subject=Registration for Multidisciplinary Management Course&body=I would like to register for the Multidisciplinary Management course. Please provide more information."
                    class="mt-4 inline-block bg-[#F79B3A] text-white py-2 px-6 rounded-xl text-center transition duration-300 hover:bg-[#F79B3A]">Contact
                    to Register</a>
            </div>
        </div>

        <!-- Course 8: Research & Protocol Development -->
        <div
            class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
            <img src="{{ asset('storage/images/banner/8.jpg') }}" alt="Research & Protocol Development"
                class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110">
            <div class="p-5">
                <h3
                    class="text-xl font-semibold text-gray-800 mb-1 group-hover:text-indigo-600 transition duration-300">
                    Research & Protocol Development</h3>
                <a href="mailto:info@nileofhope.org?subject=Registration for Research & Protocol Development Course&body=I would like to register for the Research & Protocol Development course. Please provide more information."
                    class="mt-4 inline-block bg-[#F79B3A] text-white py-2 px-6 rounded-xl text-center transition duration-300 hover:bg-[#F79B3A]">Contact
                    to Register</a>
            </div>
        </div>

        <!-- Course 9: Patient Communication & Family Counseling -->
        <div
            class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105">
            <img src="{{ asset('storage/images/banner/9.jpg') }}" alt="Patient Communication & Family Counseling"
                class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110">
            <div class="p-5">
                <h3
                    class="text-xl font-semibold text-gray-800 mb-1 group-hover:text-indigo-600 transition duration-300">
                    Patient Communication & Family Counseling</h3>
                <a href="mailto:info@nileofhope.org?subject=Registration for Patient Communication & Family Counseling Course&body=I would like to register for the Patient Communication & Family Counseling course. Please provide more information."
                    class="mt-4 inline-block bg-[#F79B3A] text-white py-2 px-6 rounded-xl text-center transition duration-300 hover:bg-[#F79B3A]">Contact
                    to Register</a>
            </div>
        </div>
    </div>
</section>

<main id="inquire">
    <article class="container">
        <section class="newsletter">
            <div class="newsletter-card">
                <div class="card-content">
                    <h3 class="h3 card-title">Want to inquire about a course?</h3>

                    <p class="card-text">
                        Interested in learning more about a course on the HOPBE Learning platform from Nile of Hope
                        Hospital Academy?
                        Enter your email below and we'll get in touch to help you find the right course for you.
                    </p>
                </div>

                <form action="mailto:info@nileofhope.org" method="POST" enctype="text/plain" class="card-form"
                    data-form>
                    <input type="email" name="email_address" placeholder="Your email address" required
                        class="input-field" data-input>
                    <button type="submit" class="btn btn-primary" data-submit>Inquire</button>
                </form>
            </div>
        </section>
    </article>
</main>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<div class="sidebar">
    <ul>
        <li><a href="#welcome"><span class="rank">1</span> 🔝 Home</a></li>
        <li><a href="#upcoming_session"><span class="rank">2</span> 🎥 Live Session</a></li>
        <li><a href="#courses"><span class="rank">3</span> 📚 Enrolled Courses</a></li>
        <li><a href="#future_courses"><span class="rank">4</span> 🚀 Premium Courses</a></li>
        <li><a href="#inquire"><span class="rank">5</span> 📩 Inquire Now</a></li>
    </ul>
</div>

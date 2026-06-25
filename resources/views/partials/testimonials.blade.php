{{-- Success Stories / Testimonials — reusable section --}}
@php
    $testimonialsLabel = $testimonialsLabel ?? __('Success Stories');
    $testimonialsTitle = $testimonialsTitle ?? __('Real Students, Real Results');
    $testimonialsSubtitle = $testimonialsSubtitle ?? __('See how our advisors helped hundreds of students achieve their dream of studying in Ireland.');

    $stories = [
        [
            'student_photo' => 'students/alinystudent.webp',
            'photo_position' => 'center 60%',
            'student_name' => 'Yago & Tiago Gontijo',
            'course' => __('BA in Business — Independent College'),
            'quote' => __('So much gratitude for clearing up all our doubts and for all the support throughout our entire process! Highly recommended!'),
            'consultant' => ['name' => 'Aliny', 'photo' => 'consultant/aliny.webp'],
        ],
        [
            'student_photo' => 'students/albertstudent.webp',
            'photo_position' => 'center center',
            'student_name' => 'Juan Fernando',
            'course' => __('Higher Diploma in Science in Data Analytics - City colleges'),
            'quote' => __('Incredible support and dedication throughout every step of my application process. Moving to Ireland was a dream — Albert made it real!'),
            'consultant' => ['name' => 'Albert', 'photo' => 'consultant/albert.webp'],
        ],
        [
            'student_photo' => 'students/romariostudent.webp',
            'photo_position' => 'center center',
            'student_name' => 'Elis',
            'course' => __('Higher Certificate in Sound Engineering and Music Production — DBS'),
            'quote' => __('Every detail of my application was handled with precision and warmth. Outstanding service — I could not have done it without Romario!'),
            'consultant' => ['name' => 'Romario', 'photo' => 'consultant/romario.webp'],
        ],
        [
            'student_photo' => 'students/talitastudent.webp',
            'photo_position' => 'center center',
            'student_name' => 'Yari Yolibet',
            'course' => __('BA in Business — Holmes Institute'),
            'quote' => __('From my very first question to my arrival in Dublin, I felt fully supported every step of the way. Talita is simply the best!'),
            'consultant' => ['name' => 'Talita', 'photo' => 'consultant/talita.webp'],
        ],
        [
            'student_photo' => 'students/wagnerstudent.webp',
            'photo_position' => 'center center',
            'student_name' => 'Pedro Costa',
            'course' => __('BSc in Computing — TU Dublin'),
            'quote' => __("Wagner's knowledge of Irish education is truly unmatched. He made the whole process smooth and stress-free. Best decision I ever made!"),
            'consultant' => ['name' => 'Wagner', 'photo' => 'consultant/wagner.webp'],
        ],
    ];
    $whatsappHref = 'https://wa.me/353868179430';
@endphp

<section class="testimonials" id="testimonials">
    <div class="container">
        <div class="testimonials-header">
            <div class="testimonials-label">{{ $testimonialsLabel }}</div>
            <h2 class="testimonials-title">{{ $testimonialsTitle }}</h2>
            <p class="testimonials-subtitle">{{ $testimonialsSubtitle }}</p>
        </div>

        <div class="stories-slider" data-stories-slider>
            <div class="stories-viewport">
                <div class="stories-track" data-stories-track>
                    @foreach ($stories as $i => $story)
                        <article class="story-slide" role="group" aria-roledescription="slide" aria-label="{{ ($i + 1) . ' / ' . count($stories) }}">
                            <figure class="story-photo">
                                <img src="{{ asset($story['student_photo']) }}" alt="{{ $story['student_name'] }}" style="object-position: {{ $story['photo_position'] }};" loading="lazy">
                                <figcaption class="story-student">
                                    <span class="story-student-name">{{ $story['student_name'] }}</span>
                                    <span class="story-student-course">{{ $story['course'] }}</span>
                                </figcaption>
                            </figure>
                            <div class="story-body">
                                <div class="story-stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                                <blockquote class="story-quote">{{ $story['quote'] }}</blockquote>
                                <div class="story-consultant">
                                    <img src="{{ asset($story['consultant']['photo']) }}" alt="{{ $story['consultant']['name'] }}" class="story-consultant-photo" loading="lazy">
                                    <div class="story-consultant-info">
                                        <div class="story-consultant-name">{{ $story['consultant']['name'] }}</div>
                                        <div class="story-consultant-badge">
                                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                            {{ __('Verified Advisor') }}
                                        </div>
                                    </div>
                                </div>
                                <a class="story-cta" href="{{ $whatsappHref }}" target="_blank" rel="noopener">
                                    <svg viewBox="0 0 32 32" fill="currentColor" aria-hidden="true"><path d="M16.001 3C9.373 3 4 8.373 4 15c0 2.643.85 5.087 2.297 7.073L4 29l7.094-2.265A11.957 11.957 0 0016 27c6.627 0 12-5.373 12-12S22.628 3 16.001 3zm0 21.6c-1.86 0-3.6-.515-5.085-1.41l-.365-.215-4.21 1.345 1.345-4.12-.235-.38A9.553 9.553 0 016.4 15c0-5.296 4.305-9.6 9.6-9.6 5.295 0 9.6 4.305 9.6 9.6 0 5.296-4.305 9.6-9.6 9.6zm5.27-7.18c-.29-.146-1.71-.844-1.975-.94-.265-.097-.458-.146-.65.146-.193.29-.748.94-.917 1.133-.17.193-.34.218-.63.072-.29-.145-1.22-.45-2.325-1.434-.86-.766-1.44-1.713-1.61-2.003-.17-.29-.018-.448.128-.593.132-.13.29-.34.435-.51.146-.17.193-.29.29-.484.097-.193.048-.363-.024-.51-.072-.145-.65-1.567-.892-2.144-.234-.563-.473-.486-.65-.495l-.555-.01c-.193 0-.508.072-.775.363-.265.29-1.012.99-1.012 2.412 0 1.423 1.036 2.798 1.18 2.991.145.193 2.038 3.11 4.937 4.36.69.297 1.228.474 1.648.607.692.22 1.322.19 1.82.115.555-.083 1.71-.7 1.953-1.374.242-.674.242-1.252.17-1.374-.072-.122-.265-.193-.555-.34z"/></svg>
                                    {{ __('Talk to :name on WhatsApp', ['name' => $story['consultant']['name']]) }}
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="stories-nav">
                <button type="button" class="stories-arrow stories-prev" aria-label="{{ __('Previous story') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
                </button>
                <div class="stories-dots">
                    @foreach ($stories as $i => $story)
                        <button type="button" class="stories-dot @if ($i === 0) is-active @endif" data-stories-index="{{ $i }}" aria-label="{{ ($i + 1) . ' / ' . count($stories) }}"></button>
                    @endforeach
                </div>
                <button type="button" class="stories-arrow stories-next" aria-label="{{ __('Next story') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>

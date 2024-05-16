<x-home-layout>
    <x-slot name="homepage">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div class="order-2 text-center col-lg-6 order-lg-1 d-flex flex-column justify-content-center text-lg-start">
                    <h2>Bienvenue chez <span>{{$siteinfo->title}}</span></h2>
                    <p>{{$siteinfo->accroche}}</p>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="{{ route('avis.create') }}" class="btn-get-started">Laisser un Avis</a>
                        <a href="https://form.jotform.com/240582831304047" class="btn-watch-video d-flex align-items-center" target="_blank"><i class="bi bi-pencil-square"></i><span>Demander un devis</span></a>
                    </div>
                </div>
                <div class="order-1 col-lg-6 order-lg-2">
                    <img src="{{asset($siteinfo->logo)}}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
                </div>
            </div>
        </div>

        <div class="icon-boxes position-relative">
            <div class="container position-relative">
                <div class="mt-5 row gy-4">
                    @foreach ($competences as $competence)
                        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="{{$competence->delay}}">
                            <div class="icon-box">
                                <div class="icon"><i class="{{$competence->icon}}"></i></div>
                                <h4 class="title"><span class="stretched-link">{{$competence->name}}</span></h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-slot>

    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>{{$home_content->about_title}}</h2>
                <p>{{$home_content->about_content}}</p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-6">
                    <h3>{{$about->title}}</h3>
                    <img src="{{asset($about->first_img)}}" class="mb-4 img-fluid rounded-4" alt="">
                    <p>{{$about->first_content}}</p>
                </div>
                <div class="col-lg-6">
                    <div class="content ps-0 ps-lg-5">
                        <p class="fst-italic">
                            {{$about->second_content}}
                        </p>
                        <div class="mt-4 position-relative">
                        <img src="{{asset($about->second_img)}}" class="img-fluid rounded-4" alt="">
                        @if ($about->video_link != "")
                            <a href="{{$about->video_link}}" class="glightbox play-btn"></a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section id="stats-counter" class="stats-counter">
        <div class="container" data-aos="fade-up">

          <div class="row gy-4 align-items-center">

            <div class="col-lg-6">
              <img src="assets/img/stats-img.svg" alt="" class="img-fluid">
            </div>

            <div class="col-lg-6">

              <div class="stats-item d-flex align-items-center">
                <span data-purecounter-start="0" data-purecounter-end="{{$avis->count()}}" data-purecounter-duration="1" class="purecounter"></span>
                <p><strong>Client(s) satisfait(s)</strong> Solutions sur mesure, satisfaction garantie.</p>
              </div><!-- End Stats Item -->

              <div class="stats-item d-flex align-items-center">
                <span data-purecounter-start="0" data-purecounter-end="{{$portfolios->count()}}" data-purecounter-duration="1" class="purecounter"></span>
                <p><strong>Projets</strong> Nous sommes prêts à relever le défi et à transformer vos idées en réalité.</p>
              </div><!-- End Stats Item -->

                @if ($time_worked >= 1000)
                    <div class="stats-item d-flex align-items-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{$time_worked_day}}" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Jour(s) travaillé(s)</strong> Une détermination sans limite à faire aboutir vos projets avec succès.<br>({{$time_worked}} heures)</p>
                    </div><!-- End Stats Item -->
                @else
                    <div class="stats-item d-flex align-items-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{$time_worked}}" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Heure(s) travaillée(s)</strong> Une détermination sans limite à faire aboutir vos projets avec succès.</p>
                    </div><!-- End Stats Item -->
                @endif

            </div>

          </div>

        </div>
      </section>
      @if (!$services->isEmpty())
        <section id="services" class="services sections-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>{{$home_content->services_title}}</h2>
                </div>
                <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6">
                            <div class="service-item position-relative">
                                <div class="icon">
                                    <i class="{{$service->icon}}"></i>
                                </div>
                                <h3>{{$service->title}}</h3>
                                <p>{{$service->description}}</p>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach
                </div>
            </div>
        </section>
      @endif

      @if (!$avis->isEmpty() || $avis->count() >= 5)
        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Avis</h2>
                    <p>Voluptatem quibusdam ut ullam perferendis repellat non ut consequuntur est eveniet deleniti fignissimos eos quam</p>
                </div>

                <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach ($avis as $avi)
                            <div class="swiper-slide">
                                <div class="testimonial-wrap">
                                    <div class="testimonial-item">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h3>{{ $avi->author->name }}</h3>
                                                <h4>{{ $avi->author->role->name }}</h4>
                                                <div class="stars">
                                                    @php
                                                        $note = $avi->note;
                                                    @endphp

                                                    @if($note >= 1)
                                                        @for ($i = 0; $i < $note; $i++)
                                                            <i class="bi bi-star-fill"></i>
                                                        @endfor

                                                        @for ($i = 0; $i < (5 - $note); $i++)
                                                            <i class="bi bi-star"></i>
                                                        @endfor
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            {{ $avi->description }}
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                </div>
            </section>
        @endif


      <section id="portfolio" class="portfolio sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>{{$home_content->portfolio_title}}</h2>
                <p>{{$home_content->portfolio_content}}</p>
            </div>

            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

                <div>
                    <ul class="portfolio-flters">
                        <li data-filter="*" class="filter-active">Tout</li>
                        @foreach ($tags as $tag)
                            <li data-filter=".filter-{{$tag->id}}">{{$tag->name}}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="row gy-4 portfolio-container">
                    @foreach ($portfolios as $portfolio)
                        <div class="col-xl-4 col-md-6 portfolio-item @foreach ($portfolio->tags as $tag)filter-{{$tag->id}} @endforeach">
                            <div class="portfolio-wrap">
                                <a href="{{$portfolio->link}}" data-gallery="portfolio-gallery-app" target="_blank" class="glightbox"><img src="{{asset($portfolio->image)}}" class="img-fluid" alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="{{$portfolio->link}}" target="_blank">{{$portfolio->title}}</a></h4>
                                    <p>{{$portfolio->description}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-4">
                    <div class="content px-xl-5">
                        @php
                            $faqTitle = $home_content->faq_title;
                            $words = explode(' ', $faqTitle);
                            $FAQfirstWord = $words[0];
                            $FAQrestOfWords = implode(' ', array_slice($words, 1));
                        @endphp
                        <h3><strong>{{$FAQfirstWord}}</strong> {{$FAQrestOfWords}}</h3>
                        <p>{{$home_content->faq_content}}</p>
                    </div>
                </div>

                <div class="col-lg-8">

                    <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
                        @foreach ($faqs as $faq)
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{$faq->id}}">
                                        <span class="num">{{$faq->id}}.</span>
                                        {{$faq->question}}
                                    </button>
                                </h3>
                                <div id="faq-content-{{$faq->id}}" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        {{$faq->answer}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                    <h2>{{$home_content->contact_title}}</h2>
                    <p>{{$home_content->contact_content}}</p>
            </div>
            <div class="row gx-lg-0 gy-4">
                <div class="col-lg-4">
                    <div class="info-container d-flex flex-column align-items-center justify-content-center">
                        @if ($siteinfo->use_address)
                            <div class="info-item d-flex">
                                <i class="flex-shrink-0 bi bi-geo-alt"></i>
                                <div>
                                    <h4>Adresse:</h4>
                                    <p>{{$siteinfo->adresse}},<br>{{$siteinfo->codePostal}} {{$siteinfo->ville}}<br>{{$siteinfo->pays}}</p>
                                </div>
                            </div>
                        @endif
                        @if ($siteinfo->use_email)
                            <div class="info-item d-flex">
                                <i class="flex-shrink-0 bi bi-envelope"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p>{{$siteinfo->email}}</p>
                                </div>
                            </div>
                        @endif
                        @if ($siteinfo->use_phone)
                            <div class="info-item d-flex">
                                <i class="flex-shrink-0 bi bi-phone"></i>
                                <div>
                                    <h4>Téléphone:</h4>
                                    <p>{{$siteinfo->phone}}</p>
                                </div>
                            </div>
                        @endif

                        <div class="info-item d-flex">
                            <i class="flex-shrink-0 bi bi-clock"></i>
                            <div>
                                <h4>Horaires:</h4>
                                <p>{{$siteinfo->horaires}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form action="{{route('sendContact')}}" method="post" role="form" class="php-email-form">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="{{$home_content->contact_name_input}}" required>
                            </div>
                            <div class="mt-3 col-md-6 form-group mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="{{$home_content->contact_email_input}}" required>
                            </div>
                        </div>
                        <div class="mt-3 form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="{{$home_content->contact_subject_input}}" required>
                        </div>
                        <div class="mt-3 mb-6 form-group">
                            <textarea class="form-control" name="message" rows="9" placeholder="{{$home_content->contact_message_input}}" required></textarea>
                        </div>

                        <div class="text-center"><button type="submit">Envoyer le message</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-home-layout>

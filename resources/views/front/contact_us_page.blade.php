@extends('layouts.master')

@section('title','Contact us')

@section('content')
    <!-- Abut Us -->
    <section class="pt-120 pb-55">
        <div class="container">
            <div class="row align-items-center pb-4">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="text-center" data-animate="fadeInUp" data-delay=".1">
                        <img src="img/number-one.png" alt="" data-rjs="2">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="number-one-content" data-animate="fadeInUp" data-delay=".3">
                        <h2 class="mb-3">We are no. 1 internet service provider company in United States.</h2>
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensure and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="single-about-us" data-animate="fadeInUp" data-delay=".1">
                        <h3 class="h4">Our Mission</h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias similique sunt in culpa qui officia deserunt mollitia quidem rerum facilis est et expedita distinctio.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-about-us" data-animate="fadeInUp" data-delay=".4">
                        <h3 class="h4">Our Vission</h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias similique sunt in culpa qui officia deserunt mollitia quidem rerum facilis est et expedita distinctio.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-about-us" data-animate="fadeInUp" data-delay=".7">
                        <h3 class="h4">Our Ambition</h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias similique sunt in culpa qui officia deserunt mollitia quidem rerum facilis est et expedita distinctio.</p>
                    </div>
                </div>
                <div class="col"  data-animate="fadeInUp" data-delay=".1">
                    <p class="pt-3 pb-5 mb-2"><strong>On the other hand, we denounce with righteous indignation and dislike men</strong> who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those <strong>who fail in their duty through weakness</strong> of will, which is the same as saying through shrinking from toil and pain.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Abut Us -->
    <!-- Contacts -->
    <section class="pt-10 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Map -->
                    <div class="map" data-animate="fadeInUp" data-delay=".1" data-trigger="map" data-map-options='{"latitude": "37.386052", "longitude": "-122.083851", "zoom": "15", "api_key": "AIzaSyCjkssBA3hMeFtClgslO2clWFR6bRraGz0"}'></div>
                </div>
                <div class="col-lg-4">
                    <!-- Map description -->
                    <div class="map-description light-bg d-flex align-items-center" data-animate="fadeInUp" data-delay=".4">
                        <p>" At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis ntium voluptatum cupiditate non provident, lique sunt in culpa qui officia eserunt mollitia animi, id est laborum noakhalir lok fuga "</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-contacts-widget-wrapper light-bg d-flex align-items-center" data-animate="fadeInUp" data-delay=".1">
                        <!-- Contact Info -->
                        <div class="page-contacts-widget">
                            <h3 class="h4">Contact Us</h3>
                            <div class="contact-widget-content">
                                <p>Sed ut perspiciatis unde omnis natus vitae dicta sunt explicabo.</p>
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fa fa-phone"></i>
                                        <a href="tel:+1234567890">(+1) 234-567-890</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope-o"></i>
                                        <a href="mailto:serviney.demo@fakemail.com">serviney.demo@fakemail.com</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-map-marker"></i>
                                        <span>784/A Zirtoli Bazar, Begumgonj, Noakhali-3800, BD</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- Contact Form -->
                    <div class="contact-form parsley-validate-wrap mt-60" data-animate="fadeInUp" data-delay=".4">
                        <h3 class="bordered-title">Get In Touch</h3>
                        <div class="form-response"></div>
                        <form method="post" action="http://themelooks.net/demo/serviney/html/preview/sendmail.php">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-field">
                                        <input type="text" name="name" class="theme-input-style" placeholder="Your Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-field">
                                        <input type="email" name="email" class="theme-input-style" placeholder="E-mail address" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-field">
                                        <input type="text" name="phone" class="theme-input-style" placeholder="Telephone" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-field">
                                        <input type="text" name="subject" class="theme-input-style" placeholder="Subject">
                                    </div>
                                </div>
                            </div>
                            <div class="form-field">
                                <textarea name="message" class="theme-input-style" placeholder="Write your message" required></textarea>
                            </div>
                            <button type="submit" class="btn">Send Message</button>
                        </form>
                    </div>
                    <!-- End of Contact Form -->
                </div>
            </div>
        </div>
    </section>
    <!-- End of Contacts -->

@endsection

@section('script')



@endsection

@extends("layouts.customerlayout")
@section("customercontent")

        <!-- Main -->
        <main class="main">
            <div class="page-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12">
                            <div class="contact-from-area padding-20-row-col">
                                <h4 class="mb-10">Contact Us</h4>
                                <p class="text-muted mb-30 font-sm">Your email address will not be published. Required fields are marked *</p>
                                <form class="contact-form" id="contact-form" action="/contactus_submit" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <input name="name" placeholder="First Name" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input name="email" placeholder="Your Email" type="email" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input name="phone" placeholder="Your Phone" type="tel" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input name="subject" placeholder="Subject" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <textarea name="message" placeholder="Message"></textarea>
                                            </div>
                                            <div class="form-group mb-0 float-end">
                                                <button class="submit submit-auto-width" type="submit">Send message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex">
                            <div class="contact-card w-100">
                                <div class="contact-body">
                                    <div class="contact-icon">
                                        <p><i class="feather-mail"></i></p>
                                    </div>
                                    <div class="contact-details">
                                        <h4>Email</h4>
                                        <p class="text-muted">contactus@adorepal.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 d-flex">
                            <div class="contact-card w-100">
                                <div class="contact-body">
                                    <div class="contact-icon">
                                        <p><i class="feather-phone-call"></i></p>
                                    </div>
                                    <div class="contact-details">
                                        <h4>Phone Number</h4>
                                        <p class="text-muted">+92-322-4963358</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 d-flex">
                            <div class="contact-card w-100">
                                <div class="contact-body">
                                    <div class="contact-icon">
                                        <p><i class="feather-map-pin"></i></p>
                                    </div>
                                    <div class="contact-details">
                                        <h4>Address</h4>
                                        <p class="text-muted">Shehzada Market Ghazi Road Main Defence Lahore Pakistan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Google Map -->
            <div class="map-grid">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39826.04283008571!2d-0.06359185714613338!3d51.40070868201977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876002c98ae8579%3A0x69e9592192db09e5!2sBeckenham%2C%20UK!5e0!3m2!1sen!2sin!4v1642686555108!5m2!1sen!2sin" allowfullscreen="" aria-hidden="false" tabindex="0" class="contact-map"></iframe>
            </div>
            <!-- Google Map -->
        </main>
        <!-- /Main -->

@endsection

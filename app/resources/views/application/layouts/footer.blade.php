<footer class="footer-area" style="padding-top: 20px; margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="single-widget-bottom">
                    <h3>{{ Lang::get('application.general.follow_social') }}</h3>

                    <ul class="social-icon">
                        <li>
                            <a href="https://www.facebook.com/" target="_blank">
                                <i class="bx bxl-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" target="_blank">
                                <i class="bx bxl-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="single-widget-bottom">
                    <h3>{{ Lang::get('application.general.donate') }}</h3>

                    <ul class="payment">
                        <a href="#" target="_blank">
                            <li>
                                <img src="{{ asset('assets/images/payment/card-1.jpg') }}" alt="Image">
                            </li>
                            <li>
                                <img src="{{ asset('assets/images/payment/card-2.jpg') }}" alt="Image">
                            </li>
                            <li>
                                <img src="{{ asset('assets/images/payment/card-3.jpg') }}" alt="Image">
                            </li>
                            <li>
                                <img src="{{ asset('assets/images/payment/card-4.jpg') }}" alt="Image">
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copy-right-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <p>
                    {!! Lang::get('application.general.copyright') !!}
                </p>
            </div>

            <div class="col-lg-6">
                <ul class="terms-condition">
                    <li>
                        <a href="terms-condition.html">
                            {{ Lang::get('application.general.terms_and_conditions') }}
                        </a>
                    </li>
                    <li>
                        <a href="privacy-policy.html">
                            {{ Lang::get('application.general.privacy_policy') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

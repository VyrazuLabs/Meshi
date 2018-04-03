<!-- footer -->
    <footer id="footer" class="clearfix">
        <!-- footer-top -->
        <section class="footer-top clearfix">
            <div class="container">
                <div class="row">
                    <!-- footer-widget -->
                    <div class="col-sm-3">
                        <div class="footer-widget">
                            <h3>{{ trans('app.Quik Links') }}</h3>
                            <ul>
                                <li><a href="#">{{ trans('app.About Us') }}</a></li>
                                <li><a href="#">{{ trans('app.Contact Us') }}</a></li>
                                <li><a href="#">{{ trans('app.Food Festival') }}</a></li>
                                <li><a href="#">{{ trans('app.All Cities') }}</a></li>
                                <li><a href="#">{{ trans('app.Help & Support') }}</a></li>
                                <li><a href="{{url('/privacy-policy')}}">{{ trans('app.Privacy Policy') }}</a></li>
                                <li><a href="{{route('terms')}}">{{ trans('app.Terms & conditions') }}</a></li>
                                <li><a href="{{route('shoppingCart')}}">{{ trans('app.Shopping cart feature') }}</a></li>
                                <li><a href="#">{{ trans('app.Blog') }}</a></li>
                            </ul>
                        </div>
                    </div><!-- footer-widget -->

                    <!-- footer-widget -->
                    <div class="col-sm-3">
                        <div class="footer-widget">
                            <h3>{{ trans('app.Foods') }}</h3>
                            <ul>
                                <li><a href="#">{{ trans('app.Delicious Foods') }}</a></li>
                                <li><a href="#">{{ trans('app.Snacks') }}</a></li>
                                <li><a href="#">{{ trans('app.Lunch') }}</a></li>
                                <li><a href="#">{{ trans('app.Dinner') }}</a></li>
                                <li><a href="#">{{ trans('app.Breakfast') }}</a></li>
                                <li><a href="#">{{ trans('app.Desert') }}</a></li>
                            </ul>
                        </div>
                    </div><!-- footer-widget -->

                    <!-- footer-widget -->
                    <div class="col-sm-3">
                        <div class="footer-widget social-widget">
                            <h3>{{ trans('app.Follow us on') }}</h3>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-official"></i>{{ trans('app.Facebook') }}</a></li>
                                <li><a href="#"><i class="fa fa-twitter-square"></i>Twitter</a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square"></i>Google+</a></li>
                                <li><a href="#"><i class="fa fa-youtube-play"></i>youtube</a></li>
                            </ul>
                        </div>
                    </div><!-- footer-widget -->

                    <!-- footer-widget -->
                    <div class="col-sm-3">
                        <div class="footer-widget news-letter">
                            <h3>{{ trans('app.Newsletter') }}</h3>
                            <p>{{ trans('app.Trade is Worldest leading classifieds platform that brings!') }}</p>
                            <!-- form -->
                            <form action="#">
                                <input type="email" class="form-control" placeholder="{{ trans('app.Your email id') }}">
                                <button type="submit" class="btn btn-primary">{{ trans('app.Sign Up') }}</button>
                            </form><!-- form -->            
                        </div>
                    </div><!-- footer-widget -->
                </div><!-- row -->
            </div><!-- container -->
        </section><!-- footer-top -->

        
        <div class="footer-bottom clearfix text-center">
            <div class="container">
                <p>{{ trans('app.Copyright') }} &copy; 2018. <a href="https://sharemeshi.com/">{{ trans('app.sharemeshi') }}</a></p>
            </div>
        </div><!-- footer-bottom -->
    </footer><!-- footer -->
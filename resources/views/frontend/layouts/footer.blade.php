<!-- footer -->
    <footer id="footer" class="clearfix">
        <!-- footer-top -->
        <section class="footer-top clearfix">
            <div class="container">
                <div class="row">
                    <!-- footer-widget -->
                    <div class="col-sm-4">
                        <div class="footer-widget">
                            <h3>{{ trans('app.Quik Links') }}</h3>
                            <ul>
                                <li><a href="{{route('about_us')}}">{{ trans('app.About Us') }}</a></li>
                                <li><a href="{{route('faq')}}">{{ trans('app.FAQ') }}</a></li>
                                <li><a href="{{ route('contact_us')}}">{{ trans('app.Contact Us') }}</a></li>
                                <li><a href="{{ route('beginners_tutorial')}}">{{ trans('app.Beginners Tutorial') }}</a></li>
                            </ul>
                        </div>
                    </div><!-- footer-widget -->


                    <!-- footer-widget -->
                    <div class="col-sm-4">
                        <div class="footer-widget social-widget">
                            <h3>{{ trans('app.Follow us on') }}</h3>
                            <ul>
                                <li><a href="https://ja-jp.facebook.com/sharemeshi/" target="_blank"><i class="fa fa-facebook-official"></i>{{ trans('app.Facebook') }}</a></li>
                                <li><a href="https://www.youtube.com/channel/UCtuXZT-wwiCYVv_ZpMZI1gA" target="_blank"><i class="fa fa-youtube-play"></i>youtube</a></li>
                            </ul>
                        </div>
                    </div><!-- footer-widget -->

                    <!-- footer-widget -->
                    <div class="col-sm-3">
                        <div class="footer-widget">
                        </div>
                    </div><!-- footer-widget -->


                    <!-- footer-widget -->
                    {{--<div class="col-sm-3">--}}
                        {{--<div class="footer-widget news-letter">--}}
                            {{--<h3>{{ trans('app.Newsletter') }}</h3>--}}
                            {{--<p>{{ trans('app.Trade is Worldest leading classifieds platform that brings!') }}</p>--}}
                            {{--<!-- form -->--}}
                            {{--<form action="#">--}}
                                {{--<input type="email" class="form-control" placeholder="{{ trans('app.Your email id') }}">--}}
                                {{--<button type="submit" class="btn btn-primary">{{ trans('app.Sign Up') }}</button>--}}
                            {{--</form><!-- form -->--}}
                        {{--</div>--}}
                    {{--</div><!-- footer-widget -->--}}
                </div><!-- row -->
            </div><!-- container -->
        </section><!-- footer-top -->


        <div class="footer-bottom clearfix text-center">
            <div class="container">
                <p>{{ trans('app.Copyright') }} &copy; 2018. <a href="https://sharemeshi.com/">{{ trans('app.sharemeshi') }}</a></p>
            </div>
        </div><!-- footer-bottom -->
    </footer><!-- footer -->

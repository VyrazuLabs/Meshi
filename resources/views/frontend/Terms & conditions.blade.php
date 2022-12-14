@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.Terms & conditions') }}
@endsection

@section('add-meta')

@endsection

@section('content')
	<section id="" class="clearfix page">
		<div class="container">
			<div class="faq-page">
				<div class="breadcrumb-section">
					<!-- breadcrumb -->
					<ol class="breadcrumb new-breadcrumb">
						<li class="t-orange"><a href="{{ url('/')}}">{{ trans('app.HOME')}}</a></li>
						<li class="t-orange"><a href="{{route('terms')}}">{{ trans('app.Terms & conditions') }}</a></li>
					</ol><!-- breadcrumb -->						
					<h2 class="title t-orange">{{ trans('app.Terms & conditions') }}</h2>
				</div>
				<h3 class="t-black">クリエーターさんについて</h3>

				<div class="accordion">
					<div class="panel-group" id="accordion">
						<h4>1. 基本情報</h4>
						<div class="panel panel-default panel-faq">
							<div class="panel-heading active-faq">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-one">
									<h4 class="panel-title">
										クリエーターさんとは？
									<span class="pull-right"><i class="fa fa-minus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-one" class="panel-collapse collapse collapse in">
								<div class="panel-body">
									<p>お料理を作り、地域に貢献頂く方のことです。</p>
									<p>おすそ分けしたいお料理をシェアメシサイト上にアップし、イーターさんへおすそ分けいただく方です。地域貢献/見守り、配送、手料理の３点について値付けを頂きます。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-two">
									<h4 class="panel-title">
										お料理のお届け方法は？
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-two" class="panel-collapse collapse">
								<div class="panel-body">
									<p>お料理はクリエーターさんご本人、あるいはそのご家族にお届けしてもらうことを推奨しております。これは手料理のお届けまでをクリエーターさんご本人またはご家族に行っていただくことで、その思いも地域のイーターさんにお届けいただいたり、見守り役としての役目も果たして頂くなど、シェアメシを通してイーターさんとのコミュニケーションや繋がりを楽しんで頂きたいと願っておりますためです。お渡し頂き、クリエーターさんがお食事を済まされ、クリエーターさんへ評価をされた後、イーターさんへの評価をお願いしております。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-three">
									<h4 class="panel-title">
										お料理のお届け場所は？
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-three" class="panel-collapse collapse">
								<div class="panel-body">
									<p>イーターさんのご自宅またはイーターさんのご指定される場所にお届け頂きます。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-four">
									<h4 class="panel-title">
										容器などは自分で用意するの？
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-four" class="panel-collapse collapse">
								<div class="panel-body">
									<p>容器に関しましては運営がすべてご用意致します。</p>
									<p>	ご登録頂いた際にご住所に送付させていただきます。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-five">
									<h4 class="panel-title">
										保健所の許可や飲食店営業許可は 事前にもらう必要はないの？
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-five" class="panel-collapse collapse">
								<div class="panel-body">
									<p>シェアメシのサービスは、その地域に住む方々で、手料理を提供したい方、手料理を食べたい方をシェアメシサイト上でマッチング、個人個人の繋がりを感じてもらった上で、手料理のおすそわけを行うサービスとなります、従い不特定多数へのサービスではなく、地域に密着した助け合いのサービスであると解釈しており、保健所の許可や飲食店営業許可などに抵触するものではありません。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-six">
									<h4 class="panel-title">
										一般の主婦のような素人が作っても大丈夫なの？調理師の免許などは不要なの？
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-six" class="panel-collapse collapse">
								<div class="panel-body">
									<p>法律上、料理の作り手が調理師の免許をもっていなければいけないという規定はございませんので、調理師の免許などは不要です。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-seven">
									<h4 class="panel-title">
										食あたり等、自分の手料理を食べたイーターさんに問題が発生した場合はどうなるの？
										<span class="pull-right"><i class="fa fa-minus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-seven" class="panel-collapse collapse">
								<div class="panel-body">
									<p>まずは運営にご連絡下さい。ご連絡は<a href="#">こちら</a>から。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-eight">
									<h4 class="panel-title">
										代金はいつどのように振り込まれるの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-eight" class="panel-collapse collapse">
								<div class="panel-body">
									<p>手料理をお届けいただいた後、申請ページより申請していただきます。申請に問題が無いことが確認できましたら6営業日以内に振込が行われます。</p>
									<p>手数料は申請金額が1万円未満の場合216円、1万円以上は無料となっております。</p>
								</div>
							</div>
						</div><!-- panel -->

						<h4>2. 登録について</h4>
						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-nine">
									<h4 class="panel-title">
										登録後の手料理公開までの方法を教えて下さい。
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-nine" class="panel-collapse collapse">
								<div class="panel-body">
									<p>1.ご登録時の項目を記載後、運営のご連絡をお待ちください。順次、写真撮影、動画撮影などの手配をひとりひとりに丁寧にさせて頂きます。（※登録時にアップ頂くご自身のお写真を元に、手料理のご提供を開始頂くことも可能です）</p>
									<p>2.おすそ分けしたいお料理写真、おすすめポイントなどを記載いただいた後、提供可能日、時間を選択頂き、シェアメシサイト上にアップ下さい。</p>
									<p>3.予約が入ればイーターさんが指定した時間にお届け頂き完了です。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-ten">
									<h4 class="panel-title">
										登録した住所はサイト上で公開されるの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-ten" class="panel-collapse collapse">
								<div class="panel-body">
									<p>詳細住所は公開されません。「丁目」より前のエリア情報のみ、イーターさんに対して親近感が湧くように表示されます。（例：大田区、蒲田本町まで）</p>
								</div>
							</div>
						</div><!-- panel -->

						<h4>3. キャンセルについて</h4>
						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-eleven">
									<h4 class="panel-title">
										手料理をキャンセルした場合どうなるの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-eleven" class="panel-collapse collapse">
								<div class="panel-body">
									<p><b>＜クリエーターさんによるキャンセル＞</b></p>
										<p>イーターさん：イーターさん側に全額返金されます。</p>
										<p>クリエーターさん：お支払いされません</p>

									<p><b>＜イーターさんによるキャンセル＞</b></p>
									<p>クリエーターさんの設定した時間次第となります。</p>
									<p>クリエーターさんはご自身でキャンセルの時間（1時間前〜24時間前まで）と配分（半額/全額）を選択することができます。</p>

									<p>１時間前キャンセル　全額</p>
									<p>２時間前キャンセル　</p>
									<p>３時間前キャンセル　半額</p>
									<p>６時間前キャンセル　　</p>
									<p>12時間前キャンセル</p>
									<p>24時間前キャンセル</p>

								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-twelve">
									<h4 class="panel-title">
										手料理の提供時間を変更をしたい場合、どうなるの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-twelve" class="panel-collapse collapse">
								<div class="panel-body">
									<p>時間調整はチャット上でお願いしております。もし時間調整が成立しない場合は</p>
									<p><b>＜クリエーターさんからの変更の場合＞</b></p>
									<p>イーターさん：イーターさん側に全額返金されます。</p>
									<p>クリエーターさん：お支払いされません</p>

									<p><b>＜イーターさんによる変更の場合＞</b></p>
									<p>キャンセルについては、クリエーターさんの設定した時間次第でそれに準じる形となります。</p>
								</div>
							</div>
						</div><!-- panel -->

					</div>
				</div>
				<h3 class="t-black">イーターさんについて</h3>
				<div class="accordion">
					<div class="panel-group" id="eateraccordion">			
						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-one">
									<h4 class="panel-title">
										イーターさんとは？
									<span class="pull-right"><i class="fa fa-minus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-one" class="panel-collapse collapse">
								<div class="panel-body">
									<p>提供されたお料理を楽しんで頂く方のことです。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-two">
									<h4 class="panel-title">
										食べた手料理の味が合わなかった場合はどうなるの？
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-two" class="panel-collapse collapse">
								<div class="panel-body">
									<p>料理の味の感じ方は人それぞれです。シェアメシでは、様々なクリエーターさんからあなにあったクリエーターさんを選んで頂くことができます。ぜひあなただけのお気に入りのクリエーターさんを見つけてみてください。</p>
									<p>手数料は申請金額が1万円未満の場合216円、1万円以上は無料となっております。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-three">
									<h4 class="panel-title">
										お料理のお届け方法は？
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-three" class="panel-collapse collapse">
								<div class="panel-body">
									<p>お料理は基本的にクリエーターさんご本人、あるいはそのご家族によってお届けされます。これは手料理のお届けまでをクリエーターさん本人またはご家族に行っていただくことで、その思いも地域のイーターさんにお届けいただいたり、見守り役としての役目も果たして頂くなど、シェアメシを通してクリエーターさんとのコミュニケーションや繋がりを楽しんで頂きたいと願っておりますためです。お受け取り頂き、お食事を済まされた後、クリエーターさんへの評価をお願いしております。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-four">
									<h4 class="panel-title">
										Q.登録後の手料理公開までの方法を教えて下さい。
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-four" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>									
									<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi,</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-five">
									<h4 class="panel-title">
										お料理のお届け場所は？
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-five" class="panel-collapse collapse">
								<div class="panel-body">
									<p>イーターさんのご自宅またはイーターさんのご指定される場所にお届け頂きます。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-six">
									<h4 class="panel-title">
										クリエーターさんは一般の主婦の方も多いけど素人が作っても大丈夫なの？調理師の免許などは不要なの？
									<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-six" class="panel-collapse collapse">
								<div class="panel-body">
									<p>法律上、料理の作り手が調理師の免許をもっていなければいけないという規定はございませんので、調理師の免許などは不要です。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-seven">
									<h4 class="panel-title">
										食あたり等、クリエーターさんの手料理を食べて問題が発生した場合はどうなるの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-seven" class="panel-collapse collapse">
								<div class="panel-body">
									<p>まずは運営にご相談下さい。ご連絡は<a href="#">こちら</a>から。</p>
								</div>
							</div>
						</div><!-- panel -->


						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-eight">
									<h4 class="panel-title">
										代金はどのように支払うの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-eight" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Paypalを通じてクレジットカードでお支払い頂きます。クリエーターさんの地域貢献/見守り、配送、手料理の３点の価格に、運営手数料を加えて価格をお支払い頂き、お料理をご予約頂きます。</p>
								</div>
							</div>
						</div><!-- panel -->


						<h4>2. 登録について</h4>
						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-nine">
									<h4 class="panel-title">
										登録した住所はサイト上で公開されるの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-nine" class="panel-collapse collapse">
								<div class="panel-body">
									<p>詳細住所は公開されません。「丁目」より前のエリア情報のみ、クリエーターさんに対して親近感が湧くように表示されます。（例：大田区、蒲田本町まで）</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-ten">
									<h4 class="panel-title">
										手料理の依頼をキャンセルした場合どうなるの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-ten" class="panel-collapse collapse">
								<div class="panel-body">
									<p><b>＜クリエーターさんによるキャンセル＞</b></p>
									<p>イーターさん：イーターさん側に全額返金されます。</p>
									<p>クリエーターさん：お支払いされません</p>
									<p><b>＜イーターさんによるキャンセル＞</b></p>
									<p>クリエーターさんの設定した時間次第となります。</p>
									<p>詳細は各クリエーターさんのお料理のページをご確認ください</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-eleven">
									<h4 class="panel-title">
										手料理の時間変更をしたい場合、どうなるの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-eleven" class="panel-collapse collapse">
								<div class="panel-body">
									<p>時間調整はチャット上でお願いしております。もし時間調整が成立しない場合は、</p>
									<p><b>＜クリエーターさんからの変更の場合＞</b></p>
									<p>イーターさん：イーターさん側に全額返金されます。</p>
									<p>クリエーターさん：お支払いされません</p>

									<p><b>＜イーターさんによる変更の場合＞</b></p>
									<p>キャンセルについては、クリエーターさんの設定した時間次第でそれに準じる形となります。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-thirteen">
									<h4 class="panel-title">
										値引き交渉はできるの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-thirteen" class="panel-collapse collapse">
								<div class="panel-body">
									<p>基本的に値引き交渉は応じる事が出来ません。町で売っているお弁当や飲食点では、通常値引きがされることは少ないです。クリエーターさんは鮮度の高く手間暇かかった手料理を提供されておりますので、値引きする事は難しいです。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-fourteen">
									<h4 class="panel-title">
										値段が少し高く感じるのですが
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-fourteen" class="panel-collapse collapse">
								<div class="panel-body">
									<p>例えば、有機野菜や無農薬野菜は、スーパーなどで見かける一般の野菜と比べ、価格が高いことが多いです。なぜ高いのか。これは、「野菜の栽培にかけられている手間」が違ってくるからというのが理由のひとつです。大量生産される一般の野菜は、科学肥料や化学合成農薬などが使われるため、効率よく栄養を与えることができたり、害虫や雑草を駆除することができます。我々シェアメシのクリエーターさんの手料理も、調理時に添加物を加えることなく、全て手作りの手間暇かかった愛情のこもったお料理提供されており、安いものを提供されているわけではございません。またお値段には配送料と地域の方への見守り/マッチングも料金として含まれているとお考え下さい。</p>
								</div>
							</div>
						</div><!-- panel -->


					</div>
				</div>
			</div><!-- faq-page -->
		</div><!-- container -->
	</section>
@endsection

@section('add-js')
@endsection

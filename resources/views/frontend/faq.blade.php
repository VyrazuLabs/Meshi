@extends('frontend.layouts.master')

@section('title')
  {{ trans('app.FAQ') }}
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
						<li class="t-orange"><a href="{{route('faq')}}">{{ trans('app.FAQ') }}</a></li>
					</ol><!-- breadcrumb -->						
					<h2 class="title t-orange">{{ trans('app.FAQ') }}</h2>
				</div>
				<h3 class="t-black">メシクリエーターさんについて</h3>

				<div class="accordion">
					<div class="panel-group" id="accordion">
						<h4>1. 基本情報</h4>
						<div class="panel panel-default panel-faq">
							<div class="panel-heading active-faq">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-one">
									<h4 class="panel-title">
										メシクリエーターさんとは？
									<span class="pull-right"><i class="fa fa-minus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-one" class="panel-collapse collapse collapse in">
								<div class="panel-body">
									<p>お料理を作り、地域に貢献頂く方のことです。</p>
									<p>おすそ分けしたいお料理をシェアメシサイト上にアップし、メシイーターさんへおすそ分けいただく方です。地域貢献/見守り、配送、手料理の３点について値付けを頂きます。</p>
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
									<p>お料理はメシクリエーターさんご本人、あるいはそのご家族にお届けしてもらうことを推奨しております。これは手料理のお届けまでをメシクリエーターさんご本人またはご家族に行っていただくことで、その思いも地域のメシイーターさんにお届けいただいたり、見守り役としての役目も果たして頂くなど、シェアメシを通してメシイーターさんとのコミュニケーションや繋がりを楽しんで頂きたいと願っておりますためです。お渡し頂き、メシクリエーターさんがお食事を済まされ、メシクリエーターさんへ評価をされた後、メシイーターさんへの評価をお願いしております。</p>
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
									<p>メシイーターさんのご自宅またはメシイーターさんのご指定される場所にお届け頂きます。</p>
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
										食あたり等、自分の手料理を食べたメシイーターさんに問題が発生した場合はどうなるの？
										<span class="pull-right"><i class="fa fa-minus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-seven" class="panel-collapse collapse">
								<div class="panel-body">
									<p>まずは運営にご連絡下さい。ご連絡は<a href="/contact-us">こちら</a>から。</p>
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
									<p>1.おすそ分けしたいお料理写真、おすすめポイントなどを記載いただいた後、提供可能日、時間を選択頂き、シェアメシサイト上にアップ下さい。</p>
									<p>2.予約が入ればイーターさんが指定した時間にお届け頂き完了です。</p>
									<p></p>
									<p>※なおご登録後、運営から順次、写真撮影、動画撮影などの手配をひとりひとりに丁寧に行わせて頂きますので、ご連絡をお待ち下さい。</p>
									<p>（写真撮影や、動画撮影を行わせて頂くことで、メシイーターの方々がメシクリエーターの方々をより身近に感じることができ、より選ばれやすくなります！）</p>
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
									<p>詳細住所は公開されません。メシイーターさんに対して親近感が湧くように、エリア名称のみ表示されます。（例：大田区、蒲田本町まで）</p>
								</div>
							</div>
						</div><!-- panel -->

						<h4>3. キャンセルについて</h4>
						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-eleven">
									<h4 class="panel-title">
										購入決済完了後、手料理の依頼をキャンセルしたい場合どうなるの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-eleven" class="panel-collapse collapse">
								<div class="panel-body">
									<p>なるべくキャンセルが発生しないようにお願いをしております。</p>
									<p>どうしてもキャンセルせざるを得ない場合は、<a href="/contact-us">コンタクトフォーム</a>よりお問い合わせください。</p>

									<p><b>＜メシクリエーターさんからのキャンセルの場合＞</b></p>
									<p>お料理代金はお支払いされません。</p>
									<p><b>＜メシイーターさんからのキャンセルの場合＞</b></p>
									<p>運営よりご連絡いたします。キャンセルのタイミングによっては、購入金額の一部をお支払い致します。</p>
									<p>※ 近日公開予定のバージョンアップ版では、キャンセル関連の機能を追加予定です。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#faq-twelve">
									<h4 class="panel-title">
										購入決済完了後、手料理の提供時間を変更をしたい場合どうなるの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="faq-twelve" class="panel-collapse collapse">
								<div class="panel-body">
									<p>時間調整の際はコンタクトフォームから運営までご連絡ください。</p>
									<p>なるべく時間調整が発生しないようにお願いをしております。</p>
									<p>どうしても時間調整せざるを得ない場合は、コンタクトフォームよりお問い合わせください。</p>

									<p>もし時間調整が成立しない場合は</p>


									<p><b>＜メシクリエーターさんからの変更の場合＞</b></p>
									<p>お料理代金は、お支払いされません。</p>

									<p><b>＜メシイーターさんによる変更の場合＞</b></p>
									<p>時間調整のタイミングによっては、キャンセル扱いになりますので、購入金額の一部をお支払い致します。</p>
									<p>※ 近日公開予定のバージョンアップ版では、時間調整関連の機能を追加予定です。</p>
								</div>
							</div>
						</div><!-- panel -->

					</div>
				</div>
				<h3 class="t-black">メシイーターさんについて</h3>
				<div class="accordion">
					<div class="panel-group" id="eateraccordion">
						<h4>1. 基本情報</h4>
						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-one">
									<h4 class="panel-title">
										メシイーターさんとは？
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
									<p>料理の味の感じ方は人それぞれです。シェアメシでは、様々なメシクリエーターさんからあなに合ったメシクリエーターさんを選んで頂くことができます。ぜひあなただけのお気に入りのメシクリエーターさんを見つけてみてください。</p>
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
									<p>お料理は基本的にメシクリエーターさんご本人、あるいはそのご家族によってお届けされます。これは手料理のお届けまでをメシクリエーターさん本人またはご家族に行っていただくことで、その思いも地域のメシイーターさんにお届けいただいたり、見守り役としての役目も果たして頂くなど、シェアメシを通してメシクリエーターさんとのコミュニケーションや繋がりを楽しんで頂きたいと願っておりますためです。お受け取り頂き、お食事を済まされた後、メシクリエーターさんへの評価をお願いしております。</p>
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
									<p>メシイーターさんのご自宅またはメシイーターさんのご指定される場所にお届け頂けます。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-six">
									<h4 class="panel-title">
										メシクリエーターさんは一般の主婦の方も多いけど素人が作っても大丈夫なの？調理師の免許などは不要なの？
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
										食あたり等、メシクリエーターさんの手料理を食べて問題が発生した場合はどうなるの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-seven" class="panel-collapse collapse">
								<div class="panel-body">
									<p>まずは運営にご相談下さい。ご連絡は<a href="/contact-us">こちら</a>から。</p>
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
									<p>Paypalを通じてクレジットカードでお支払い頂きます。メシクリエーターさんの地域貢献/見守り、配送、手料理の３点の価格に、運営手数料を加えて価格をお支払い頂き、お料理をご予約頂きます。</p>
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
									<p>詳細住所は公開されません。メシクリエーターさんに対して親近感が湧くように、エリア名称のみ表示されます。（例：大田区、蒲田本町まで）</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-ten">
									<h4 class="panel-title">
										購入決済完了後、手料理をキャンセルしたい場合どうなるの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-ten" class="panel-collapse collapse">
								<div class="panel-body">
									<p>なるべくキャンセルが発生しないようにお願いをしております。</p>
									<p>どうしてもキャンセルせざるを得ない場合は、<a href="/contact-us">コンタクトフォーム</a>よりお問い合わせください。</p>

									<p><b>＜メシイーターさんからのキャンセルの場合＞</b></p>
									<p>キャンセルのタイミングによっては、全額または半額のキャンセル料が発生することがあります。</p>
									<p><b>＜メシクリエーターさんからのキャンセルの場合＞</b></p>
									<p>運営よりご連絡いたします。お料理代金は全額支払い戻しされます。</p>
									<p>※ 近日公開予定のバージョンアップ版では、キャンセル関連の機能を追加予定です。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-eleven">
									<h4 class="panel-title">
										購入決済完了後、手料理の時間変更をしたい場合、どうなるの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-eleven" class="panel-collapse collapse">
								<div class="panel-body">
									<p>時間調整の際はコンタクトフォームから運営までご連絡ください。</p>
									<p>なるべく時間調整が発生しないようにお願いをしております。</p>
									<p>ただしどうしても時間調整をしたい場合は、<a href="/contact-us">コンタクトフォーム</a>よりお問い合わせください。</p>
									<p>もし時間調整が成立しない場合は</p>

									<p><b>＜メシクリエーターさんからの変更の場合＞</b></p>
									<p>全額支払い戻しされます。</p>

									<p><b>＜メシイーターさんによる変更の場合＞</b></p>
									<p>時間調整のタイミングによっては、キャンセル扱いになりますので、全額または半額のキャンセル料が発生することがあります。</p>
									<p>※ 近日公開予定のバージョンアップ版では、時間調整関連の機能を追加予定です。</p>
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
									<p>基本的に値引き交渉は応じる事が出来ません。メシクリエーターさんは鮮度の高く、手間暇のかかった手料理を提供されておりますので、値引きする事は難しいです。</p>
								</div>
							</div>
						</div><!-- panel -->

						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-fourteen">
									<h4 class="panel-title">
										値段が少し高く感じるのだけど？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-fourteen" class="panel-collapse collapse">
								<div class="panel-body">
									<p>例えば、有機野菜や無農薬野菜は、スーパーなどで見かける一般の野菜と比べ、価格が高いことが多いです。なぜ高いのか。これは、「野菜の栽培にかけられている手間」が違ってくるからというのが理由のひとつです。大量生産される一般の野菜は、科学肥料や化学合成農薬などが使われるため、効率よく栄養を与えることができたり、害虫や雑草を駆除することができます。シェアメシのメシクリエーターさんは、調理時に添加物を加えることなく、全て手作りで手間暇かけて愛情のこもったお料理を提供されています。またお値段には、地域貢献/見守り料、及び配送料が含まれています。</p>
								</div>
							</div>
						</div><!-- panel -->


						<h4>3. キャンセルについて</h4>
						<div class="panel panel-default panel-faq">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#eateraccordion" href="#eater-fifteen">
									<h4 class="panel-title">
										手料理をキャンセルした場合どうなるの？
										<span class="pull-right"><i class="fa fa-plus"></i></span>
									</h4>
								</a>
							</div><!-- panel-heading -->

							<div id="eater-fifteen" class="panel-collapse collapse">
								<div class="panel-body">
									<p>＜イーターさんによる変更の場合＞
									<p>キャンセルについては、クリエーターさんの設定した時間次第でそれに準じる形となります。</p>
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

<!-- customer review modal start -->
<!-- Modal -->
<div class="modal fade" id="reviewmodal" role="dialog">
  <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body customer-review-body">
          <!-- <form id="regForm"> -->
          {!! Form::open(array('id' => 'eaterReviewForm')) !!}
            {!! Form::hidden('order_id', null,array('id'=>'orderID')) !!}

              <!-- One "tab" for each step in the form: -->
              <div class="tab">
                <div class="eater-review-box d-inline-block">
                  <!-- food quality rating -->
                  <div class="col-lg-12 col-xs-12 review-text-div p-0">
                    <div class="d-inline-block">
                      <h3 class="m-0 t-black review-text">Food Quality</h3>
                      {!! Form::hidden('quality_ratings', null,array('id'=>'qualityRatingId')) !!}
                    </div>
                    <div class="mb-0 rating d-inline-block">
                        <input type="radio" id="star5" name="foodqualityrating" value="5" onclick="return rateQuality(this);"  data-id="5"/>
                        <label for="star5" title="Excellent"><span class="sr-only">5 stars</span></label>
                        <input type="radio" id="star4" name="foodqualityrating" value="4" onclick="return rateQuality(this);"  data-id="4"/>
                        <label for="star4" title="Very good"><span class="sr-only">4 stars</span></label>
                        <input type="radio" id="star3" name="foodqualityrating" value="3" onclick="return rateQuality(this);"  data-id="3"/>
                        <label for="star3" title="Good"><span class="sr-only">3 stars</span></label>
                        <input type="radio" id="star2" name="foodqualityrating" value="2" onclick="return rateQuality(this);"  data-id="2"/>
                        <label for="star2" title="Bad"><span class="sr-only">2 stars</span></label>
                        <input type="radio" id="star1" name="foodqualityrating" value="1" onclick="return rateQuality(this);"  data-id="1"/>
                        <label for="star1" title="Very bad"><span class="sr-only">1 stars</span></label>
                    </div>
                  </div>
                  <!-- food delivery rating -->
                  <div class="col-lg-12 col-xs-12 review-text-div p-0">
                    <div class="d-inline-block">
                      <h3 class="m-0 t-black review-text">Delivery</h3>
                      {!! Form::hidden('delivery_ratings', null,array('id'=>'deliveryRatingId')) !!}
                    </div>
                    <div class="mb-0 rating d-inline-block">
                        <input type="radio" id="star10" name="fooddeliveryrating" value="5" onclick="return rateDelivery(this);"  data-id="5"/>
                        <label for="star10" title="Excellent"><span class="sr-only">5 stars</span></label>
                        <input type="radio" id="star9" name="fooddeliveryrating" value="4" onclick="return rateDelivery(this);"  data-id="4"/>
                        <label for="star9" title="Very good"><span class="sr-only">4 stars</span></label>
                        <input type="radio" id="star8" name="fooddeliveryrating" value="3" onclick="return rateDelivery(this);"  data-id="3"/>
                        <label for="star8" title="Good"><span class="sr-only">3 stars</span></label>
                        <input type="radio" id="star7" name="fooddeliveryrating" value="2" onclick="return rateDelivery(this);"  data-id="2"/>
                        <label for="star7" title="Bad"><span class="sr-only">2 stars</span></label>
                        <input type="radio" id="star6" name="fooddeliveryrating" value="1" onclick="return rateDelivery(this);"  data-id="1"/>
                        <label for="star6" title="Very bad"><span class="sr-only">1 stars</span></label>
                    </div>
                  </div>
                  <!-- food communication ratings -->
                  <div class="col-lg-12 col-xs-12 review-text-div p-0">
                    <div class="d-inline-block">
                      <h3 class="m-0 t-black review-text">Communication</h3>
                      {!! Form::hidden('communication_ratings', null,array('id'=>'communicationRatingId')) !!}
                    </div>
                    <div class="mb-0 rating d-inline-block">
                        <input type="radio" id="star15" name="foodcommunicationrating" value="5" onclick="return rateCommunication(this);"  data-id="5"/>
                        <label for="star15" title="Excellent"><span class="sr-only">5 stars</span></label>
                        <input type="radio" id="star14" name="foodcommunicationrating" value="4" onclick="return rateCommunication(this);"  data-id="4"/>
                        <label for="star14" title="Very good"><span class="sr-only">4 stars</span></label>
                        <input type="radio" id="star13" name="foodcommunicationrating" value="3" onclick="return rateCommunication(this);"  data-id="3"/>
                        <label for="star13" title="Good"><span class="sr-only">3 stars</span></label>
                        <input type="radio" id="star12" name="foodcommunicationrating" value="2" onclick="return rateCommunication(this);"  data-id="2"/>
                        <label for="star12" title="Bad"><span class="sr-only">2 stars</span></label>
                        <input type="radio" id="star11" name="foodcommunicationrating" value="1" onclick="return rateCommunication(this);"  data-id="1"/>
                        <label for="star11" title="Very bad"><span class="sr-only">1 stars</span></label>
                    </div>
                  </div>
                </div>
                <div class="form-group eater-review-group">
                  <textarea class="form-control eater_reviews" rows="8" placeholder="Enter Your Description" name="review_description"></textarea>
                </div>
                <div class="form-group text-center mb-0">
                  <button type="button" class="btn back-orange communication-submit-btn store-reviews">submit</button>
                </div>
              </div>
          {!! Form::close() !!}
        </div>
      </div>
  </div>
</div>
<!-- customer review modal end -->


<!-- food creator review modal start -->
<div class="modal fade" id="creatorreviewmodal" role="dialog">
  <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body customer-review-body">
          {!! Form::open(array('url' => route('save_creator_review'),'id' => 'creatorReviewForm')) !!}
            {!! Form::hidden('order_id', null,array('id'=>'orderId')) !!}
            {!! Form::hidden('communication_ratings', null,array('id'=>'creatorCommunicationRatingId')) !!}
            <!-- One "tab" for each step in the form: -->
            <div class="col-lg-12 col-xs-12 eater-review-box d-inline-block p-0">
              <div class="col-lg-12 col-xs-12 review-text-div p-0">
                <div class="d-inline-block">
                  <h3 class="text-center t-black m-0 review-text">Communication</h3>
                </div>
                <div class="mb-0 rating d-inline-block">
                    <input type="radio" id="star20" name="creatorcommunicationrating" value="5" value="5" onclick="return rateEaterCommunication(this);"  data-id="5"/>
                    <label for="star20" title="Excellent">5 stars</label>
                    <input type="radio" id="star19" name="creatorcommunicationrating" value="4" value="5" onclick="return rateEaterCommunication(this);"  data-id="4"/>
                    <label for="star19" title="Very good">4 stars</label>
                    <input type="radio" id="star18" name="creatorcommunicationrating" value="3" value="5" onclick="return rateEaterCommunication(this);"  data-id="3"/>
                    <label for="star18" title="Good">3 stars</label>
                    <input type="radio" id="star17" name="creatorcommunicationrating" value="2" value="5" onclick="return rateEaterCommunication(this);"  data-id="2"/>
                    <label for="star17" title="Bad">2 stars</label>
                    <input type="radio" id="star16" name="creatorcommunicationrating" value="1" value="5" onclick="return rateEaterCommunication(this);"  data-id="1"/>
                    <label for="star16" title="Very bad">1 star</label>
                </div>
              </div>
            </div>
            <div class="form-group eater-review-group md-forms">
              <textarea class="form-control communication_details" rows="8" placeholder="Enter Your Description" name="communication_description" ></textarea>
            </div>
            <div class="form-group text-center mb-0">
              <button type="button" class="btn back-orange communication-submit-btn creator-communication">submit</button>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
<!-- food creator review modal end -->
<!-- image crop modal -->
 <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Crop the image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="img-container">
            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="crop">Crop</button>
        </div>
      </div>
    </div>
  </div>
  <!-- image crop modal -->

<div class="modal fade" id="addinfomodal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">{{ trans('app.Eater Info') }}</h4>
      </div>
      <div class="modal-body eater-info-body">
        <div class="eater-info-img-div" id="buyer-image">
        </div>
        <div class="eater-info-description-div">
          <p class="eater-info-text">{{ trans('app.Name') }} : <span class="mr-3" id="buyer-name"></span> </p>
          <p class="eater-info-text">{{ trans('app.Nickname') }} : <span class="mr-3" id="buyer-nick-name"></span> </p>
          <p class="eater-info-text">{{ trans('app.Phone') }} : <span class="mr-3" id="buyer-phone"></span> </p>
          <p class="eater-info-text">{{ trans('app.Gender') }} : <span class="mr-3" id="buyer-gender"></span> </p>
          <p class="eater-info-text">{{ trans('app.Age') }} : <span class="mr-3" id="buyer-age"></span> </p>

          <p class="eater-info-text less-text">{{ trans('app.Introduction') }} :
            <span class="mr-3"></span><span class="comment more" id="buyer-introduction"></span>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- creator review modal -->
<div class="modal fade" id="FoodCreatorReviewModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body foodcreator-review-modal-body">
      <div class="see-eater-review-box">
          <div class="see-eater-review-box-image" id="creatorImage">
          </div>
          <div class="see-eater-review-box-description">
            <p class="t-orange foodcreator-review-title" id="creator-name"></p>
            <p class="mb-0" id="creator-review-description"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- creator review modal -->
<!--  eater review modal -->
<div class="modal fade" id="FoodEaterReviewModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body foodcreator-review-modal-body">
        <div class="see-eater-review-box">
          <div class="see-eater-review-box-image" id="eaterImage">
          </div>
          <div class="see-eater-review-box-description">
            <p class="t-orange foodcreator-review-title" id="eater-name"></p>
            <p class="mb-0" id="eater-review-description"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--  eater review modal -->

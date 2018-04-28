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
            <div class="text-center">
              <h3 class="text-center t-black">Food Quality</h3>
              {!! Form::hidden('quality_ratings', null,array('id'=>'qualityRatingId')) !!}

              <div class="rating float-none d-inline-block">
                <input type="radio" id="star5"  value="5" onclick="return rateQuality(this);"  data-id="5"/>
                <label for="star5" title="Excellent">5 stars</label>

                <input type="radio" id="star4"  value="4" onclick="return rateQuality(this);"  data-id="4"/>
                <label for="star4" title="Very good">4 stars</label>

                <input type="radio" id="star3"   value="3" onclick="return rateQuality(this);"  data-id="3"/>
                <label for="star3" title="Good">3 stars</label>

                <input type="radio" id="star2"  value="2" onclick="return rateQuality(this);"  data-id="2"/>
                <label for="star2" title="Bad">2 stars</label>

                <input type="radio" id="star1"  value="1" onclick="return rateQuality(this);"  data-id="1"/>
                <label for="star1" title="Very bad">1 star</label>
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="8" placeholder="Enter Your Description" name="quality_description"></textarea>
            </div>
          </div>
          <div class="tab">
            <div class="text-center">
              <h3 class="text-center t-black">Delivery</h3>
              {!! Form::hidden('delivery_ratings', null,array('id'=>'deliveryRatingId')) !!}

              <div class="rating float-none d-inline-block">
                <input type="radio" id="star10" value="5" onclick="return rateDelivery(this);"  data-id="5"/>
                <label for="star10" title="Excellent">5 stars</label>
                <input type="radio" id="star9" value="4" onclick="return rateDelivery(this);"  data-id="4"/>
                <label for="star9" title="Very good">4 stars</label>
                <input type="radio" id="star8" value="3" onclick="return rateDelivery(this);"  data-id="3"/>
                <label for="star8" title="Good">3 stars</label>
                <input type="radio" id="star7" value="2" onclick="return rateDelivery(this);"  data-id="5"/>
                <label for="star7" title="Bad">2 stars</label>
                <input type="radio" id="star6" value="1" onclick="return rateDelivery(this);"  data-id="1"/>
                <label for="star6" title="Very bad">1 star</label>
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="8" placeholder="Enter Your Description" name="delivery_description"></textarea>
            </div>
          </div>
          <div class="tab">
            <div class="text-center">
              <h3 class="text-center t-black">Communication</h3>
              {!! Form::hidden('communication_ratings', null,array('id'=>'communicationRatingId')) !!}

              <div class="rating float-none d-inline-block">
                <input type="radio" id="star15" value="5" onclick="return rateCommunication(this);"  data-id="5"/>
                <label for="star15" title="Excellent">5 stars</label>
                <input type="radio" id="star14" value="4" onclick="return rateCommunication(this);"  data-id="4"/>
                <label for="star14" title="Very good">4 stars</label>
                <input type="radio" id="star13" value="3" onclick="return rateCommunication(this);"  data-id="3"/>
                <label for="star13" title="Good">3 stars</label>
                <input type="radio" id="star12" value="2" onclick="return rateCommunication(this);"  data-id="2"/>
                <label for="star12" title="Bad">2 stars</label>
                <input type="radio" id="star11" value="1" onclick="return rateCommunication(this);"  data-id="1"/>
                <label for="star11" title="Very bad">1 star</label>
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="8" placeholder="Enter Your Description" name="communication_description"></textarea>
            </div>
            <div class="form-group text-center">
              <button type="button" class="btn back-orange communication-submit-btn store-reviews">submit</button>
            </div>
          </div>
          <div class="reviewmodal-stepbtn">
            <div>
              <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
              <button id="prevBtn" onclick="nextPrev(-1)"" class="btn nextBtn pull-right prev-btn back-orange" type="button">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
              </button>
              <button id="nextBtn" onclick="nextPrev(1)" class="btn nextBtn pull-right next-btn back-orange" type="button">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
              </button>
              <!-- <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
            </div>
          </div>
          <!-- Circles which indicates the steps of the form: -->
          <div class="modal-stepbox">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
          </div>
          <!-- </form> -->
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
                    <div class="">
                      <div class="text-center">
                        <h3 class="text-center t-black">Communication</h3>
                        <div class="rating float-none d-inline-block">
                            <input type="radio" id="star20" name="creatorcommunicationrating" value="5" onclick="return rateEaterCommunication(this);"  data-id="5"/>
                            <label for="star20" title="Excellent">5 stars</label>
                            <input type="radio" id="star19" name="creatorcommunicationrating" value="4" onclick="return rateEaterCommunication(this);"  data-id="4"/>
                            <label for="star19" title="Very good">4 stars</label>
                            <input type="radio" id="star18" name="creatorcommunicationrating" value="3" onclick="return rateEaterCommunication(this);"  data-id="3"/>
                            <label for="star18" title="Good">3 stars</label>
                            <input type="radio" id="star17" name="creatorcommunicationrating" value="2" onclick="return rateEaterCommunication(this);"  data-id="2"/>
                            <label for="star17" title="Bad">2 stars</label>
                            <input type="radio" id="star16" name="creatorcommunicationrating" value="1" onclick="return rateEaterCommunication(this);"  data-id="1"/>
                            <label for="star16" title="Very bad">1 star</label>
                        </div>
                      </div>
                      <div class="form-group md-forms">
                        <textarea class="form-control communication_details" rows="8" placeholder="Enter Your Description" name="communication_description" ></textarea>
                      </div>
                      <div class="form-group text-center">
                        <button type="button" class="btn back-orange communication-submit-btn creator-communication">submit</button>
                      </div>
                    </div>
                {!! Form::close() !!}
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

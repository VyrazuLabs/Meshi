<!-- customer review modal start -->
<!-- Modal -->
<div class="modal fade" id="reviewmodal" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body customer-review-body">
        <!-- <form id="regForm"> -->
        {!! Form::open(array('url' => route('save_eater_review'),'id' => 'regForm')) !!}
          <!-- One "tab" for each step in the form: -->
          <div class="tab">
            <div class="text-center">
              <h3 class="text-center t-black">Food Quality</h3>
              <div class="rating float-none d-inline-block">
                <input type="radio" id="star5" name="foodqualityrating" value="5" />
                <label for="star5" title="Excellent">5 stars</label>
                <input type="radio" id="star4" name="foodqualityrating" value="4" />
                <label for="star4" title="Very good">4 stars</label>
                <input type="radio" id="star3" name="foodqualityrating" value="3" />
                <label for="star3" title="Good">3 stars</label>
                <input type="radio" id="star2" name="foodqualityrating" value="2" />
                <label for="star2" title="Bad">2 stars</label>
                <input type="radio" id="star1" name="foodqualityrating" value="1" />
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
              <div class="rating float-none d-inline-block">
                <input type="radio" id="star10" name="delivery-rating" value="5" />
                <label for="star10" title="Excellent">5 stars</label>
                <input type="radio" id="star9" name="delivery-rating" value="4" />
                <label for="star9" title="Very good">4 stars</label>
                <input type="radio" id="star8" name="delivery-rating" value="3" />
                <label for="star8" title="Good">3 stars</label>
                <input type="radio" id="star7" name="delivery-rating" value="2" />
                <label for="star7" title="Bad">2 stars</label>
                <input type="radio" id="star6" name="delivery-rating" value="1" />
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
              <div class="rating float-none d-inline-block">
                <input type="radio" id="star15" name="communication-rating" value="5" />
                <label for="star15" title="Excellent">5 stars</label>
                <input type="radio" id="star14" name="communication-rating" value="4" />
                <label for="star14" title="Very good">4 stars</label>
                <input type="radio" id="star13" name="communication-rating" value="3" />
                <label for="star13" title="Good">3 stars</label>
                <input type="radio" id="star12" name="communication-rating" value="2" />
                <label for="star12" title="Bad">2 stars</label>
                <input type="radio" id="star11" name="communication-rating" value="1" />
                <label for="star11" title="Very bad">1 star</label>
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="8" placeholder="Enter Your Description" name="communication_description"></textarea>
            </div>
            <div class="form-group text-center">
              <button type="button" class="btn back-orange communication-submit-btn">submit</button>
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

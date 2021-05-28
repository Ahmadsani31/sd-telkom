
<link rel="stylesheet" href="{{ asset('rating-emoji/main.css') }}">
<div class="modal" id="modalRating1" data-easein="bounceInDown" data-easeout="bounceOutDown" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-full">
      <div class="modal-content">
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="rating">
                            <input type="radio" name="star" class="nana" id="star1" data-id="4" value="4">
                                <label for="star1">
                                    <img src="{{ asset('rating-emoji/emoji-senang.gif') }}" class="img-responsive">
                                    <h4 class="text-emoji">Senang</h4>
                                </label>
                            <input type="radio" name="star" class="nana" id="star2" data-id="3" value="3">
                                <label for="star2">
                                    <img src="{{ asset('rating-emoji/emoji-sedih.gif') }}" class="img-responsive">
                                    <h4 class="text-emoji">Sedih</h4>
                                </label>
                            <input type="radio" name="star" class="nana" id="star3" data-id="2" value="2">
                                <label for="star3">
                                    <img src="{{ asset('rating-emoji/emoji-marah.gif') }}" class="img-responsive">
                                    <h4 class="text-emoji">Marah</h4>
                                </label>
                                <input type="radio" name="star" class="nana" id="star4" data-id="1" value="1">
                                <label for="star4">
                                    <img src="{{ asset('rating-emoji/emoji-takut.gif') }}" class="img-responsive">
                                    <h4 class="text-emoji">Takut</h4>
                                </label>
                                <h3 class="text">What Are You Feeling Kids</h3>
                        </div>
                    </div>
                </div>

            </div>

        </div>

      </div>
    </div>
  </div>

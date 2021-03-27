<form method="POST" action="<?= site_url('shopping/save_comment/' . $id * 2722) ?>" class="row mt-3">
    <div class="form-group col-12">
        <div class="star_rating">
            <span data-value="1"><i class="far fa-star"></i></span>
            <span data-value="2"><i class="far fa-star"></i></span>
            <span data-value="3"><i class="far fa-star"></i></span>
            <span data-value="4"><i class="far fa-star"></i></span>
            <span data-value="5"><i class="far fa-star"></i></span>
        </div>
    </div>
    <div class="form-group col-md-6" hidden>
        <input required="required" id="star_ratingg" name="rate" type="hidden" autocomplete="off">
        <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text" value="<?= $this->session->userdata('user_name') ?>">
    </div>
    <div class="form-group col-md-6" hidden>
        <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email" value="<?= $this->session->userdata('user_email') ?>">
    </div>
    <div class="form-group col-12">
        <textarea required="required" placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
    </div>

    <div class="form-group col-12">

        <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Submit Review</button>
    </div>
</form>
<script src="<?= site_url('themes/shopping/assets/') ?>js/jquery-1.12.4.min.js"></script>
<script>
    $('.star_rating span').on('click', function() {
        var onStar = parseFloat($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('.star_rating span');
        for (var i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }
        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }
    });
    $(".star_rating span").click(function() {
        var star = $(this).data("value")
        $("#star_ratingg").val(star)
    });
</script>
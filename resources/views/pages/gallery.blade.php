@extends('main')
@section('content')
	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url( {{ asset('/images/img_bg_2.jpg') }});">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Galeri Foto</h1>
							<!-- <h2>Free html5 templates Made by <a href="http://freehtml5.co" target="_blank">freehtml5.co</a></h2> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div id="fh5co-portfolio">
		<div class="container">
			<div class="row" style="margin-bottom:20px;">
				<div class="col-md-4 col-sm-4 thumb">
					<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="{{ asset('/images/gallery/foto1.jpg') }}" data-target="#image-gallery">
						<img class="img-responsive" src="{{ asset('/images/gallery/foto1.jpg') }}" alt="Short alt text">
					</a>
				</div>
				<div class="col-md-4 col-sm-4 thumb">
					<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="{{ asset('/images/gallery/foto2.jpg') }}" data-target="#image-gallery">
						<img class="img-responsive" src="{{ asset('/images/gallery/foto2.jpg') }}" alt="A alt text">
					</a>
				</div>
				<div class="col-md-4 col-sm-4 thumb">
					<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice" data-caption="And if there is money left, my girlfriend will receive this car" data-image="{{ asset('/images/gallery/foto3.jpg') }}" data-target="#image-gallery">
						<img class="img-responsive" src="{{ asset('/images/gallery/foto3.jpg') }}" alt="Another alt text">
					</a>
				</div>
			</div>
			<div class="row" style="margin-bottom:20px;">
				<div class="col-md-4 col-sm-4 thumb">
					<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="{{ asset('/images/gallery/foto4.jpg') }}" data-target="#image-gallery">
						<img class="img-responsive" src="{{ asset('/images/gallery/foto4.jpg') }}" alt="Short alt text">
					</a>
				</div>
				<div class="col-md-4 col-sm-4 thumb">
					<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="{{ asset('/images/gallery/foto5.jpg') }}" data-target="#image-gallery">
						<img class="img-responsive" src="{{ asset('/images/gallery/foto5.jpg') }}" alt="A alt text">
					</a>
				</div>
				<div class="col-md-4 col-sm-4 thumb">
					<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="{{ asset('/images/gallery/foto6.jpg') }}" data-target="#image-gallery">
						<img class="img-responsive" src="{{ asset('/images/gallery/foto6.jpg') }}" alt="Another alt text">
					</a>
				</div>
			</div>
			<div class="row" style="margin-bottom:20px;">
				<div class="col-md-4 col-sm-4 thumb">
					<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="{{ asset('/images/gallery/foto7.jpg') }}" data-target="#image-gallery">
						<img class="img-responsive" src="{{ asset('/images/gallery/foto7.jpg') }}" alt="Short alt text">
					</a>
				</div>
				<div class="col-md-4 col-sm-4 thumb">
					<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="{{ asset('/images/gallery/foto8.jpg') }}" data-target="#image-gallery">
						<img class="img-responsive" src="{{ asset('/images/gallery/foto8.jpg') }}" alt="A alt text">
					</a>
				</div>
				<div class="col-md-4 col-sm-4 thumb">
					<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-image="{{ asset('/images/gallery/foto9.jpg') }}" data-target="#image-gallery">
						<img class="img-responsive" src="{{ asset('/images/gallery/foto9.jpg') }}" alt="Another alt text">
					</a>
				</div>
			</div>
			
		</div>
		<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
					</div>
					<div class="modal-body">
						<img id="image-gallery-image" class="img-responsive" src="">
					</div>
					<div class="modal-footer">
						<div class="row col-sm-12">
							<div class="col-sm-2">
								<button type="button" class="btn btn-primary" id="show-previous-image">Previous</button>
							</div>
							<div class="col-sm-10">
								<button type="button" id="show-next-image" class="btn btn-default">Next</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
$(document).ready(function(){

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }
});
</script>
@endsection
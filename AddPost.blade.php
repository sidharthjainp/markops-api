<html lang="en" class="fullscreen">
   <head>
   @include('User.inc.head')
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
      <meta http-equiv="imagetoolbar" content="no">
      <style type="text/css">/* Chart.js */
         @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
      .main-body #chartLine {
         height: 52vh !important;
      }
      </style>

      
   </head>
   <body class="main-body leftmenu">
      <!-- End Switcher --> <!-- Loader --> 
      <div id="global-loader" style="display: none;"> <img src="../../assets/img/loader.svg" class="loader-img" alt="Loader"> </div>
      <!-- End Loader --> <!-- Page --> 
      <div class="page">
      @include('User.inc.header')

      

         <!-- Mobile-header closed --> <!-- Main Content--> 
         <div class="main-content side-content pt-0">
            <div class="container-fluid">
               <div class="inner-body">
                  
				  
			   <div class="row row-sm">
   <div class="col-lg-12 col-md-12">
      <div class="card custom-card">
	  	<form  action="#" id="frm-category" >
         <div class="card-body">
            <div>
               <h6 class="main-content-label mb-1">Add New Page</h6>
               <p class="text-muted card-sub-title"></p>
            </div>
            <div class="row row-sm">
               <div class="col-md-12 col-lg-12 col-xl-12">
                  <div class="">
                     <div class="form-group col-xl-6"> 
                        <label class="">Page URL</label>
                        <input class="form-control" required="" type="text" id="page_url" name="page_url" value=""> 
					      </div>
                    <div class="form-group col-xl-6">
                        <label class="">Page Heading</label> 
							   <input class="form-control pd-r-80" required="" type="text" id="page_heading" name="page_heading" value="" > 
                     </div>
                     <div class="form-group col-xl-6">
                        <label class="">Desktop Banner</label> 
							   <input class="form-control pd-r-80" required="" type="text" id="desktop_banner" name="desktop_banner" value="" > 
                     </div>
                     <div class="form-group col-xl-6">
                        <label class="">Mobile Banner</label> 
							   <input class="form-control pd-r-80" required="" type="text" id="mobile_banner" name="mobile_banner" value="" > 
                     </div>
					      <!-- <div class="form-group col-xl-12">
                        <label class="">Desktop Banner</label> 
							   <select class="form-control select select2" data-select2-id="1" tabindex="-1" aria-hidden="true" name="parent_id" id="parent_id">
                           <option label="Date" data-select2-id="3"></option>
                           <option value="1">1</option>
                        </select>
                     </div> -->
					      <div class="form-group col-xl-6">
                        <label class="">Meta Tags</label> 
						      <textarea class="form-control" name="meta_tags" rows="4" placeholder="text here.." id="meta_tags"></textarea>
                     </div>
                     <div class="form-group col-xl-6">
                        <label class="">CSS</label> 
						      <textarea class="form-control" name="css" rows="4" placeholder="text here.." id="css"></textarea>
                     </div>
                     <div class="form-group col-xl-6">
                        <label class="">JS</label> 
						      <textarea class="form-control" name="js" rows="4" placeholder="text here.." id="js"></textarea>
                     </div>
                     <div class="form-group col-xl-6">
                        <label class="">Page Content</label> 
						      <textarea class="form-control summernote" name="page_content" rows="4" placeholder="text here.." id="page_content"></textarea>
                     </div>
                     <button class="btn ripple btn-main-primary" id="submitButton">Add New Page</button> 
                  </div>
               </div>
            </div>
         </div>
		</form> 
      </div>
   </div>
</div>

      @include('User.inc.foot')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>

$(document).ready(function(){
  $('.summernote').summernote({
   height: 300,                 // set editor height
   minHeight: null,             // set minimum height of editor
   maxHeight: null,             // set maximum height of editor
   focus: true   ,
   codemirror: { // codemirror options
      theme: 'monokai'
   }               // set focus to editable area after initializing summernote
   });
});

</script>

	  <script>
	  	$(document).ready(function(){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		})

	    $("#frm-category").submit(function (e) {
			e.preventDefault();
        //$("#comment-message").css('display', 'none');
    	var str = $("#frm-category").serialize();
		$.ajax({
				url: "{{route('Insert-Page')}}",
				data: str,
				type: 'post',
				success: function (response)
				{
					if (response)
					{   
                  
						alert("New Page Added Successfully");
						// //$("#comment-message").css('display', 'inline-block');
						// //$("#comment-message").html('<span style="color: red;">Please Provide a comment</span>');    
						// return false;}
						
						// $("#comment-message").css('display', 'inline-block');
						// $("#comment-message").html('<span style="color: #189a18;">Comments Added Successfully!</span>');
                  $('#frm-category').trigger("reset");
                  $('#page_content').val("");
                  
                  } else
                  {
                     alert("Failed to add New Page !");
                     return false;
                  }
				
            }
					
			});
		});
	
	  </script>
      
      <div class="main-navbar-backdrop"></div>
   </body>
</html>
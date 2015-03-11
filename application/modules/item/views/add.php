
<div class="content">
	<div class="container" style="min-height:800px;">

		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li><a href="<?php echo BASEURL;?>marketplace/listView">Home</a></li>
				  <li class="active">Post Item</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<h3 style="color:#53335E;padding:0px;margin:5px;font-weight:bold;">Post Item</h3>
			</div>
		</div>

		<div class="row" >
			<div class="col-md-12" style="padding:10px;">


				<div class="panel panel-default">
				  <div class="panel-body">


					<form class="form-horizontal" id="defaultForm" method="post" action="<?php echo BASEURL;?>item/save">

						  <div class="form-group">
							<label for="item_name" class="col-sm-2 control-label" style="color:#525252;">Item Name</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Enter Item Name">
							</div>
						  </div>

						  <div class="form-group">
							<label for="item_description" class="col-sm-2 control-label" style="color:#525252;">Item Description</label>
							<div class="col-sm-10">
							  <textarea class="form-control" rows="3" id="item_description" name="item_description" placeholder="Enter Item Description"></textarea>
							</div>
						  </div>


							<div class="form-group">
							<label for="item_category" class="col-sm-2 control-label" style="color:#525252;">Item Category</label>
							<div class="col-sm-10">


								<select name="item_category" id="item_category" class="form-control" >
                                    <option value="">Select a Category</option>
									<?php foreach($this->category_array as $category)
									{
									?>
									<option value="<?php echo $category['category_id']?>"><?php echo $category['category_name']?></option>
									<?php
									}
									?>

								</select>


							</div>
						  </div>

						  <div class="form-group">
							<label for="item_price" class="col-sm-2 control-label" style="color:#525252;">Item Price</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="item_price" name="item_price" placeholder="Enter Item Price : $">
							</div>
						  </div>
						  <?php
						  $session_data = $this->session->userdata('logged_in');
						  if( $session_data['id']==3 || $session_data['id']==10){?>
							<div class="form-group">
							<label for="inputtext3" class="col-sm-2 control-label" style="color:#525252;">Item Type</label>
							<div class="col-sm-10" style="margin-top:8px;">
							  <input type="checkbox" name="item_type" value="1" /> Local Ad
							</div>
						  </div>
						  <?php }?>
						   <div class="form-group">
							<label for="inputtext3" class="col-sm-2 control-label" style="color:#525252;">Item Picture</label>
							<div class="col-sm-10">
							  <a id="uploadImage" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-picture"></span>&nbsp;&nbsp;&nbsp;Add</a>
							</div>
						  </div>

						  <div class="row" style="margin-bottom:15px;">
							<div class="col-md-offset-2 col-sm-offset-2 col-md-10">
								<div id='preview' style="float:left;border:solid 1px #dedede;padding:10px;"></div>
							</div>
						  </div>


						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <button type="submit" class="btn btn-primary" style="width:100px;">Publish</button>
							</div>
						  </div>


				</form>

				  </div>
				</div>

			</div>

		</div>
	</div>
</div>



<form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo BASEURL;?>item/imageUpload' style="display:none;">
	Upload your image <input type="file" name="photoimg" id="photoimg" />
</form>




<script type="text/javascript" >
 $(document).ready(function() {

		$('#uploadImage').click(function(){
			$('#photoimg').trigger('click');
		});

            $('#photoimg').change( function()			{
			           $("#preview").html('');
			    $("#preview").html('Loading..');
			$("#imageform").ajaxForm({
						target: '#preview'
		}).submit();

			});



	$('#defaultForm').bootstrapValidator({

        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			item_name: {
                validators: {
                    notEmpty: {
                        message: 'Item Name cannot be empty'
                    }
                }
            },
			item_description: {
                validators: {
					notEmpty: {
                        message: 'Item Description cannot be empty'
                    }
                }
            },
            item_category: {
                validators: {
                    notEmpty: {
                        message: 'Item Category cannot be empty'
                    }
                }
            },
			item_price: {
                validators: {
                    notEmpty: {
                        message: 'Item Price cannot be empty'
                    },
					numeric: {
                        message: 'The value can contain only numbers'
                    }
                }
            },
		}

	});


$( document ).ready( function() {
	$( 'textarea#item_description' ).ckeditor();
} );

});

</script>
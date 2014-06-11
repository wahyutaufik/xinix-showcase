<main>
    <div class="container">
		<div class="listing">
		    <div class="nav-area hidden-mobile">
		    	<div class="wrapper">
		    		<div class="row button-form">
		    			<div class="span-12">
		    				<div class="row">
		    					<ul class="flat">
		    						<li><a href="<?php echo URL::site('/git') ?>" class="button ">Search</a></li>
		    						<li><a href="<?php echo URL::site('git/null/create') ?>" class="button ">Create</a></li>
		    						<li><a href="<?php echo URL::site('/git/'.$entry['$id']) ?>" class="button">Read</a></li>
		    						<li><a href="<?php echo URL::site('/git/'.$entry['$id'].'/update') ?>" class="button active">Update</a></li>
		    						<li><a href="<?php echo URL::site('/git/'.$entry['$id'].'/delete') ?>" class="button ">Delete</a></li>
		    					</ul>
		    				</div>
		    			</div>
		    		</div>
		    	</div>
		    </div>
		    <div class="list-form">
				<div class="form-input">
					<form method="post">
						<div class="row field field-git">
							<div class="span-12">
								<label>Git</label>
								<?php echo \Norm\Schema\String::create('git')->format('input', $entry['git']) ?>
							</div>
						</div>
						<input type="submit" value="Submit">	
					</form>
				</div>
		    </div>
		</div>
    </div>
</main>
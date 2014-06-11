<main>
    <div class="container">
		<div class="listing">
		    <div class="nav-area hidden-mobile">
		    	<div class="wrapper">
		    		<div class="row button-form">
		    			<div class="span-12">
		    				<div class="row">
		    					<ul class="flat">
		    						<li><a href="<?php echo f('controller.url') ?>" class="button ">Search</a></li>
		    						<li><a href="<?php echo f('controller.url').'/null/create' ?>" class="button ">Create</a></li>
		    						<li><a href="<?php echo f('controller.url').'/'.$entry->getId() ?>" class="button active">Read</a></li>
		    						<li><a href="<?php echo f('controller.url').'/'.$entry->getId().'/update' ?>" class="button ">Update</a></li>
		    						<li><a href="<?php echo f('controller.url').'/'.$entry->getId().'/delete' ?>" class="button ">Delete</a></li>
		    					</ul>
		    				</div>
		    			</div>
		    		</div>
		    	</div>
		    </div>
		    <div class="list-form">
				<div class="form-input">
					<div class="row field field-git">
						<div class="span-12">
							<label>Git</label>
							<?php echo \Norm\Schema\String::create()->format('readOnly', $entry['git']) ?>
						</div>
					</div>
				</div>
		    </div>
		</div>
    </div>
</main>
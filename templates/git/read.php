<?php 
$gits 	= explode("com/",$entry['git']);
$git 	= explode("/",$gits['1']);
?>
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
							<label>Name</label>
							<a href="<?php echo $entry['git']; ?>"><?php echo \Norm\Schema\String::create()->format('readOnly', $git['1']) ?></a>
						</div>
						<div class="span-12">
							<label>Git</label>
							<?php echo \Norm\Schema\String::create()->format('readOnly', $entry['git']) ?>
						</div>
						<div class="span-12">
							<label>Author</label>
							<a href="https://github.com/<?php echo $owner['login']; ?>"><?php echo \Norm\Schema\String::create()->format('readOnly', $owner['login']) ?></a>
						</div>
						<div class="span-12">
							<label>Description</label>
							<?php
								if (empty($content['description'])) {
									echo \Norm\Schema\String::create()->format('readOnly', 'null'); 
								} else{ 
									echo \Norm\Schema\String::create()->format('readOnly', $content['description']); 
								}
							?>
						</div>
						<div class="span-12">
							<label>Stars</label>
							<?php 
							if (empty($content['stargazers_count'])) {
								// echo "0";
								echo \Norm\Schema\String::create()->format('readOnly', 'null'); 
							} else{
								echo \Norm\Schema\String::create()->format('readOnly', $content['stargazers_count']); 
							}
							?>
						</div>
						<div class="span-12">
							<label>Forks</label>
							<?php 
								if (empty($content['forks'])) {
									echo \Norm\Schema\String::create()->format('readOnly', 'null'); 
								} else{
									echo \Norm\Schema\String::create()->format('readOnly', $content['forks']); 
								}
							?>
						</div>
					</div>
				</div>
		    </div>
		</div>
    </div>
</main>
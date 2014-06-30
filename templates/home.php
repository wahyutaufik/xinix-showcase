<div class="dashboard">
	<div class="row">
		<div class="span-12">
			<div class="row">
				<div class="span-12">
					<h2 class="title"><a href="<?php echo URL::site('git/null/create') ?>">Submit Your Own Here</a></h2>
				</div>
				<div class="span-12">
					<form action="" class="form-input">
						<input type="text" name="" id="searching"  placeholder="Search">
					</form>
				</div>
				<div class="span-12">
					<div id="search">
						<div class="table-container">
							<table class="table nowrap stripped hover">
								<thead>
									<tr>
										<th>Repo</th>
										<th>Description</th>
										<th>Stars</th>
										<th>Forks</th>
										<th>Author</th>
									</tr>
								</thead>
								<tbody id="tableGit">
									<!-- here is content ajax -->
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function git(searching){
	var obj=document.getElementById("search");
	var urlAjax='<?php echo URL::site("/git.json") ?>?!match='+searching;
		$.ajax({
			method: "GET",
			url: urlAjax,
			beforeSend : function(xhr){
				$("#loader").show();
			}
		}).done(function(data){
			if(data['entries'].length){
				$("#tableGit").html('');
				$.each(data['entries'], function(k, v){
					console.log(v);
					$("#tableGit").append("<tr><td><a href='<?php echo URL::site('/git').'/'?>"+v.$id+"'>"+v.repo+"</a></td><td>"+v.description+"</td><td>"+v.star+"</td><td>"+v.fork+"</td><td><a href='https:github.com/"+v.author+"'>"+v.author+"</a></td></tr>");
				});
			}
		});
	}

	$("#searching").on('keypress', function(e){
		if(e.which == 13){
			e.preventDefault();
			e.stopPropagation();
			git($(this).val());
		}
	});
</script>
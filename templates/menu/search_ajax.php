<?php

?>
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
		<tbody>
			<?php //foreach ($gits as $key => $git): ?>
			<tr>
				<td><a href="<?php //echo \URL::site('/git'.'/'.$git['$id']) ?>"><?php //echo $git['repo'] ?></a></td>
				<td><?php //echo $git['description'] ?></td>
				<td><?php //echo $git['star'] ?></td>
				<td><?php //echo $git['fork'] ?></td>
				<td><a href="https://github.com/<?php //echo $git['author'] ?>"><?php //echo $git['author'] ?></a></td>	
			</tr>
			<?php //endforeach ?>
		</tbody>
	</table>
</div>
<div class="dashboard">
    <div class="row">
        <div class="span-12">
            <div class="row">
                <div class="span-12">
                    <h2 class="title"><a href="<?php echo URL::site('git/null/create') ?>">Submit Your Own Here</a></h2>
                </div>
                <div class="span-12">
                    <form action="" class="form-input" method="GET">
                        <input type="text" name="q" id="searching"  placeholder="Search" value="<?php echo $query ?>" >
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
                                    <?php foreach($gits as $git): ?>
                                        <tr>
                                            <?php
                                                if (!$git->get('slug')) {
                                                    $url = '/git/'.$git->getId();
                                                } else {
                                                    $url = '/packages/'.$git->get('slug');
                                                }
                                            ?>
                                            <td><a href="<?php echo URL::site($url) ?>"><?php echo $git->get('git') ?></a></td>
                                            <td><?php echo $git->get('description') ?></td>
                                            <td><?php echo $git->get('star') ?></td>
                                            <td><?php echo $git->get('fork') ?></td>
                                            <td><?php echo $git->get('author') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-right info-packages">
                            <i>Currently there are <?php echo $count; ?> packages registered on ShowCase</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // function git(searching) {
    //  var obj = document.getElementById("search"),
    //      urlAjax = '<?php echo URL::site("/git.json") ?>?!match='+searching;

    //  $.ajax({
    //      method: "GET",
    //      url: urlAjax,
    //      beforeSend : function (xhr) {
    //          $("#loader").show();
    //      }
    //  }).done(function (data) {
    //      if (data['entries'].length) {
    //          $("#tableGit").html('');
    //          $.each(data['entries'], function (k, v) {
    //              $("#tableGit").append("<tr>"+
    //                  "<td><a href='<?php echo URL::site('/git').'/'?>"+v.$id+"'>"+v.repo+"</a></td>"+
    //                  "<td>"+v.description+"</td>"+
    //                  "<td>"+v.star+"</td>"+
    //                  "<td>"+v.fork+"</td>"+
    //                  "<td><a href='https:github.com/"+v.author+"'>"+v.author+"</a></td>"+
    //              "</tr>");
    //          });
    //      }
    //  });
    // }

    // $("#searching").on('keypress', function (e) {
    //  if (e.which == 13) {
    //      e.preventDefault();
    //      e.stopPropagation();
    //      git($(this).val());
    //  }
    // });

    if ($('#searching').val()) {
        $('#searching').focus();
    }
</script>

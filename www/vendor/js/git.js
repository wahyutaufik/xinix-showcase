var git = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    limit         : 10,
    prefetch      : {
        url   : window.currentUrl + '.json',
        filter: function(list) {
            return $.map(list.entries, function(git) { var a = git.git.split('/'); console.log(a); return { name: a[a.length -1] }; });
        }
    }
});

git.initialize();
 
$('#prefetch .typeahead').typeahead(null, {
    name      : 'git',
    displayKey: 'name',
    source    : git.ttAdapter()
});

$(".tt-dropdown-menu").on('click', function(evt){
    var a = $(".tt-suggestion p").html();
});
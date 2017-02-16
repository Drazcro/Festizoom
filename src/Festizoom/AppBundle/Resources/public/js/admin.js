$(document).ready(function(){
    $('ul.tabs').tabs('select_tab', 'tab_id');

    var newsTab = $('.news');
    newsTab.click(function(){
        var url = Routing.generate('blog_show', {
            'slug': 'my-blog-post'
        });

        $.ajax({
            type: "POST",
            url: url,
            data: null,
            cache: false,
            success: function(data){
                alert('trouve');
            }
        });
        return false;
    });
});


/**
 * Returns the button clicked on the news page.
 * @param  string templateURL origination path
 * @return string          
 */
function ajaxFilterNews(templateURL){

    $('.news-filter').on('click',function(){

        var newsButton = $(this);

        // Start by removing state from any buttons.
        var allButtons = $('.news-filter');
        allButtons.removeClass('newsClick');

        // e.preventDefault();

        // Add State if we click on that button.
        $(this).addClass('newsClick');
        var query = newsButton.attr('news_filter');
        console.log(query);

        filterNewsPosts(templateURL, query, ajaxFilterYear());

    });

}

/**
 * Returns the year selected on News Page
 * @param  string templateURL origination path.
 * @return int             year
 */
function ajaxFilterYear(templateURL) {

    var select = document.getElementById("newsFilterSelect");
    selectedNode = select.options[select.selectedIndex].value;
    console.log(selectedNode);

    var dropdown_query = selectedNode;
    return dropdown_query;
}


/**
 * Gets data and filters
 * @return {[type]} [description]
*/
function filterNewsPosts(templateURL, query, dropdown_query) {

    console.log('Template' + templateURL);
    console.log('Query' + query);
    console.log('Dropdown' + dropdown_query);

    if(query == "") {
        console.warn('RCA ERROR: No Query Found.');
        // IF NO QUERY IS FOUND LETS SHOW ALL
        query = 'all';
    }

    if(dropdown_query == "" ) {
        console.warn('RCA ERROR: No dropdown query found.');
    }

    var content = $('.post-container');



        $.ajax({
            url: templateURL + '/filter-posts.php',
            type: 'POST',
            data: {query : query, dropdown_query : dropdown_query },
            success: function(response) {
                        content.html(response);
            }
        });

}
/**
 * Description:
 *  
 * Called when user clicks on a button on the blog page.
 * Sets hidden input rca_query to equal the button that was clicked.
 * Hidden input rca_query value is used for when the user clicks on the dropdown.
 *
 * @author  Doe
 * @param {string} templateURL page the function is called on.
 * @return {void}          
 */
function filterPosts(templateURL) {

    $('.news-filter').on('click',function(){

        var newsButton = $(this);

        // Start by removing state from news buttons.
        var allButtons = $('.news-filter');
        allButtons.removeClass('newsClick');

        // Add State if we click on a button.
        $(this).addClass('newsClick');
        var category = newsButton.attr('news_filter');

        filterNewsPosts(templateURL, category, ajaxFilterYear());
        console.log('Set Category: ' + category);

        // Add to hidden input
        $('.rca_query').attr('value', category);
    });
}


/**
 * Description:
 *
 * Used for returning the category that was originally clicked on.
 * If nothing has been clicked on the string "all" is returned to show all blog posts.
 *
 * @author Doe
 * @return {string} Returns category stored in hidden input rca_query. This is saved using filterPosts().
 */
function getCategory() {
    var category = $('.rca_query').val();

    if(category == "") {
        console.warn('RCA Information: No Category Selected. Showing All Posts...');
        // IF NO QUERY IS FOUND LETS SHOW ALL
        category = 'all';
    }

    return category;
}

/**
 * Description:
 *
 * Determines the year for AJAX year dropdown.
 * If user selects an option, that year is used. Otherwise, we use set beginning year through current year.
 * In simple terms, returns all years or year selected.
 *
 * @author  Doe 
 * @return {int} year
 */
function ajaxFilterYear() {

    // Set Start Date and End Date for Year Array.
    var date = new Date();
    var beginningYear = 2016;
    var currentYear = date.getFullYear();
    var yearArray = new Array();

    // Creates an Array of Years for posts to look for.
    for($i=beginningYear; $i <= currentYear; $i++) {
        yearArray.push($i);
    }

    // Gets selected item in dropdown.
    var select = document.getElementById("newsFilterSelect");
    selectedNode = select.options[select.selectedIndex].value;

    if(selectedNode == "" || selectedNode == "Year Published") {
        selectedNode = yearArray;
    }

    var dropdown_query = selectedNode;
    console.log(dropdown_query);
    return dropdown_query;

}



/**
 * Description:
 * 
 * Ran from filterPosts() and select option on blog page.
 * POSTS data to filter-posts.php and adds to page-news.php.
 *
 * @author  Doe
 * @param {string} templateURL page the function was called on.
 * @param {string} category Category stored in hidden input rca_query
 * @param {array} dropdown_query array of years to query.
 * @return {void} AJAX call to filter-posts.php
*/
function filterNewsPosts(templateURL, category, dropdown_query) {

    if(dropdown_query == "" ) {
        console.warn('RCA Information: No dropdown query found.');
    }

    var content = $('.post-container');



        $.ajax({
            url: templateURL + '/filter-posts.php',
            type: 'POST',
            data: {category : category, dropdown_query : dropdown_query },
            success: function(response) {
                        content.html(response);
            }
        });

}







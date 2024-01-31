async function saveArticle() {
    deselectSelectedItem();
    let siteOrigin = window.location.origin;
    ajax("POST", {
        url: siteOrigin + "/dashboard/builder-save-article",
        data: {
            id: _("#article-id").val(),
            title: _("#article-title").innerHTML,
            category: _("#article-category").val(),
            pictureUrl: _("#article-main-image").attr("src"),
            content: minify(_("#article-content").innerHTML),
            date_publication: _("#article-publicationDate").val(),
        },
        success: (result) => {
            saveState();
            const saveIcon = _("#save-page");
            if(saveIcon){
                let c = saveIcon.attr("class");
                saveIcon.removeClass(c);
                saveIcon.addClass(c.replace("fill", "line"));
            }
        }
    });
}
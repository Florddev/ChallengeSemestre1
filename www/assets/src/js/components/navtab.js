function initNavTab() {
    _('[data-plugin="tabnav"]').forEach(e => {
        _(e).removeClass("active");
    });
    _('[data-tabnav-target]').forEach((e) => {
        if (e.checked) {
            let target = document.getElementById(_(e).attr('data-tabnav-target'));
            _(target).addClass("active");
        }
    });
}

_(document).ready(() => {
    initNavTab();
    console.log('test');
    _('[data-tabnav-target]').forEach((e) => {
        e.addEventListener('change', (evt) => {
            initNavTab();
        });
    });
});

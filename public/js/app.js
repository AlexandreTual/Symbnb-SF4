$('#add-image').click(function() {
    // récupération du nombre de formulaire
    var index = +$('#widget-counter').val();
    //récupération du prototype
    var tmpl = $('#annonce_images').data('prototype').replace(/__name__/g, index);
    //injection du template prototype modifié
    $('#annonce_images').append(tmpl);

    $('#widget-counter').val(index + 1);

    //je gère le boutton de suppression
    handleDeleteButton();
});

function handleDeleteButton() {
    $('button[data-action="delete"]').click(function() {
        var target = this.dataset.target;
        $(target).remove();
    });
}

function updateCounter() {
    var count = +$('#annonce_images div.form-group').length;
    $('#widget-counter').val(count);
}

handleDeleteButton();
updateCounter();
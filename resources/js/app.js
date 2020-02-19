require('./bootstrap');

$(document).ready(function () {
    $('.dt').DataTable();

    $('#rentable-add-items').on('click', function () {
        let html = $('.rentable-item').first().html();
        html = '<div class="rentable-item">' + html + '</div>';
        let name = 'items[0]';
        let newName = 'items[' + $('.rentable-item').length + ']';

        $('#rentable-items-list').append(html.replaceAll(name, newName));
    });

    $('#rentable-tariff-rate-add-items').on('click', function () {
        let html = $('.rentable-tariff-rate').first().html();
        html = '<div class="rentable-tariff-rate">' + html + '</div>';
        let name = 'tariff_rates[0]';
        let newName = 'tariff_rates[' + $('.rentable-tariff-rate').length + ']';

        $('#rentable-tariff-rates-list').append(html.replaceAll(name, newName));
    });

    window.intlTelInput(document.querySelector(".phone"), {
        initialCountry: "RU",
        nationalMode: false,
        autoHideDialCode: false,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/js/utils.js"
    });
});

String.prototype.replaceAll = function (find, replace) {
    var str = this;
    return str.replace(new RegExp(find.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&'), 'g'), replace);
};

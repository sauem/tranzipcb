Handlebars.registerHelper("toMilimet",function (value) {
    return value * 10;
});

Handlebars.registerHelper("src",function (link) {
    return "https://" + window.location.hostname + "/" + link;
});

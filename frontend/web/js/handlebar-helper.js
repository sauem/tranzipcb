Handlebars.registerHelper("toMilimet",function (value) {
    return value * 10;
});

Handlebars.registerHelper("src",function (link) {
    _protocol = "http://";
    if (location.protocol == "https:") {
        _protocol = "https://";
    }
    return _protocol + window.location.hostname  + link;
});

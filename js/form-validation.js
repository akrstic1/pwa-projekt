$(function () {
    $("form[name='unosf']").validate({
        // Specify validation rules
        rules: {
            title: {
                required: true,
                minlength: 5,
                maxlength: 30,

            },
            about: {
                required: true,
                minlength: 10,
                maxlength: 100,

            },
            content: {
                required: true,

            },
            pphoto: {
                required: true,
            },
            category: {
                required: true,
            }
        },
        // Specify validation error messages
        messages: {
            title: {
                required: "Potrebno je upisati naslov",
                minlength: "Duljina naslova mora biti između 5 i 30 znakova",
                maxlength: "Duljina naslova mora biti između 5 i 30 znakova",

            },
            about: {
                required: "Potrebno je upisati sažetak",
                minlength: "Duljina sažetka mora biti između 10 i 100 znakova",
                maxlength: "Duljina sažetka mora biti između 10 i 100 znakova",

            },
            content: {
                required: "Potrebno je upisati tekst",

            },
            pphoto: {
                required: "Potrebno je postaviti sliku",
            },
            category: {
                required: "Potrebno je odabrati kategoriju",
            }
        },

        submitHandler: function (form) {
            form.submit();
        }
    });
});
$(function () {
    $("form[name='registracija']").validate({
        // Specify validation rules
        rules: {
            ime: {
                required: true,
                maxlength: 30,

            },
            prezime: {
                required: true,
                maxlength: 30,

            },
            korisnicko_ime: {
                required: true,
                minlength: 5,
                maxlength: 15,

            },
            lozinka1: {
                required: true,
                minlength: 4,
                maxlength: 15,

            },
            lozinka2: {
                required: true,
                equalTo: "#lozinka1",
            }
        },
        // Specify validation error messages
        messages: {
            ime: {
                required: "Unesite ime",
                maxlength: "Ime ne smije biti dulje od 30 znakova",

            },
            prezime: {
                required: "Unesite prezime",
                maxlength: "Prezime ne smije biti dulje od 30 znakova",

            },
            korisnicko_ime: {
                required: "Unesite korisničko ime",
                minlength: "Korisničko ime ne smije biti kraće od 5 znakova",
                maxlength: "Korisničko ime ne smije biti dulje od 15 znakova",

            },
            lozinka1: {
                required: "Unesite lozinku",
                minlength: "Lozinka ne smije biti kraće od 4 znaka",
                maxlength: "Lozinka ne smije biti dulje od 15 znakova",

            },
            lozinka2: {
                required: "Ponovite lozinku",
                equalTo: "Lozinke moraju biti iste",
            }
        },

        submitHandler: function (form) {
            form.submit();
        }
    });
});
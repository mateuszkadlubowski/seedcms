const Admin = {
    init() {
        Admin.addSpinToForm();
        Admin.generatePassword();
    },
    addSpinToForm(){
        document.querySelectorAll('.js-form-spin').forEach(function (ee) {
            ee.addEventListener('submit', function (e) {
                this.querySelector('button[type="submit"]').classList.add('animate-spin');
            });
        });
    },
    generatePassword(){
        let btn =document.querySelector('#password-generate');
        if(!btn){
            return;
        }
        btn.addEventListener('click', function () {
            const length = 12,
                charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            let retVal = "";
            for (var i = 0, n = charset.length; i < length; ++i) {
                retVal += charset.charAt(Math.floor(Math.random() * n));
            }
            retVal = "A9c*" + retVal;

            let inputPass = document.querySelector('#password');
            inputPass.value = retVal;
            inputPass.type = 'text';
        });

    }

}
Admin.init();



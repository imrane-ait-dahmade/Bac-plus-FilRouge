class Event {
    poppap(NameForm, BtnOfAfficherPoppap, EventType) {
        const Form = document.getElementById(NameForm);
        const Button = document.getElementById(BtnOfAfficherPoppap);

        Button.addEventListener(EventType, function () {
            Form.classList.toggle('hidden');
        });
    }
}

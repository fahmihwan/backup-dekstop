import Validations from "./Validation";

export default class LoginValidations {
    constructor(username, password) {
        this.username = username;
        this.password = password;
    }
    checkValidations() {
        let errors = [];
        if (!Validations.checkEmail(this.username)) {
            errors["username"] = "Invalid Email";
        }

        if (!Validations.minLength(this.password, 6)) {
            errors["password"] = "password should be of 6 characters";
        }
        return errors;
    }
}

export default class Validations {
    static checkEmail(username) {
        // if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(username)) {
        if (username) {
            return true;
        } else {
            return false;
        }
    }
    static minLength(name, minLength) {
        if (name.length < minLength) {
            return false;
        }
        return true;
    }
}

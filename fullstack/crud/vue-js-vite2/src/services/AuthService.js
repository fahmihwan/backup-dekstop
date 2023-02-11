import httpCommon from "../http-common";

class AuthService {
    login(data) {
        return httpCommon.post("/user/login", {
            username: data.username,
            password: data.password,
        });
    }
    register() {
        return httpCommon.post("/user/regiser");
    }
    logout() {
        return httpCommon.post("/user/logout");
    }
}

export default new AuthService();

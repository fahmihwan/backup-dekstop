export default function authHeader() {
    let user = JSON.parse(localStorage.getItem("token"));

    if (user && token.authorization.token) {
        return { Authorization: "Bearer " + user.authorization.token };
    } else {
        return {};
    }
}

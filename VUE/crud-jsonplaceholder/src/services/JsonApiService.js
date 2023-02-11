import httpCommon from "../http-common";

class JsonApiService {
    getAll() {
        return httpCommon.get("/todos");
    }

    getDetail(id) {
        return httpCommon.get(`/posts/${id}`);
    }

    create(data) {
        return httpCommon.post("/posts", data);
    }

    update(data, id) {
        return httpCommon.put(`/posts/${id}`, data);
    }

    delete(id) {
        return httpCommon.delete(`/posts/${id}`);
    }
}

export default new JsonApiService();
